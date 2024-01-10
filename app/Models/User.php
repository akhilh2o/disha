<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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

    public function getRollNumberAttribute()
    {
        // Prefix for the roll number
        $prefix = '50000';

        // Combine prefix and id with a hyphen
        return "{$prefix}{$this->id}";
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@gmail.com') && $this->hasVerifiedEmail();
    }

    public function center()
    {
        return $this->hasOne(Center::class,'id','center_id');
    }

    public function courses()
    {
        return $this->hasMany(StudentCourse::class, 'student_id', 'id')->with('course');
    }

    public function lastest_course()
    {
        return $this->hasOne(StudentCourse::class, 'student_id', 'id')->with('course')->latestOfMany();
    }

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
