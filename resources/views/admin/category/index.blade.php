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
            <form action="{{ route('admin.category.insert') }}" method="post" enctype="multipart/form-data">
                <h3>Thay đổi danh mục</h3>
                {{ csrf_field() }}
                <input type="text" name='id' hidden>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Nhập tên danh mục</label>
                    <input type="text" class="form-control" id="category" required placeholder="Nhập tên danh mục" name="category">
                </div>
                <button type="submit" name='add' class="btn btnSubmit btn-primary">Thêm danh mục</button>
            </form>
            <div class="View">
                <br>
                <h5>Hiển thị danh mục</h5>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Hành động</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><a data-id="{{ $item->id }}" class="btn deleteCategory">Xóa</a></td>
                        </tr>
                      @endforeach                  
                    </tbody>
                  </table>
            </div>
        </div>
        
    </div>
@endsection