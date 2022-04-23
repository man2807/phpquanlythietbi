@extends('admin.layouts.app')
@section('content')
    <div class="main flex">
        @include('admin.layouts.menu')
        <link rel="stylesheet" href="assets/css/supplies.min.css">
        <div class="content">
            <div class="content_top">
                <div class="filter flex">
                    <div class="filter-left ">
                        <form action="{{ route('admin.supplies.postFiltertrats') }}" method="post">
                        {{ csrf_field() }} 
                            <label for="" class="list"><i style="color: blue" class="fal fa-filter"></i> Bộ môn</label>
                                <select name="bomon" id="bomon" class="category combobox" onchange='if(this.value != null) { this.form.submit(); }'>
                                    <option value="">Chọn</option>
                                    <option value="0">Tất cả</option>
                                    <option value="1">Toán</option>
                                    <option value="2">Lý</option>
                                    <option value="3">Sinh</option>
                                </select>
                            <label for="" class="list"><i style="color: blue" class="fal fa-filter"></i> Giáo Viên</label>
                            <select name="idgv" id="tengv" class="category combobox" onchange='if(this.value != null) { this.form.submit(); }'> 
                                @if ($giaoviens!=null){
                                    @foreach($giaoviens as $giaovien)
                                        <option value="{{ $giaovien->id }}">{{ $giaovien->tengv }}</option>
                                    @endforeach 
                                @}
                                @endif
                            </select>  
                            <label for="" class="list"><i style="color: blue"></i> Ngày mượn:</label>
                            <label for="" class="list"><i style="color: blue"></i>{{ $today }}</label>
                        </form>   
                        <button id='trats' class="btn btn-primary">Trả thiết bị</button>
                    </div>
                    <!-- <div class="filter-right">
                        <label for="" class="list"><i style="color: blue" class="fal fa-location"></i> Tình trạng</label>
                        <select name="category" id="category" class="category combobox">
                            <option value="1">Tất cả</option>
                            <option value="2">Còn hàng</option>
                            <option value="3">Đang được bán</option>
                            <option value="4">Hết hàng</option>
                        </select>
                        
                    </div> -->
                </div>
            </div>
            <div class="content_bottom">
                <table class="table table-hover table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên thiết bị</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn vị tính</th>
                        <th scope="col">Số lượng hỏng</th>
                        <th scope="col">Số lượng tốt</th>
                        <th scope="col">Giá mua</th>
                        <th scope="col">Tổng SL mượn</th>
                        <th scope="col">SL mượn</th>
                        <th scope="col">Ngày giờ mượn</th>
                        <th scope="col" for="sltt">SL trả tốt</th>
                        <th scope="col" for="slth">SL trả hỏng</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($supplie as $item)
                            <div class="product_list_item col-lg-4">
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->tentb }}</td>
                                    <td>{{ $item->mota }}</td>
                                    <td>{{ $item->soluong }}</td>
                                    <td>{{ $item->donvitinh }}</td>
                                    <td>{{ $item->soluonghong }}</td>
                                    <td>{{ $item->soluongtot }}</td>
                                    <td>{{ $item->giamua }}</td>
                                    <td>{{ $item->tongsoluongmuon }}</td>
                                    <td>{{ $item->soluongmuon }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->ngaymuon)->format('d/m/Y h:m:s') }}</td>
                                    <input class='sltra3ts' value="{{ $item->idtb }}" type="hidden">
                                    <input class='sltra2ts' value="{{ $item->idchitietmuon }}" type="hidden">
                                    <td><input class='sltratotts' id= "input"  name="sltt" type="number" value="0" min="0" max="{{ $item->soluongmuon }}"></input></td>
                                    <td><input class='sltrahongts' id= "input"  name="slth" type="number" value="0" min="0" max="{{ $item->soluongmuon }}"></input></td>
                                </tr>
                            </div>
                        @endforeach      
                    </tbody>
                  </table>
            </div>
            @include('admin.layouts.popupTravt')
        </div>
        
    </div>
@endsection