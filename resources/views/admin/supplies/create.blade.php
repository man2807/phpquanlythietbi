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
                <h3>Thêm thiết bị mới</h3>
                {{ csrf_field() }}
                <div class="mb-3 mt-3">
                    <label for="matb" class="form-label">Mã thiết bị</label>
                    <input type="text" class="form-control" id="matb" required placeholder="Mã thiết bị" name="matb">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Tên thiết bị:</label>
                    <input type="text" class="form-control" id="name" required placeholder="Nhập tên thiết bị" name="tentb">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Danh mục:</label>
                    <select name="iddanhmuc" id="danhmuc" class="category combobox">
                            <option value="0">Thiết bị PC</option>
                            <option value="1">Thiết bị Laptop</option>
                            <option value="2">Phụ kiện</option>
                    </select>
                    <a href="#" class="form-label"><br>Thêm danh mục</a>
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Bộ môn:</label>
                    <select name="idbomon" id="bomon" class="category combobox">
                            <option value="0">Toán</option>
                            <option value="1">Lý</option>
                            <option value="2">Hóa</option>
                    </select>
                </div>
                <div class="mb-3 mt-3">
                    <label for="mota" class="form-label">Mô tả:</label>
                    <input type="text" class="form-control" id="mota" required placeholder="Mô tả chi tiết" name="mota">
                </div>
                <div class="mb-3 mt-3">
                    <label for="sl" class="form-label">Số lượng:</label>
                    <input type="number" class="form-control" id="sl" required placeholder="Số lượng" name="soluong"></input>
                </div>                
                <div class="mb-3 mt-3">
                    <label for="dvt" class="form-label">Đơn vị tính</label>
                    <input type="text" class="form-control" id="dvt" required placeholder="Vd: cái, hộp, bộ ..." name="donvitinh">
                </div>                
                <div class="mb-3 mt-3">
                    <label for="slh" class="form-label">Số lượng hỏng:</label>
                    <input type="number" class="form-control" id="slh" required placeholder="Số lượng hỏng" name="slh">
                </div>
                <div class="mb-3 mt-3">
                    <label for="slt" class="form-label">Số lượng tốt:</label>
                    <input type="number" class="form-control" id="slt" placeholder="Số lượng tốt" name="slt">
                </div>
                <div class="mb-3 mt-3">
                    <label for="gc" class="form-label">Ghi chú:</label>
                    <input type="text" class="form-control" id="gc" placeholder="Ghi chú" name="ghichu">
                </div>
                <div class="mb-3 mt-3">
                <label for="slt" class="form-label">Ngày mua:</label>
                    <input class="form-control" style='width:20%;display: inline;' type="date" name="ngaymua" id="startTime">
                </div>
                <div class="mb-3 mt-3">
                    <label for="gm" class="form-label">Giá mua:</label>
                    <input type="text" class="form-control" id="gm" placeholder="Giá mua" name="giamua">
                </div>
                <div class="mb-3 mt-3">
                    <label for="mk" class="form-label">Mã kho:</label>
                    <input type="text" class="form-control" id="mk" placeholder="Mã kho" name="makho">
                </div>
                <button type="submit" class="btn btnSubmit btn-primary">Tạo thiết bị!</button>
              </form>
        </div>
    </div>
@endsection