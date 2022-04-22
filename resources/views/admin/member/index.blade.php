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
            @elseif(session('failed'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('failed') }}
            </div>
            @endif
            <form action="{{ route('admin.member.send') }}" method="post" enctype="multipart/form-data">
                <h3>Thêm nhân viên</h3>
                {{ csrf_field() }}
                <input type="text" name='id' hidden>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Tên nhân viên</label>
                    <input type="text" class="form-control" id="name_ct" required placeholder="Nhập tên nhân viên" name="name_ct">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="username" required placeholder="Nhập tên đăng nhập" name="username">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" required placeholder="Nhập số điện thoại" name="phone">
                </div>
                <button type="submit" name='add' class="btn btnSubmit btn-primary">Thêm nhiên viên</button>
            </form>
        </div>
    </div>
@endsection