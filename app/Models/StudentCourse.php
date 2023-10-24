<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class StudentCourse extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the payment detail.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function payment(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
