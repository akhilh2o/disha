<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function examAttempts()
    {
        return $this->hasMany(ExamAttempt::class);
    }

    //     3. Usage:

    // With these relationships in place, you can easily query and use the relationships in your application. For example:

    //     To get all questions for a specific exam:

    // php

    // $exam = Exam::find($examId);
    // $questions = $exam->questions;

    //     To get the user who attempted an exam:

    // php

    // $attempt = ExamAttempt::find($attemptId);
    // $user = $attempt->user;

    //     To get all attempts for a specific exam:

    // php

    // $exam = Exam::find($examId);
    // $attempts = $exam->attempts;

    //     To get all attempts by a specific user:

    // php

    // $user = User::find($userId);
    // $attempts = $user->examAttempts;

    // These relationships will allow you to organize and access data in your application based on the relationships between exams, questions, answers, and user attempts. You can use these relationships to track user attempts, calculate scores, and provide insights into exam performance.


}
