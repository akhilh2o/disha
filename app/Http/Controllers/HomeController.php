<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\Question;
use App\Models\StudentCourse;
use App\Models\StudentExamAnswer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Str;


class HomeController extends Controller
{

    public function exams(Request $request)
    {
        $user = User::find(auth()->id());
        $user->load('lastest_course');
        if ($user?->lastest_course?->payment_status == false) {
            return to_route('payment')->withErrors('Your previous course registration fee was due! please make sure pay right now and get your certificate.');
        }

        if ($user->is_insider) {
            // return $user;
            return to_route('student.certificates');
        }

        $exams = Exam::where('course_id', $user->lastest_course->course_id)
            ->with('course')
            ->whereDoesntHave('attempt')
            ->get();

        return view('students.exams')->with('user', $user)
            ->with('exams', $exams);
    }

    public function certificates()
    {
        $user = User::find(auth()->id());
        // if loggedin user is insider
        if ($user->is_insider) {
            $studentCourse = StudentCourse::where('student_id', auth()->id())
                ->with('course')
                ->with('course.exam')
                ->get();
            return view('students.insider.certificate')->with('studentCourse', $studentCourse);
        } else {
            $studentCourse = StudentCourse::where('student_id', auth()->id())
                ->with('course')
                ->with('course.exam.attempt')
                ->whereHas('course.exam.attempt')
                ->get();

            return view('students.dashboard')->with('studentCourse', $studentCourse);
        }
    }

    public function exam(Exam $exam)
    {
        $user = auth()->user(); // Get the logged-in user
        $exam->load('course');
        $exam->load('questions');
        $attemptedQuestions = $this->attemptedQuestions($exam, $user);
        $question = $exam->questions()->with('answers')->first();
        $questionAnswer = $this->questionAnswer($question, $exam);
        return view('students.exam')->with('exam', $exam)
            ->with('question', $question)
            ->with('attemptedQuestions', $attemptedQuestions)
            ->with('questionAnswer', $questionAnswer);
    }

    public function showQuestion(Exam $exam, Question $question)
    {
        $user = auth()->user(); // Get the logged-in user
        $attemptedQuestions = $this->attemptedQuestions($exam, $user);
        // getting next question that current exam
        $question = $exam->questions()
            ->where('id', '>', $question->id)
            ->orderBy('id', 'asc')
            ->first();

        $questionAnswer = $this->questionAnswer($question, $exam);
        if ($question) {
            return view('students.exam', compact('exam', 'question', 'attemptedQuestions', 'questionAnswer'));
        } else {
            // There are no more questions; you can redirect to a finish page or exam summary.
            return redirect()->route('student.exam.finish', [$exam]);
        }
    }

    public function previousQuestion(Exam $exam, Question $question)
    {
        $user = auth()->user(); // Get the logged-in user
        $attemptedQuestions = $this->attemptedQuestions($exam, $user);
        // getting previous question that current exam
        $question = $exam->questions()
            ->where('id', '<', $question->id)
            ->orderBy('id', 'asc')
            ->first();
        $questionAnswer = $this->questionAnswer($question, $exam);
        if ($question) {
            return view('students.exam', compact('exam', 'question', 'attemptedQuestions', 'questionAnswer'));
        } else {
            // There are no more questions; you can redirect to a finish page or exam summary.
            return redirect()->route('student.exam.finish', [$exam]);
        }
    }

    public function submitAnswer(Request $request, Exam $exam, Question $question)
    {
        $request->validate([
            'answer' => ['required', 'in:' . implode(',', $question->answers->pluck('id')->toArray())],
        ]);

        $answer = Answer::find($request->input('answer'));
        $score = 0;
        $userAnswer = $answer->text;
        if ($answer->is_correct) {
            $userAnswer = $answer->text;
            $score = $exam?->maximum_mark / $exam->questions->count();
        }

        $studentExamAnswer = StudentExamAnswer::where('student_id', auth()->id())
            ->where('question_id', $question->id)
            ->whereHas('question', function ($query) use ($exam) {
                $query->where('exam_id', $exam->id);
            })
            ->first();

        if (!$studentExamAnswer) {
            // check question attemped or not to Save the user's answer to the database
            StudentExamAnswer::create([
                'student_id'   => auth()->id(), // You need to be logged in to access the user's ID
                'question_id'  => $question->id,
                'answer'       => $userAnswer,
                'score'        => $score,
            ]);
        }


        if ($question->isNot($exam->questions->last())) {
            return redirect()->route('student.exam.question.show', ['exam' => $exam, 'question' => $question]);
        } else {
            return redirect()->route('student.exam.finish', [$exam]);
        }
    }

    public function finishExam(Exam $exam)
    {
        // return $exam;
        $user = auth()->user(); // Get the logged-in user

        // Check if the user has attempted all questions in the exam
        $attemptedQuestions = $this->attemptedQuestions($exam, $user);

        $totalScore = StudentExamAnswer::where('student_id', $user->id)
            ->whereHas('question', function ($query) use ($exam) {
                $query->where('exam_id', $exam->id);
            })->sum('score');


        if ($attemptedQuestions == $exam->questions->count()) {
            // User has completed the exam; you can calculate the score here if needed
            $examAttempt = ExamAttempt::where(['user_id' => auth()->id(), 'exam_id' => $exam?->id, 'is_completed' => true])->first();
            if (!$examAttempt) {
                ExamAttempt::create([
                    'user_id'       => auth()->id(),
                    'exam_id'       => $exam?->id,
                    'score'         => $totalScore,
                    'is_completed'  => true,
                    'started_at'    => now(),
                    'finished_at'   => now(),
                    'notes'         => 'exam has been finished now',
                ]);
            }

            // Redirect to a page that displays the exam results
            return redirect()->route('student.exam.result', compact('exam', 'user'));
        } else {
            // User hasn't completed the exam; you can handle this case accordingly
            return redirect()->route('student.exam', $exam)
                ->withErrors('You have not completed all the questions.');
        }
    }

    public function examResult(Exam $exam, User $user)
    {
        $exams = Exam::find($exam->id)
            ->with('course')
            ->with('attempt')
            ->whereHas('attempt', function ($query) {
                $query->where('user_id', auth()->id());
                $query->where('is_completed', true);
            })
            ->get();
        if ($exams) {
            $this->uploadResultOnfirebase($exam, $user);
            return view('students.exam_result')->with('exams', $exams);
        }
        // User hasn't completed the exam; you can handle this case accordingly
        return redirect()->route('student.exam', $exam)
            ->withErrors('You have not completed all the questions.');
    }

    public function uploadResultOnfirebase(Exam $exam, User $user)
    {
        if ($user->is_insider) {
            $exam->load('course');
            $exam->load('attempt');
        } else {
            $exam = Exam::find($exam->id)
                ->with('course')
                ->with('attempt')
                ->whereHas('attempt', function ($query) {
                    $query->where('user_id', auth()->id());
                    $query->where('is_completed', true);
                })
                ->first();
        }
        if ($exam) {

            $filePath = public_path("certificate/sample.pdf");
            // 500067_aakash_kumar_singh
            $outputFilePath = public_path("certificate/students/" . $user->roll_number . '_' . Str::slug($user->name, '_') . ".pdf");

            if (!File::exists($outputFilePath)) {
                // The file doesn't exist, proceed with the operation
                $this->fillPDFFile($exam, $filePath, $outputFilePath);
                // return response()->file($outputFilePath);
                // Generate a unique file name if needed
                $fileName = "Certificates/" . $user->roll_number . '_' . Str::slug($user->name, '_') . ".pdf";

                // Get the Firebase Storage instance
                $storage = app('firebase.storage');

                // Check if the file already exists
                if (!$storage->getBucket()->object($fileName)->exists()) {
                    // Upload the file to Firebase Storage
                    $storage->getBucket()->upload(file_get_contents($outputFilePath), [
                        'name' => $fileName,
                    ]);
                }
                // Retrieve the URL of the uploaded file
                return $url = $storage->getBucket()->object($fileName)->signedUrl(new \DateTime('2030-01-01T00:00:00Z'));
            }
        }
    }

