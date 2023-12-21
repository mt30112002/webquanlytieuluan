@extends('master')
@section('Content')
    <h1>Danh Sách Lớp</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Lớp</h6>
            <a href="#" class="btn btn-success float-right">Thêm Lớp Học</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên môn học</th>
                            <th>Giảng viên</th>
                            <th>Số lượng sinh viên</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($danhSachMonHoc as $monHoc)
                            <tr>
                                <td>{{ $monHoc->CourseName }}</td>
                                <td>{{ $monHoc->giangVien->name }}</td>
                                <td>{{ $monHoc->enrollments->count() }}
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('route.lophoc.chitiet', ['id'=>$monHoc->id]) }}">thông tin lớp</a>
                                    <a class="btn btn-danger">Xoá lớp</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
