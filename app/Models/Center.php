<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCenterCodeAttribute()
    {
        // Prefix for the roll number
        $prefix = 'C0';

        // Combine prefix and id with a hyphen
        return "{$prefix}{$this->id}";
    }

    public function students()
    {
        return $this->hasMany(User::class);
    }
}
