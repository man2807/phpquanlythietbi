<ul class="menu">
    <li class="menu_item">
        <a href="{{ route('admin.home.index') }}" class="link"><i class="fal fa-home"></i> Trang chủ</a>
    </li>
    <li class="menu_item">
        <a href="{{ route('admin.supplies.indexts') }}" class="link"><i class="fal fa-tasks"></i> Quản lý tài sản công</a>
        <ul class="sub">
            <li class="sub_item">
                <a href="{{ route('admin.supplies.indexts') }}" class="link">Cập nhật tài sản</a>
            </li>   
            <li class="sub_item">
                <a href="{{ route('admin.supplies.indexts') }}" class="link">Thống kê tài sản</a>
            </li>                      
        </ul>
    </li>
    <li class="menu_item">
        <a href="{{ route('admin.supplies.index') }}" class="link"><i class="fal fa-id-card-alt"></i>Quản lý TB dạy học</a>
        <ul class="sub">          
            <li class="sub_item">
                <a href="{{ route('admin.supplies.muonvt') }}" class="link">Mượn thiết bị</a>
            </li>
            <li class="sub_item">
                <a href="{{ route('admin.supplies.travt') }}" class="link">Trả thiết bị</a>
            </li>
            <li class="sub_item">
                <a href="{{ route('admin.supplies.index') }}" class="link">Thống kê thiết bị</a>
            </li>            
        </ul>
    </li>
    <!-- <li class="menu_item">
        <a href="{{ route('admin.supplies.nhapexcel') }}" class="link"><i class="fal fa-money-bill-wave"></i> Nhập TB file Excel</a>
        <ul class="sub">
        </ul>
    </li> -->

    <li class="menu_item">
        <a href="{{ route('admin.supplies.import') }}" class="link"><i class="fal fa-money-bill-wave"></i> Nhập dữ liệu</a>
        <ul class="sub">
            <li class="sub_item">
                <a href="{{ route('admin.supplies.import') }}" class="link">Danh mục Tài sản</a>
            </li>
            <li class="sub_item">
                <a href="{{ route('admin.supplies.importTaiSan') }}" class="link">Tài sản</a>
            </li>
            <li class="sub_item">
                <a href="{{ route('admin.supplies.importThietBi') }}" class="link">Thiết bị</a>
            </li>
            <li class="sub_item">
                <a href="{{ route('admin.supplies.importGiaoVien') }}" class="link">Giáo viên</a>
            </li>
        </ul>
    </li>
    <li class="menu_item">
        <a href="" class="link"><i class="fal fa-money-bill-wave"></i> Xuất báo cáo</a>
        <ul class="sub">
            <li class="sub_item">
                <!-- <a href="{{ route('admin.supplies.export') }}" class="link">Danh mục Tài sản</a> -->
            </li>
            <li class="sub_item">
                <a href="" class="link">Tài sản</a>
            </li>
            <li class="sub_item">
                <a href="" class="link">Thiết bị</a>
            </li>
        </ul>
    </li>
    
</ul>