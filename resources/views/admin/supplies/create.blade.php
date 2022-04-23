@extends('admin.layouts.app')
@section('content')
    <div class="main flex">
        @include('admin.layouts.menu')
        <link rel="stylesheet" href="assets/css/supplies.min.css">
        <div class="content">
            @if (session('success'))
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('success') }}
              </div>
              @elseif(session('success'))
              <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('success') }}
              </div>
              @endif
            <form action="{{ route('admin.supplies.upcreate') }}" method="post" enctype="multipart/form-data">
                <h3>Thêm tài khoản giáo viên mới</h3>
                {{ csrf_field() }}
                <div class="mb-3 mt-3">
                    <label for="matb" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="matb" required placeholder="username" name="username">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="name" required placeholder="Password" name="Password">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Tên GV:</label>
                    <input type="text" class="form-control" id="name" required placeholder="Tên gv" name="tengv">
                </div>
                <div class="mb-3 mt-3">
                <label for="slt" class="form-label">Ngày sinh:</label>
                    <input class="form-control" style='width:20%;display: inline;' type="date" name="ngaysinh" id="startTime">
               
                </div>     
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Bộ môn:</label>
                    <select name="idbomon" id="bomon" class="category combobox">
                            <option value="0">Chọn</option>
                            <option value="1">Toán</option>
                            <option value="2">Lý</option>
                            <option value="3">Hóa</option>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="mota" class="form-label">Chức vụ:</label>
                    <input type="text" class="form-control" id="mota" required placeholder="Chức vụ" name="chucvu">
                </div>
                <div class="mb-3 mt-3">
                    <label for="sl" class="form-label">Số điện thoại:</label>
                    <input type="text" class="form-control" id="sl" required placeholder="Số điện thoại" name="sdt"></input>
                </div>                
                <div class="mb-3 mt-3">
                    <label for="dvt" class="form-label">Email</label>
                    <input type="email" class="form-control" id="dvt" required placeholder="abc@gmail.com" name="email">
                </div>                
                <button type="submit" class="btn btnSubmit btn-primary">Tạo tài khoản</button>
              </form>
        </div>
    </div>
@endsection