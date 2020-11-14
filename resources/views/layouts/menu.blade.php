<li class="{{ Request::is("canBos") ? 'active' : ''}}">
    <a href="{{ route('canBos.index') }}">
        <i class="fa fa-user"></i>
        <span>Quản lý thông tin cán bộ</span>
    </a>
</li>
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
                <div>Chủ trì, tổ chức hoặc tham mưu tỉnh chủ trì tổ chức</div></a>
        </li>
        <li class="{{ Request::is('hoiNghiHoiThao*') && Request::get("type") == \App\Models\HoiNghiHoiThao::TYPE_JOIN ? 'active' : '' }}">
            <a href="{{ route('hoiNghiHoiThao.index') }}?type={{\App\Models\HoiNghiHoiThao::TYPE_JOIN}}">
                <i class="fa fa-circle-o"></i>
                <div>Cơ quan tham dự hoặc tham mưu tỉnh tham dự</div></a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is(['ngos*', 'duAnNgos*', 'duAnKhacs*']) ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-building"></i>
        <span>Quản lý tổ chức NGOs</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('ngos*') ? 'active' : '' }}">
            <a href="{!! route('ngos.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Các tổ chức NGOs</div>
            </a>
        </li>
        <li class="{{ Request::is('duAnNgos*') ? 'active' : '' }}">
            <a href="{!! route('duAnNgos.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Dự án của các tổ chức NGOs</div>
            </a>
        </li>
        <li class="{{ Request::is('duAnKhacs*') ? 'active' : '' }}">
            <a href="{!! route('duAnKhacs.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Dự án của các tổ chức khác</div>
            </a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is(['xuatNhapKhaus*', 'nguonOdas*', 'duAnOdas*', 'nguonFdis*', 'duAnFdis*', 'dnVonNuocNgoais*', 'dnNuocNgoais*']) ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-exchange"></i>
        <span>Quản lý kinh tế đối ngoại</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('xuatNhapKhaus*') ? 'active' : '' }}">
            <a href="{{ route('xuatNhapKhaus.index') }}"><i class="fa fa-circle-o"></i>
                <div>Số liệu xuất - nhập khẩu</div></a>
        </li>
        <li class="{{ Request::is('nguonOdas*') ? 'active' : '' }}">
            <a href="{{ route('nguonOdas.index') }}"><i class="fa fa-circle-o"></i>
                <div>Đơn vị, quốc gia tài trợ vốn ODA</div></a>
        </li>
        <li class="{{ Request::is('duAnOdas*') ? 'active' : '' }}">
            <a href="{{ route('duAnOdas.index') }}"><i class="fa fa-circle-o"></i>
                <div>Các dự án ODA</div></a>
        </li>
        <li class="{{ Request::is('nguonFdis*') ? 'active' : '' }}">
            <a href="{{ route('nguonFdis.index') }}"><i class="fa fa-circle-o"></i>
                <div>Đơn vị, quốc gia tài trợ vốn FDI</div></a>
        </li>
        <li class="{{ Request::is('duAnFdis*') ? 'active' : '' }}">
            <a href="{{ route('duAnFdis.index') }}"><i class="fa fa-circle-o"></i>
                <div>Các dự án FDI</div></a>
        </li>
        <li class="{{ Request::is('dnVonNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('dnVonNuocNgoais.index') }}"><i class="fa fa-circle-o"></i>
                <div>Doanh nghiệp có vốn đầu tư nước ngoài</div></a>
        </li>
        <li class="{{ Request::is('dnNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('dnNuocNgoais.index') }}"><i class="fa fa-circle-o"></i>
                <div>Doanh nghiệp nước ngoài tại Hà Giang</div></a>
        </li>
    </ul>
