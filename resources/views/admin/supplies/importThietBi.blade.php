
@extends('admin.layouts.app')
@section('content')
<!DOCTYPE html>
<html>

<head>
    <title>Nhập dữ liệu Tài sản</title>
    
    <link rel="stylesheet" href="assets/css/supplies.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
</head>

<body>
    <br />
    <div class="main flex">
    @include('admin.layouts.menu')
        <div class="content">
            <div class="container">
                <h3 align="center">Nhập dữ liệu Thiết Bị</h3>
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
                <form method="post" enctype="multipart/form-data" action="{{ route('admin.supplies.importThietBi2') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <table class="table">
                            <tr>
                                <td width="40%" align="right"><label>Select File for Upload</label></td>
                                <td width="30">
                                    <input type="file" name="fileTB" />
                                </td>
                                <td width="30%" align="left">
                                    <input type="submit" name="upload" class="btn btn-primary" value="Nhập">
                                    <a class="btn btn-success" href="{{ route('admin.supplies.exportThietBi') }}">Xuất Excel</a>
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
                        <h3 class="panel-title">DANH SÁCH THIẾT BỊ</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                    <thead>
                      <tr class="bg-info">
                                    <th>ID</th>
                                    <th>Mã Thiết Bị</th>
                                    <th>Tên Thiết Bị</th>
                                    <th>Mã DMTB</th>
                                    <th>Mã Bộ Môn</th>
                                    <th>Mô tả</th>
                                    <th>Số Lượng</th>
                                    <th>Đơn Vị</th>
                                    <th>Số Lượng Hỏng</th>
                                    <th>Số Lượng Tốt</th>
                                    <th>Ghi Chú</th>
                                    <th>Ngày Mua</th>
                                    <th>Giá Mua</th>
                                    <th>Số Lượng Mượn</th>
                                    <th>Mã Kho</th>
                                </tr>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->matb }}</td>
                                    <td>{{ $row->tentb }}</td>
                                    <td>{{ $row->iddanhmuc }}</td>
                                    <td>{{ $row->idbomon }}</td>
                                    <td>{{ $row->mota }}</td>
                                    <td>{{ $row->soluong}}</td>
                                    <td>{{ $row->donvitinh}}</td>
                                    <td>{{ $row->soluonghong}}</td>
                                    <td>{{ $row->soluongtot}}</td>
                                    <td>{{ $row->ghichu}}</td>
                                    <td>{{ $row->ngaymua}}</td>
                                    <td>{{ $row->giamua}}</td>
                                    <td>{{ $row->soluongmuon}}</td>
                                    <td>{{ $row->makho}}</td>
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