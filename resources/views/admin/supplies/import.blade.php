<!-- <!DOCTYPE html>
<html>
<head>
    <title>Import Export Excel to database</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">

    <div class="card bg-light mt-3">
        <div class="card-header">
            NHẬP, XUẤT DANH MỤC TÀI SẢN
        </div>
        <div class="card-body">
            <form action="{{ route('admin.supplies.import2') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Nhập</button>
                <a class="btn btn-warning" href="{{ route('admin.supplies.export') }}">Xuất</a>
            </form>
        </div>
    </div>
</div> -->
@extends('admin.layouts.app')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Nhập dữ liệu Danh mục Tài sản</title>
    <link rel="stylesheet" href="assets/css/supplies.min.css">
</head>

<body>
    <br />
    <div class="main flex">
    @include('admin.layouts.menu')
        <div class="content">
            <div class="container">
                <h3 align="center">Nhập dữ liệu Danh mục Tài sản</h3>
                <br />
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    Upload Validation Error<br><br>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <form method="post" enctype="multipart/form-data" action="{{ route('admin.supplies.import2') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <table class="table">
                            <tr>
                                <td width="40%" align="right"><label>Select File for Upload</label></td>
                                <td width="30">
                                    <input type="file" name="file" />
                                </td>
                                <td width="30%" align="left">
                                    <input type="submit" name="upload" class="btn btn-primary" value="Nhập">
                                    <a class="btn btn-success" href="{{ route('admin.supplies.export') }}">Xuất Excel</a>
                                </td>
                            </tr>
                            <tr>
                                <td width="40%" align="right"></td>
                                <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                                <td width="30%" align="left"></td>
                            </tr>
                        </table>
                    </div>
                </form>

                <br />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">DANH SÁCH DANH MỤC TÀI SẢN</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Mã DMTS</th>
                                    <th>Tên DMTS</th>
                                    <th>Số Lượng</th>
                                    <th>Đơn Vị</th>
                                    <th>Ghi Chú</th>
                                    <th>Trạng Thái</th>
                                </tr>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->madmtaisan }}</td>
                                    <td>{{ $row->tendmtaisan }}</td>
                                    <td>{{ $row->soluong }}</td>
                                    <td>{{ $row->donvitinh }}</td>
                                    <td>{{ $row->ghichu }}</td>
                                    <td>{{ $row->status }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
@endsection