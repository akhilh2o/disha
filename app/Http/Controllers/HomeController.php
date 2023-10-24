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

class HomeController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = auth()->user();
        $user->load('lastest_course');
        if ($user->lastest_course->payment_status == false) {
            return to_route('payment');
        }

        $user->load('courses');

        // return StudentCourse::where('student_id', auth()->id())
        //     ->with('course')
        //     ->whereDoesntHave('course.exams.attempts')
        //     ->get();
        return view('students.dashboard')->with('user', $user);
    }

    public function exams()
    {
        $user = auth()->user();
        $user->load('lastest_course');
        if ($user->lastest_course->payment_status == false) {
            return to_route('payment');
        }

        $exams = Exam::where('course_id', $user->lastest_course->course_id)
            ->with('course')
            ->whereDoesntHave('attempts')
            ->get();
        return view('students.exams')->with('user', $user)
            ->with('exams', $exams);
    }

    public function exam(Exam $exam)
    {
        $exam->load('course');
        $question = $exam->questions()->with('answers')->first();
        return view('students.exam')->with('exam', $exam)
            ->with('question', $question);
    }


    public function showQuestion(Exam $exam, Question $question)
    {
        $question = $exam->questions()
            ->where('id', '>', $question->id) // assuming you have an 'order' field for question order
            ->orderBy('id', 'asc')
            ->first();

        if ($question) {
            return view('students.exam', compact('exam', 'question'));
        } else {
            // There are no more questions; you can redirect to a finish page or exam summary.
            return redirect()->route('exam.finish', $exam);
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

        // Save the user's answer to the database
        StudentExamAnswer::create([
            'student_id'   => auth()->id(), // You need to be logged in to access the user's ID
            'question_id'  => $question->id,
            'answer'       => $userAnswer,
            'score'        => $score,
        ]);

        if ($question->isNot($exam->questions->last())) {
            return redirect()->route('student.exam.question.show', ['exam' => $exam, 'question' => $question]);
        } else {
            return redirect()->route('student.exam.finish', $exam);
        }
    }

    public function finishExam(Exam $exam)
    {
        // return $exam;
        $user = auth()->user(); // Get the logged-in user

        // Check if the user has attempted all questions in the exam
        $attemptedQuestions = StudentExamAnswer::where('student_id', $user->id)
            ->whereHas('question', function ($query) use ($exam) {
                $query->where('exam_id', $exam->id);
            })
            ->count();

        $totalScore = StudentExamAnswer::where('student_id', $user->id)
            ->whereHas('question', function ($query) use ($exam) {
                $query->where('exam_id', $exam->id);
            })
            ->sum('score');


        if ($attemptedQuestions == $exam->questions->count()) {
            // User has completed the exam; you can calculate the score here if needed

            ExamAttempt::create([
                'user_id'       => auth()->id(),
                'exam_id'       => $exam?->id,
                'score'         => $totalScore,
                'is_completed'  => true,
                'started_at'    => now(),
                'finished_at'   => now(),
                'notes'         => 'exam has been finished now',
            ]);

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
        return $exam;
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
            'avatar'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

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

        auth()->user()->update($data);

        return redirect()->back()->withSuccess("Profile has been updated!");
    }
}
