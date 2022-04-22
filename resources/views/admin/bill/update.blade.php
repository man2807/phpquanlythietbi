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
            <h3>Cập nhật hóa đơn</h3>
            <div class="search_box flex">
                <input id='search_input' type="text" style="width:50%" placeholder="Nhập mã hóa đơn">
                <button id='search_bill' class='btn search_bill' style="width:100px" ><i class="fal fa-search"></i></button>
            </div>
            <form action="{{ route('admin.bill.pot.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" id='id' name='id' hidden>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Thông tin khách hàng:</label>
                    <input type="text" class="form-control" id="name_kh" required placeholder="Nhập số điện thoại khách hàng">
                    <input type="text" hidden class="form-control" id="id_custemer" required name="id_custemer">
                    <a href='{{ route('admin.bill.custemer') }}' class="addCustemer">Thêm khách hàng</a>
                </div>
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Tên thiết bị :</label>
                    <input type="text" class="form-control" id="name_pc" required placeholder="Nhập tên thiết bị sửa chữa" name="name_pc">
                </div>
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Nội dung sửa chữa:</label>
                    <textarea type="text" class="form-control" id="content" required placeholder="Mô tả chi tiết" name="content"></textarea>
                </div>
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">Thông tin thêm:</label>
                    <textarea type="text" class="form-control" id="note" required placeholder="Thông tin thêm" name="note"></textarea>
                </div>
                <div class="mb-3 mt-3">
                    <label for="number" class="form-label">Thời gian dự nhận:</label>
                    <input type="date" class="form-control" id="time_in" required  name="time_in">
                </div>
                <div class="mb-3 mt-3">
                    <label for="number" class="form-label">Thời gian dự kiến giao:</label>
                    <input type="date" class="form-control" id="time_out" required  name="time_out">
                </div>
                <div class="mb-3 mt-3">
                    <label for="number" class="form-label">Phí sửa chữa</label>
                    <input type="number" class="form-control" id="suachua" required placeholder="Phí sửa chữa" name="suachua">
                </div>
                <div class="mb-3 mt-3">
                    <label for="number" class="form-label">Các vật tư:</label>
                    <input type="text" id ='listVat' hidden name ='listVat'>
                    <ul id="vattu" class="flex">
                        
                    </ul>
                </div>
                <div class="subvatTu">
                    <label for="browser" class="form-label">Chọn thêm vật tư</label>
                    @if (count($supplie) == 0)
                        <label for="" style="color: red;">(Không có vật tư) <a href='{{ route('admin.supplies.create') }}'>Thêm vật tư</a></label>
                    @endif
                    <input class="form-control" list="browsers" id="browser">
                    <datalist id="browsers">
                        @foreach($supplie as $item)
                            <option value="[{{ $item->id }}]| {{ $item->name }} |({{ $item->price_out }})">
                        @endforeach
                    </datalist>
                    <a id='addVat' class="btn addVat">Thêm vật tư vào hóa đơn</a>
                </div>
                <div class="mb-3 mt-3">
                    <label for="number" class="form-label">Phí Vật tư:</label>
                    <input type="number" class="form-control" id="supplie" required placeholder="Phí vật tư" name="supplie">
                </div>
                <div class="mb-3 mt-3">
                    <label for="number" class="form-label">Trạng thái: </label>
                    <select class="form-select" name="status" id="status">
                        <option value="1">Chưa hoàn thành</option>
                        <option value="2">Đã hoàn thành</option>
                    </select>
                </div>
                <button type="submit" class="btn btnSubmit btn-primary">Cập nhật hóa đơn</button>
            </form>
        </div>
    </div>
@endsection