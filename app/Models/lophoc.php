<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lophoc extends Model
{
    use HasFactory;
    protected $table = 'courses';

    public function giangVien()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id');
    }
}
