@extends('master')
@section('Content')
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error')['message'] }}
        @if(isset(session('error')['studentId']))
            Mã số sinh viên: {{ session('error')['studentId'] }}
        @endif
    </div>
@endif
    <h3><span style="color: blue">Tên Môn Học:</span> {{ $monHoc->CourseName }}</h3>
    <h3><span style="color: blue">Giảng viên:</span> {{ $monHoc->giangVien->name }}</h3>
    <h3><span style="color: blue">Năm học:</span> {{$monHoc->NamHoc}}</h3>
    <h3><span style="color: blue">Học kỳ:</span> {{$monHoc->HocKy}}</h3>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Danh sách sinh viên</h5>
            <a href="#" class="btn btn-success float-right" data-toggle="modal" data-target="#themsinhvienModal" >Thêm Sinh Viên</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sinh viên</th>
                            <th>Mssv</th>
                            <th>Email sinh viên</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($danhSachSinhVien as $sinhVien)
                            <tr>
                                <td>{{ $sinhVien->sinhVien->name }}</td>
                                <td>{{ $sinhVien->sinhVien->id }}</td>
                                <td>{{ $sinhVien->sinhVien->email }}</td>
                                <td>
                                    <!-- Các chức năng -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="themsinhvienModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Sinh viên</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Thêm sinh viên</span>
                    <form action="{{ route('route.lophoc.addStudent', ['id' => $monHoc->id]) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="inputMssv" class="form-label">Mã số sinh viên:</label>
                            <input type="text" class="form-control" id="inputMssv" name="student_id">

                            <span>Hoặc</span>
                            <input type="file" name="file_upload" id="file_upload" accept=".csv">

                            <button type="submit" class="btn btn-primary">Thêm sinh viên</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
