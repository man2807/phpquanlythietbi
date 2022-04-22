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
            <form action="{{ route('admin.member.sendNewPass') }}" method="post" enctype="multipart/form-data">
                <h3>Thay đổi mật khẩu</h3>
                {{ csrf_field() }}
                <input type="text" name='id' hidden>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Mật khẩu cũ</label>
                    <input type="text" class="form-control" id="oldpass" required placeholder="Mật khẩu cũ ..." name="oldpass">
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Mật khẩu mới</label>
                    <input type="password" class="form-control" id="newpass" required placeholder="Mật khẩu mới ..." name="newpass">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Nhắc lại mật khẩu mới</label>
                    <input type="password" class="form-control" id="cf_newpass" required placeholder="Nhập lại mật khẩu mới" name="cf_newpass">
                </div>
                <button type="submit" name='add' class="btn btnSubmit btn-primary">Thay đổi mật khẩu</button>
            </form>
        </div>
    </div>
@endsection