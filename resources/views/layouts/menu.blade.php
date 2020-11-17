<li class="{{ Request::is("canBos") ? 'active' : ''}}">
    <a href="{{ route('canBos.index') }}">
        <i class="fa fa-user"></i>
        <span>Quản lý thông tin cán bộ</span>
    </a>
</li>

<li class="treeview {{ Request::is(["doanRa*", "doanVao*"]) ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-retweet"></i>
        <span>Quản lý đoàn ra - đoàn vào</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('doanRaCapTinh*') ? 'active' : '' }}">
            <a href="{!! route('doanRaCapTinh.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Đoàn ra cấp tỉnh</div>
            </a>
        </li>
        <li class="{{ Request::is('doanRaCapHuyen*') ? 'active' : '' }}">
            <a href="{!! route('doanRaCapHuyen.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Đoàn ra cấp huyện</div>
            </a>
        </li>
        <li class="{{ Request::is('doanRaCapXa*') ? 'active' : '' }}">
            <a href="{!! route('doanRaCapXa.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Đoàn ra cấp xã</div>
            </a>
        </li>
        <li class="{{ Request::is('doanVaoCapTinh*') ? 'active' : '' }}">
            <a href="{!! route('doanVaoCapTinh.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Đoàn vào cấp tỉnh</div>
            </a>
        </li>
        <li class="{{ Request::is('doanVaoCapHuyen*') ? 'active' : '' }}">
            <a href="{!! route('doanVaoCapHuyen.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Đoàn vào cấp huyện</div>
            </a>
        </li>
        <li class="{{ Request::is('doanVaoCapXa*') ? 'active' : '' }}">
            <a href="{!! route('doanVaoCapXa.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Đoàn vào cấp xã</div>
            </a>
        </li>
    </ul>
</li>

<li class="treeview {{ Request::is(['ttqt*']) ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-sticky-note-o"></i>
        <span>Thỏa thuận quốc tế</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('ttqt_tinh*') ? 'active' : '' }}">
            <a href="{!! route('ttqt_tinh.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Thỏa thuận quốc tế do tỉnh ký kết</div>
            </a>
        </li>
        <li class="{{ Request::is('ttqt_so_nganh*') ? 'active' : '' }}">
            <a href="{!! route('ttqt_so_nganh.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Thỏa thuận do các sở, ngành cấp tỉnh ký kết</div>
            </a>
        </li>
        <li class="{{ Request::is('ttqt_huyen_tp*') ? 'active' : '' }}">
            <a href="{!! route('ttqt_huyen_tp.index') !!}">
                <i class="fa fa-circle-o"></i>
                <div>Thỏa thuận do UBND các huyện, thành phố ký kết</div>
            </a>
        </li>
    </ul>
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
                <div>Người nước ngoài đang hoạt động, tạm trú tại Hà Giang</div></a>
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
{{--        <li class="{{ Request::is('lanhSuTinhs*') ? 'active' : '' }}">--}}
{{--            <a href="{{ route('lanhSuTinhs.index') }}">--}}
{{--                <i class="fa fa-circle-o"></i>--}}
{{--                <div>Quản lý đường biên, mốc giới</div></a>--}}
{{--        </li>--}}
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
{{--        <li class="{{ Request::is('bhNgHaGiangs*') ? 'active' : '' }}">--}}
{{--            <a href="{{ route('bhNgHaGiangs.index') }}">--}}
{{--                <i class="fa fa-circle-o"></i>--}}
{{--                <div>Quy hoạch hệ thống cửa khẩu, lối mở</div></a>--}}
{{--        </li>--}}
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










<li class="treeview {{ Request::is(['canBoNgoaiGiaoTinhs*', 'canBoNgoaiGiaoHuyens*']) ? 'active' : ''}}">
    <a href="#">
        <i class="fa fa-user"></i>
        <span>Cán bộ chuyên trách đối ngoại</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('canBoNgoaiGiaoTinhs*') ? 'active' : '' }}">
            <a href="{{ route('canBoNgoaiGiaoTinhs.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Cán bộ chuyên trách đối ngoại cấp tỉnh</div></a>
        </li>
        <li class="{{ Request::is('canBoNgoaiGiaoHuyens*') ? 'active' : '' }}">
            <a href="{{ route('canBoNgoaiGiaoHuyens.index') }}">
                <i class="fa fa-circle-o"></i>
                <div>Cán bộ chuyên trách đối ngoại cấp huyện</div></a>
        </li>
    </ul>
</li>
<li class="{{ Request::is("duqts") ? 'active' : ''}}">
    <a href="{{ route('duqts.index') }}">
        <i class="fa fa-sticky-note-o"></i>
        <span>Các điều ước quốc tế</span>
    </a>
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
        <li class="{{ Request::is('danhMuc/danhNghiaDoan*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.danhNghiaDoan.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Danh nghĩa đoàn</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/quocGia*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.quocGia.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Quốc gia</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/loaiKinhPhi*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.loaiKinhPhi.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Loại kinh phí</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/loaiDoan*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.loaiDoan.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Loại đoàn</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/loaiSuKien*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.loaiSuKien.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Loại sự kiện</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/chucVu*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.chucVu.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Chức vụ</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/toChuc*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.toChuc.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Tổ chức</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/donVi*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.donVi.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Đơn vị</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/loaiDuAn*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.loaiDuAn.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Loại dự án</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/loaiHinhToChuc*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.loaiHinhToChuc.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Loại hình tổ chức</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/loaiVanBan*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.loaiVanBan.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Loại văn bản</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/ngheNghiep*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.ngheNghiep.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Nghề nghiệp</div>
            </a>
        </li>
        <li class="{{ Request::is('danhMuc/loaiHangHoa*') ? 'active' : '' }}">
            <a href="{!! route('danhMuc.loaiHangHoa.index') !!}"><i class="fa fa-circle-o"></i>
                <div>Loại hàng hóa</div>
            </a>
        </li>
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
