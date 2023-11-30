<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Razorpay\Api\Api;

class AuthController extends Controller
{
    protected Course $course;

    public function register(Request $request)
    {
        if (auth()->check()) {
            $user = User::find(auth()->id());
            $user->load('lastest_course');
            if ($user?->lastest_course) {
                if ($user?->lastest_course?->payment_status == false) {
                    return to_route('payment')->withErrors('Your previous course registration fee was due! please make sure pay right now and get your certificate.');
                }else{
                    return to_route('student.exams');
                }
            }
        }

        $courses = $this->getCourses();
        return view('register')->with('courses', $courses);
    }
    public function registerStore(Request $request)
    {
        $request->validate([
            'user_id'        => 'nullable',
            'course_id'      => 'required',
            'name'           => 'required',
            'email'          => 'required|email|unique:users,email,'.$request->user_id,
            'mobile'         => 'required',
            'father_name'    => 'required',
            'mother_name'    => 'required',
            'dob'            => 'required',
            'gender'         => 'required',
        ]);

        // return $request;

        if (auth()->check()) {
            $user = User::find(auth()->id());
            $user->is_insider  = true;
        } else {
            $user = new User;
            $user->password           = Hash::make(Str::random(8));
            $user->is_insider         = false;
            $user->role               = 'student';
            $user->status             = 1;
            $user->email_verified_at  = now();
        }

        $user->name               = $request->name;
        $user->email              = $request->email;
        $user->mobile             = $request->mobile;
        $user->father_name        = $request->father_name;
        $user->mother_name        = $request->mother_name;
        $user->dob                = $request->dob;
        $user->gender             = $request->gender;

        $user->save();

        $user->courses()->create([
            'course_id'        => $request->course_id,
            'payment_status'   => false,
        ]);

        Auth::login($user);

        if (auth()->check()) {
            $request->session()->regenerate();
            return redirect()->route('student.exams');
        }

        return back()->withErrors('Something went wrong!');
    }
    // login related method
    public function login(Request $request)
    {
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password,
            'status'    => 1,
            'role'      => 'student'
        ])) {
            $request->session()->regenerate();
            return redirect()->route('register');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    // helper function
    public function getCourse($slug)
    {
        return Course::where('slug', $slug)
            ->where('status', 'active')
            ->first();
    }
    // helper function
    public function getCourses()
    {
        return Course::where('status', 'active')
            ->get();
    }
    // payment related method
    public function payment()
    {
        if (!auth()->check()) {
            return redirect()->to(config('app.main_url'));
        }
        $user = User::find(auth()->id());
        $user->load('lastest_course');

        // return $user;
        return view('payment')->with('user', $user);
    }
    public function doPayment(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $user = auth()->user();
                $payment = $api->payment->fetch($input['razorpay_payment_id']);
                $response = $api->payment->fetch($input['razorpay_payment_id'])
                    ->capture(array('amount' => $payment['amount']));

                $data['razorpay_payment_id'] = $input['razorpay_payment_id'];
                $data['id']                  = $response['id'];
                $data['amount']              = $response['amount'];
                $data['card']                = (array)$response['card'];
                $data['created_at']          = $response['created_at'];

                $user->lastest_course->update(['payment_status' => true, 'payment' => $data]);
                return to_route('student.exams')->with('success', 'Payment successful, you can take the exam now.');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors($e->getMessage());
            }
        }
        return redirect()->back()->withErrors("Something went wrong! please try again.");
    }
}
