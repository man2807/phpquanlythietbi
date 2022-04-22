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
            <form action="{{ route('admin.bill.pot.custemer') }}" method="post" enctype="multipart/form-data">
                <h3>Chỉnh sửa và thêm khách hàng</h3>
                {{ csrf_field() }}
                <input type="text" name='id' hidden>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Tên khách hàng</label>
                    <input type="text" class="form-control" id="name_ct" required placeholder="Nhập tên khách hàng" name="name_ct">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Tên địa chỉ email</label>
                    <input type="email" class="form-control" id="email" required placeholder="Nhập địa chỉ email" name="email">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Nhập số điện thoại</label>
                    <input type="text" class="form-control" id="phonenumber" required placeholder="Nhập số điện thoại" name="phone">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Nhập mã sinh viên(nếu có)</label>
                    <input type="text" class="form-control" id="msv" required placeholder="Nhập mã sinh viên" name="msv">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" required placeholder="Địa chỉ hiện tại" name="address">
                </div>
                <button type="submit" name='add' class="btn btnSubmit btn-primary">Thêm khách hàng</button>
                <button type="submit" name='update' class="btn btnSubmit btn-primary">Cập nhật</button>
            </form>
            <h4 style="margin-top: 15px">Khách hàng đã thêm gần đây</h4>
        </div>
    </div>
@endsection