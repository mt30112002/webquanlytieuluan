<?php

namespace App\Http\Controllers;

use App\Models\lophoc;
use Illuminate\Http\Request;

class lophocController extends Controller
{
    public function show(){
        // Lấy danh sách môn học với thông tin giảng viên và số lượng sinh viên đăng ký
        $danhSachMonHoc = lophoc::with('giangVien')->get();

        // Thực hiện bất kỳ xử lý nào bạn cần với dữ liệu $danhSachMonHoc

        return view('QLlophoc.danhsachlop')->with('danhSachMonHoc', $danhSachMonHoc);
    }
}
