<li class="treeview {{ Request::is('hoiNghiHoiThao*') ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-comments"></i>
        <span>Hội nghị, hội thảo quốc tế</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('hoiNghiHoiThao*') && Request::get("type") != \App\Models\HoiNghiHoiThao::TYPE_JOIN ? 'active' : '' }}">
            <a href="{{ route('hoiNghiHoiThao.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Chủ trì, tổ chức <br> hoặc tham mưu tỉnh chủ trì tổ chức</span></a>
        </li>
        <li class="{{ Request::is('hoiNghiHoiThao*') && Request::get("type") == \App\Models\HoiNghiHoiThao::TYPE_JOIN ? 'active' : '' }}">
            <a href="{{ route('hoiNghiHoiThao.index') }}?type={{\App\Models\HoiNghiHoiThao::TYPE_JOIN}}">
                <i class="fa fa-circle-o"></i>
                <span>Cơ quan tham dự <br> hoặc tham mưu tỉnh tham dự</span></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is(['ngos*', 'duAnNgos*', 'duAnKhacs*']) ? 'active' : ''}}">
    <a href="#"><i class="fa fa-building"></i> <span>Quản lý tổ chức NGOs</span>
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

<li class="treeview {{ Request::is(['xuatNhapKhaus*', 'nguonOdas*', 'duAnOdas*', 'nguonFdis*', 'duAnFdis*', 'dnVonNuocNgoais*', 'dnNuocNgoais*']) ? 'active' : '' }}">
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
        <li class="{{ Request::is('dnVonNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('dnVonNuocNgoais.index') }}"><i class="fa fa-circle-o"></i>
                <span>Doanh nghiệp <br> có vốn đầu tư nước ngoài</span></a>
        </li>
        <li class="{{ Request::is('dnNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('dnNuocNgoais.index') }}"><i class="fa fa-circle-o"></i>
                <span>Doanh nghiệp <br> nước ngoài tại Hà Giang</span></a>
        </li>
    </ul>
</li>
<li class="treeview {{ Request::is(['lanhSuTinhs*', 'lanhSuNuocNgoais*', 'bhNgNuocNgoais*', 'bhNgHaGiangs*']) ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-user"></i>
        <span>Lãnh sự - bảo hộ công dân</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('lanhSuTinhs*') ? 'active' : '' }}">
            <a href="{{ route('lanhSuTinhs.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Vụ việc lãnh sự trên địa bàn tỉnh</span></a>
        </li>
        <li class="{{ Request::is('lanhSuNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('lanhSuNuocNgoais.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Vụ việc lãnh sự tại nước ngoài</span></a>
        </li>
        <li class="{{ Request::is('bhNgNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('bhNgNuocNgoais.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Người nước ngoài đang  <br> hoạt động, tạm trú tại Hà Giang</span></a>
        </li>
        <li class="{{ Request::is('bhNgHaGiangs*') ? 'active' : '' }}">
            <a href="{{ route('bhNgHaGiangs.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Người Hà Giang <br> đi lao động tại nước ngoài</span></a>
        </li>
    </ul>
</li>
<li class="treeview active">
    <a href="#">
        <i class="fa fa-flag"></i>
        <span>Quản lý biên giới, lãnh thổ</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('lanhSuTinhs*') ? 'active' : '' }}">
            <a href="{{ route('lanhSuTinhs.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Quản lý đường biên, mốc giới</span></a>
        </li>
        <li class="{{ Request::is('lanhSuNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('lanhSuNuocNgoais.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Quản lý sự vụ, sự việc trên biên giới</span></a>
        </li>
        <li class="{{ Request::is('bhNgNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('bhNgNuocNgoais.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Thông tin, tình hình ký kết hữu nghị</span></a>
        </li>
        <li class="{{ Request::is('bhNgHaGiangs*') ? 'active' : '' }}">
            <a href="{{ route('bhNgHaGiangs.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Quy hoạch hệ thống cửa khẩu, lỗi mở</span></a>
        </li>
    </ul>
</li>
<li class="treeview {{ Request::is(['ngHgNuocNgoais*', 'ngHgVeNuocs*']) ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-user"></i>
        <span>Người Việt Nam ở nước ngoài</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('ngHgNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('ngHgNuocNgoais.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Người Hà Giang ở nước ngoài</span></a>
        </li>
        <li class="{{ Request::is('ngHgVeNuocs*') ? 'active' : '' }}">
            <a href="{{ route('ngHgVeNuocs.index') }}">
                <i class="fa fa-circle-o"></i>
                <span>Người Hà Giang ở nước ngoài <br> về thăm thân, làm việc trong nước</span></a>
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

<li class="treeview {{ Request::is(['users*', 'roles*', 'permissions*']) ? 'active' : '' }}">
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

