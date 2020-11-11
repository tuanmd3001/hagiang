<li class="treeview {{ Request::is('hoiNghiHoiThao*') ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-cogs"></i>
        <span>Hội nghị, hội thảo quốc tế</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('hoiNghiHoiThao*' && Request::get("type") != \App\Models\HoiNghiHoiThao::TYPE_JOIN) ? 'active' : '' }}">
            <a href="{{ route('hoiNghiHoiThao.index') }}">
                <i class="fa fa-edit"></i>
                <span>Chủ trì, tổ chức hoặc <br> tham mưu tỉnh chủ trì tổ chức</span></a>
        </li>
        <li class="{{ Request::is('hoiNghiHoiThao*' && Request::get("type") == \App\Models\HoiNghiHoiThao::TYPE_JOIN) ? 'active' : '' }}">
            <a href="{{ route('hoiNghiHoiThao.index') }}?type={{\App\Models\HoiNghiHoiThao::TYPE_JOIN}}">
                <i class="fa fa-edit"></i>
                <span>Cơ quan tham dự hoặc <br> tham mưu tỉnh tham dự</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('ngos*') || Request::is('duAnNgos*') || Request::is('duAnKhacs*') ? 'active' : ''}}">
    <a href="#"><i class="fa fa-cogs"></i> <span>Quản lý tổ chức NGOs</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('ngos*') ? 'active' : '' }}">
            <a href="{!! route('ngos.index') !!}"><i class="fa fa-user"></i>
                <span>Quản lý thông tin <br> các tổ chức NGOs</span>
            </a>
        </li>
        <li class="{{ Request::is('duAnNgos*') ? 'active' : '' }}">
            <a href="{!! route('duAnNgos.index') !!}"><i class="fa fa-user"></i>
                <span>Quản lý dự án <br> của các tổ chức NGOs</span>
            </a>
        </li>
        <li class="{{ Request::is('duAnKhacs*') ? 'active' : '' }}">
            <a href="{!! route('duAnKhacs.index') !!}"><i class="fa fa-user"></i>
                <span>Quản lý dự án <br> của các tổ chức khác</span>
            </a>
        </li>
    </ul>
</li>

<li class="treeview active">
    <a href="#"><i class="fa fa-cogs"></i> <span>Quản lý kinh tế đối ngoại</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('xuatNhapKhaus*') ? 'active' : '' }}">
            <a href="{{ route('xuatNhapKhaus.index') }}"><i class="fa fa-edit"></i>
                <span>Số liệu xuất - nhập khẩu</span></a>
        </li>
    </ul>
</li>













<li class="treeview {{ Request::is('danhMuc*') ? 'active' : ''}}">
    <a href="#"><i class="fa fa-cogs"></i> <span>Quản lý danh mục</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('danhMuc/capDonVi*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.capDonVi.index') !!}"><i class="fa fa-user"></i>
                <span>Cấp đơn vị</span>
            </a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('users*') | Request::is('roles*') | Request::is('permissions*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-cogs"></i> <span>Quản trị hệ thống</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i>
                <span>Quản lý người dùng</span>
            </a>
        </li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}"><i class="fa fa-users"></i>
                <span>Quản lý vai trò người dùng</span>
            </a>
        </li>

        <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{{ route('permissions.index') }}"><i class="fa fa-terminal"></i>
                <span>Quản lý chức năng</span>
            </a>
        </li>
    </ul>
</li>
<li class="{{ Request::is('xuatNhapKhaus*') ? 'active' : '' }}">
    <a href="{{ route('xuatNhapKhaus.index') }}"><i class="fa fa-edit"></i><span>Xuat Nhap Khaus</span></a>
</li>

