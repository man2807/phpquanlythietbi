@extends('admin.layouts.app')
@section('content')
    <div class="main flex">
        @include('admin.layouts.menu')
        <div class="content">
        <div class="title">
            <h1>Thống kê tháng {{ $month }}</h1>
            
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Số đơn nhận</th>
            <th scope="col">Số đơn hoàn thành</th>
            <th scope="col">Tổng thu nhập</th>
            <th scope="col">Số khách hàng mới</th>
            </tr>
        </thead>
        @include('admin.layouts.vndSet')
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td><?php echo count($bill);  ?></td>
                <td><?php echo count($billOk);  ?></td>
                <td> <?php $TongBill = 0; 
                    foreach ($billOk as $item)
                    {
                        $TongBill += $item->suachua + $item->supplie;
                    }
                    $listId = "";
                    foreach ($bill as $item)
                    {
                        $listId = $listId . strval($item->id).",";
                    }
                    echo VndDot($TongBill)." VND";
                    ?>
                </td>
                <td><?php echo count($custemers);  ?></td>
            </tr>
        </tbody>
        </table>
        <button id='Export' class="btn" data-list="{{ $listId }}">Xuất hóa đơn tháng <img id='loading' style="opacity:0;visibility: hidden;" src="http://trangshipping.com/asset/images/loading.gif" alt="" srcset="" width="15px" height="15px"></button>
        <button id='ExportData' class="btn">Xuất thông tin theo <img id='loading1' style="opacity:0;visibility: hidden;" src="http://trangshipping.com/asset/images/loading.gif" alt="" srcset="" width="15px" height="15px"></button> Từ khoảng: <input class="form-control" style='width:20%;display: inline;' type="date" name="startTime" id="startTime"> -> <input class="form-control" style='width:20%;display: inline;' type="date" name="endTime" id="endTime">
        <h4>Khách hàng mới tháng  {{ $month }}</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($custemers as $item)
                    <tr>
                        <th scope="row"><i class="fas fa-user-check"></i></th>
                        <td>{{  $item->name }}</td>
                        <td>{{  $item->phone }}</td>
                        <td>{{  $item->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>  
        </div>
    </div>
@endsection