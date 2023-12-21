<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\lophoc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class lophocController extends Controller
{
    public function show()
    {
        // Lấy danh sách môn học với thông tin giảng viên và số lượng sinh viên đăng ký
        $danhSachMonHoc = lophoc::with('giangVien')->get();

        // Thực hiện bất kỳ xử lý nào bạn cần với dữ liệu $danhSachMonHoc

        return view('QLlophoc.danhsachlop')->with('danhSachMonHoc', $danhSachMonHoc);
    }

    public function chitiet($id)
    {

        $monHoc = lophoc::with('giangVien', 'enrollments')->find($id);
        $danhSachSinhVien = $monHoc->enrollments;

        return view('QLlophoc.chitietlop', ['monHoc' => $monHoc, 'danhSachSinhVien' => $danhSachSinhVien]);
    }
    public function addStudent(Request $request, $id)
    {
        if ($request->filled('student_id')) {
            $studentId = $request->input('student_id');

            // Kiểm tra mức độ duy nhất trước khi thêm sinh viên
            $isUnique = DB::table('enrollments')
                ->where('student_id', $studentId)
                ->where('course_id', $id)
                ->doesntExist();

            if ($isUnique) {
                // Sinh viên không tồn tại trong lớp học, thực hiện thêm sinh viên
                $this->addStudentById($studentId, $id);
            } else {
                // Sinh viên đã tồn tại trong lớp học, xử lý lỗi
                return redirect()->route('route.lophoc.chitiet', ['id' => $id])->with('error', [
                    'message' => 'Sinh viên đã tham gia lớp này.',
                    'studentId' => $studentId,
                ]);
            }
        }

        // Kiểm tra xem người dùng đã upload file CSV hay chưa
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $this->addStudentsFromCSV($file, $id);
        }
        return redirect()->route('route.lophoc.chitiet', ['id' => $id]);
    }
    private function addStudentById($studentId, $course_id)
    {
        // Thêm sinh viên vào bảng Enrollment
        Enrollment::create([
            'course_id' => $course_id,
            'student_id' => $studentId,
        ]);
        // Các bước khác nếu cần
    }

    private function addStudentsFromCSV($file, $course_id)
    {
        // Check if a file was uploaded
        if ($file) {
            $contents = file_get_contents($file->path());
            $lines = explode(PHP_EOL, $contents);

            foreach ($lines as $line) {
                $data = str_getcsv($line);

                // Assuming student ID is in the first column
                $studentId = $data[0];

                // Check if the student already exists in the enrollment for the given course
                $enrollmentExists = Enrollment::where('student_id', $studentId)
                    ->where('course_id', $course_id)
                    ->exists();

                // If the student does not exist, add them to the enrollment
                if (!$enrollmentExists) {
                    $this->addStudentById($studentId, $course_id);
                }
            }
        } else {
            // Handle the case where no file was uploaded
            return redirect()->route('route.lophoc.chitiet', ['id' => $course_id])->with('error', 'Không có file CSV được tải lên.');
        }
    }

}