</li>
<li class="treeview {{ Request::is(['lanhSuTinhs*', 'lanhSuNuocNgoais*', 'bhNgNuocNgoais*', 'bhNgHaGiangs*']) ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-cab"></i>
        <span>Lãnh sự - bảo hộ công dân</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('lanhSuTinhs*') ? 'active' : '' }}">
            <a href="{{ route('lanhSuTinhs.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Vụ việc lãnh sự trên địa bàn tỉnh</div></a>
        </li>
        <li class="{{ Request::is('lanhSuNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('lanhSuNuocNgoais.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Vụ việc lãnh sự tại nước ngoài</div></a>
        </li>
        <li class="{{ Request::is('bhNgNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('bhNgNuocNgoais.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Người nước ngoài đang  hoạt động, tạm trú tại Hà Giang</div></a>
        </li>
        <li class="{{ Request::is('bhNgHaGiangs*') ? 'active' : '' }}">
            <a href="{{ route('bhNgHaGiangs.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Người Hà Giang đi lao động tại nước ngoài</div></a>
        </li>
    </ul>
</li>
<li class="treeview">
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
                <div>Quản lý đường biên, mốc giới</div></a>
        </li>
        <li class="{{ Request::is('lanhSuNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('lanhSuNuocNgoais.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Quản lý sự vụ, sự việc trên biên giới</div></a>
        </li>
        <li class="{{ Request::is('bhNgNuocNgoais*') ? 'active' : '' }}">
            <a href="{{ route('bhNgNuocNgoais.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Thông tin, tình hình ký kết hữu nghị</div></a>
        </li>
        <li class="{{ Request::is('bhNgHaGiangs*') ? 'active' : '' }}">
            <a href="{{ route('bhNgHaGiangs.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Quy hoạch hệ thống cửa khẩu, lối mở</div></a>
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
                <div>Người Hà Giang ở nước ngoài</div></a>
        </li>
        <li class="{{ Request::is('ngHgVeNuocs*') ? 'active' : '' }}">
            <a href="{{ route('ngHgVeNuocs.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Người Hà Giang ở nước ngoài về thăm thân, làm việc trong nước</div></a>
        </li>
    </ul>
</li>
<li class="treeview {{ Request::is(['hcNgoaiGiaos*', 'xncHcNgoaiGiaos*', 'hcCongVus*', 'xncHcCongVus*', 'abtcs*', 'chuKies*']) ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-book"></i>
        <span>Quản lý hộ chiếu</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('hcNgoaiGiaos*') ? 'active' : '' }}">
            <a href="{{ route('hcNgoaiGiaos.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Hộ chiếu ngoại giao</div></a>
        </li>
        <li class="{{ Request::is('xncHcNgoaiGiaos*') ? 'active' : '' }}">
            <a href="{{ route('xncHcNgoaiGiaos.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Cán bộ xuất/nhập cảnh bằng hộ chiếu ngoại giao</div></a>
        </li>
        <li class="{{ Request::is('hcCongVus*') ? 'active' : '' }}">
            <a href="{{ route('hcCongVus.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Hộ chiếu công vụ</div></a>
        </li>
        <li class="{{ Request::is('xncHcCongVus*') ? 'active' : '' }}">
            <a href="{{ route('xncHcCongVus.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Cán bộ xuất/nhập cảnh bằng hộ chiếu công vụ</div></a>
        </li>
        <li class="{{ Request::is('abtcs*') ? 'active' : '' }}">
            <a href="{{ route('abtcs.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Thẻ ABTC</div></a>
        </li>
        <li class="{{ Request::is('chuKies*') ? 'active' : '' }}">
            <a href="{{ route('chuKies.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Mẫu chữ ký, con dấu</div></a>
        </li>
    </ul>
</li>











<li class="treeview {{ Request::is('danhMuc*') ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-list-ul"></i>
        <span>Quản lý danh mục</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('danhMuc/capDonVi*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.capDonVi.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Cấp đơn vị</div>
            </a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is(['users*', 'roles*', 'permissions*']) ? 'active' : '' }}">
    <a href="#">
        <i class="fa fa-cogs"></i>
        <span>Quản trị hệ thống</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i>
                <div>Quản lý người dùng</div>
            </a>
        </li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}"><i class="fa fa-users"></i>
                <div>Quản lý vai trò người dùng</div>
            </a>
        </li>

        <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{{ route('permissions.index') }}"><i class="fa fa-terminal"></i>
                <div>Quản lý chức năng</div>
            </a>
        </li>
    </ul>
</li>
