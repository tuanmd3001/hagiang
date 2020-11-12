<li class="treeview {{ Request::is('hoiNghiHoiThao*') ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-comments"></i>
        <span>Hội nghị, hội thảo quốc tế</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('hoiNghiHoiThao*' && Request::get("type") != \App\Models\HoiNghiHoiThao::TYPE_JOIN) ? 'active' : '' }}">
            <a href="{{ route('hoiNghiHoiThao.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Chủ trì, tổ chức <br> hoặc tham mưu tỉnh chủ trì tổ chức</span></a>
        </li>
        <li class="{{ Request::is('hoiNghiHoiThao*' && Request::get("type") == \App\Models\HoiNghiHoiThao::TYPE_JOIN) ? 'active' : '' }}">
            <a href="{{ route('hoiNghiHoiThao.index') }}?type={{\App\Models\HoiNghiHoiThao::TYPE_JOIN}}">
                <i class="fa fa-circle-o"></i>
                <span>Cơ quan tham dự <br> hoặc tham mưu tỉnh tham dự</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is('ngos*') || Request::is('duAnNgos*') || Request::is('duAnKhacs*') ? 'active' : ''}}">
    <a href="#"><i class="fa fa-building-o"></i> <span>Quản lý tổ chức NGOs</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('ngos*') ? 'active' : '' }}">
            <a href="{!! route('ngos.index') !!}">
                <i class="fa fa-circle-o"></i>
                <span>Các tổ chức NGOs</span>
            </a>
        </li>
        <li class="{{ Request::is('duAnNgos*') ? 'active' : '' }}">
            <a href="{!! route('duAnNgos.index') !!}">
                <i class="fa fa-circle-o"></i>
                <span>Dự án của các tổ chức NGOs</span>
            </a>
        </li>
        <li class="{{ Request::is('duAnKhacs*') ? 'active' : '' }}">
            <a href="{!! route('duAnKhacs.index') !!}">
                <i class="fa fa-circle-o"></i>
                <span>Dự án của các tổ chức khác</span>
            </a>
        </li>
    </ul>
</li>

<li class="treeview active">
    <a href="#"><i class="fa fa-exchange"></i> <span>Quản lý kinh tế đối ngoại</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('xuatNhapKhaus*') ? 'active' : '' }}">
            <a href="{{ route('xuatNhapKhaus.index') }}"><i class="fa fa-circle-o"></i>
                <span>Số liệu xuất - nhập khẩu</span></a>
        </li>
        <li class="{{ Request::is('nguonOdas*') ? 'active' : '' }}">
            <a href="{{ route('nguonOdas.index') }}"><i class="fa fa-circle-o"></i>
                <span>Đơn vị, quốc gia tài trợ vốn ODA</span></a>
        </li>
        <li class="{{ Request::is('duAnOdas*') ? 'active' : '' }}">
            <a href="{{ route('duAnOdas.index') }}"><i class="fa fa-circle-o"></i>
                <span>Các dự án ODA</span></a>
        </li>
        <li class="{{ Request::is('nguonFdis*') ? 'active' : '' }}">
            <a href="{{ route('nguonFdis.index') }}"><i class="fa fa-circle-o"></i>
                <span>Đơn vị, quốc gia tài trợ vốn FDI</span></a>
        </li>
        <li class="{{ Request::is('duAnFdis*') ? 'active' : '' }}">
            <a href="{{ route('duAnFdis.index') }}"><i class="fa fa-circle-o"></i>
                <span>Các dự án FDI</span></a>
        </li>
    </ul>
</li>













<li class="treeview {{ Request::is('danhMuc*') ? 'active' : ''}}">
    <a href="#"><i class="fa fa-list-ul"></i> <span>Quản lý danh mục</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('danhMuc/capDonVi*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.capDonVi.index') !!}"><i class="fa fa-circle-o"></i>
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

<li class="{{ Request::is('nguonFdis*') ? 'active' : '' }}">
    <a href="{{ route('nguonFdis.index') }}"><i class="fa fa-edit"></i><span>Nguon Fdis</span></a>
</li>

<li class="{{ Request::is('duAnFdis*') ? 'active' : '' }}">
    <a href="{{ route('duAnFdis.index') }}"><i class="fa fa-edit"></i><span>Du An Fdis</span></a>
</li>

