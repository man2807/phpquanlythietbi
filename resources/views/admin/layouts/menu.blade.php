<ul class="menu">
    <li class="menu_item">
        <a href="{{ route('admin.home.index') }}" class="link"><i class="fal fa-home"></i> Trang chủ</a>
    </li>
    <li class="menu_item">
        <a href="" class="link"><i class="fal fa-tasks"></i> Quản lý tài sản công</a>
        <ul class="sub">
            <li class="sub_item">
                <a href="{{ route('admin.supplies.muonvt') }}" class="link">Mượn tài sản</a>
            </li>
            <li class="sub_item">
                <a href="{{ route('admin.supplies.index') }}" class="link">Trả tài sản</a>
            </li>   
            <li class="sub_item">
                <a href="{{ route('admin.supplies.index') }}" class="link">Thống kê tài sản</a>
            </li>                      
        </ul>
    </li>
    <li class="menu_item">
        <a href="" class="link"><i class="fal fa-id-card-alt"></i>Quản lý TB dạy học</a>
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
    <li class="menu_item">
        <a href="{{ route('admin.supplies.nhapexcel') }}" class="link"><i class="fal fa-money-bill-wave"></i> Nhập TB file Excel</a>
        <ul class="sub">
        </ul>
    </li>
    <li class="menu_item">
        <a href="" class="link"><i class="fal fa-money-bill-wave"></i> Xuất báo cáo</a>
        <ul class="sub">
        </ul>
    </li>
    
</ul>