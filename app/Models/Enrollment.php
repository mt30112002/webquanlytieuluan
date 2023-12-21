<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $table = 'enrollments';
    protected $primaryKey = 'enrollment_id';
    protected $fillable = [
        'course_id',
        'student_id',
        // các trường khác...
    ];
    // Mối quan hệ với bảng MonHoc (Course)
    public function monHoc()
    {
        return $this->belongsTo(lophoc::class, 'course_id');
    }

    // Mối quan hệ với bảng User (SinhVien)
    public function sinhVien()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
