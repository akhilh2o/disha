<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function image()
    {
        if ($this->image) {
            if (app()->environment('local')) {
                return asset('storage/' . $this->image);
            } else {
                return url('storage/app/public/' . $this->image);
            }
        } else {
            return 'https://placehold.co/500x300';
        }
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    public function exam()
    {
        return $this->hasOne(Exam::class);
    }
}