    public function resultDownload(Exam $exam, User $user)
    {
        if ($user->is_insider) {
            $exam->load('course');
            $exam->load('attempt');
            // check file exists
            $filePath = public_path("certificate/students/" . $user->roll_number . '_' . Str::slug($user->name, '_') . ".pdf");
            if (!File::exists($filePath)) {
                $this->uploadResultOnfirebase($exam, $user);
            }
        } else {
            $exam = Exam::find($exam->id)
                ->with('course')
                ->with('attempt')
                ->whereHas('attempt', function ($query) {
                    $query->where('user_id', auth()->id());
                    $query->where('is_completed', true);
                })
                ->first();
        }
        if ($exam) {
            // 500067_aakash_kumar_singh
            $outputFilePath = public_path("certificate/students/" . $user->roll_number . '_' . Str::slug($user->name, '_') . ".pdf");
            return response()->file($outputFilePath);
        }
        // User hasn't completed the exam; you can handle this case accordingly
        return redirect()->route('student.exam', $exam)
            ->withErrors('You have not completed all the questions.');
    }

    public function fillPDFFile($exam, $file, $outputFilePath)
    {
        $fpdi = new FPDI;

        $count = $fpdi->setSourceFile($file);

        for ($i = 1; $i <= $count; $i++) {

            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);

            $fpdi->SetFont("helvetica", "B", 12);
            $fpdi->setFillColor(239,217,140);
            $fpdi->Rect(16.5,74,52,9.4,'F');
            $fpdi->Text(20, 80, "Certificate No. " . auth()?->user()?->roll_number);

            $fpdi->SetFont("helvetica", "B", 10);
            $fpdi->Text(106, 106.5, strtoupper(auth()?->user()?->name));
            $fpdi->Text(106, 118, strtoupper(auth()?->user()?->father_name));
            $fpdi->Text(106, 128.5, strtoupper(auth()?->user()?->mother_name));
            $fpdi->Text(106, 140, strtoupper(auth()?->user()?->dob));
            if(auth()->user()->is_insider){
                $fpdi->Text(106, 154, strtoupper(auth()?->user()?->center?->name));
            }else{
                $fpdi->Text(106, 154, strtoupper("Disha Computer Education"));
            }
            $fpdi->Text(106, 166.5, auth()->user()->roll_number);
            $fpdi->Text(106, 178, $exam?->course?->name);
            $fpdi->SetFont("helvetica", "B", 11);
            $fpdi->Text(52, 220.5, date('Y'));
            $fpdi->Text(42, 239.5, "Sultanpur");
            $fpdi->Text(42, 251, date('d-m-Y'));
            // insert image at position x,y,w,h (in mm)

            if (app()->environment() === 'local') {
                $fpdi->Image("https://cdn.vectorstock.com/i/preview-1x/82/99/no-image-available-like-missing-picture-vector-43938299.jpg", 165, 52, 22, 30);
            } else {
                if (auth()?->user()?->avatar) {
                    $fpdi->Image(asset('image/student/' . auth()?->user()?->avatar), 165, 52, 22, 30);
                }
            }
        }

        return $fpdi->Output($outputFilePath, 'F');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('students.profile')->with('user', $user);
    }
    // profile update
    public function update(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'mobile'    => 'required',
            'password'  => 'nullable',
            'avatar'    => 'nullable|image|mimes:jpeg,png,jpg|max:512',
        ]);

        $user = User::find(auth()->id());

        $data['name']       = $request->name;
        $data['mobile']     = $request->mobile;

        if ($request->password) {
            $data['password']     = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            if (File::exists(public_path('image/student/') . auth()?->user()?->avatar)) {
                File::delete(public_path('image/student/') . auth()?->user()?->avatar);
            }

            $imageName = 'avatar-' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('image/student'), $imageName);
            $data['avatar'] = $imageName;
        }

        $user->update($data);

        return redirect()->back()->withSuccess("Profile has been updated!");
    }

    // helper functions 
    public function attemptedQuestions(Exam $exam, User $user)
    {
        return StudentExamAnswer::where('student_id', $user->id)
            ->whereHas('question', function ($query) use ($exam) {
                $query->where('exam_id', $exam->id);
            })->count();
    }

    public function questionAnswer(Question $question, Exam $exam)
    {
        return StudentExamAnswer::where('student_id', auth()->id())
            ->where('question_id', $question->id)
            ->whereHas('question', function ($query) use ($exam) {
                $query->where('exam_id', $exam->id);
            })
            ->first();
    }
}
