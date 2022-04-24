@extends('admin.layouts.app')
@section('content')
    <div class="main flex">
        @include('admin.layouts.menu')
        <link rel="stylesheet" href="assets/css/supplies.min.css">
        <div class="content text-center">
            <div class="content_top">
                <div class="filter flex">                    
                    <div class="filter-left ">
                        <label for="" class="list"><i style="color: blue" class="fal fa-filter"></i> Thể loại</label>
                        <select name="category" id="category" class="category combobox">
                            <option value="1">Tất cả</option>
                        </select>                        
                    </div>
                    <div class="filter-right">
                        <label for="" class="list"><i style="color: blue" class="fal fa-location"></i> Tình trạng</label>
                        <select name="category" id="category" class="category combobox">
                            <option value="1">Tất cả</option>
                        </select>
                    </div>
                    <div>
                    <a class="btn btn-success" href="">Xuất báo cáo</a>
                    </div>
                </div>
            </div>
            <div class="content_bottom">
            <table class="table table-bordered table-striped text-center">
                    <thead>
                      <tr class="bg-info">
                        <th scope="col">#</th>
                        <th scope="col">Tên thiết bị</th>
                        <th scope="col">Vị trí</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Ngày mua</th>
                        <th scope="col">Giá mua</th>
                        <th scope="col">Ghi chú</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($supplie as $item)
                            <div class="product_list_item col-lg-4">
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->mota }}</td>  
                                    <td>{{ $item->vitri }}</td>                              
                                    <td>{{ $item->tinhtrang }}</td>                                    
                                    <td>{{ $item->ngaymua }}</td>
                                    <td>{{ $item->giamua }}</td>
                                    <td>{{ $item->ghichu }}</td>
                                </tr>
                            </div>
                        @endforeach      
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection