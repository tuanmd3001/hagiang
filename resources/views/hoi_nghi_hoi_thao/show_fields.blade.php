<!-- Loai Field -->
<div class="form-group col-md-6">
    {!! Form::label('loai', 'Loại hội nghị, hội thảo:') !!}
    <p>{{ $hoiNghiHoiThao->loai }}</p>
</div>

<!-- Ten Field -->
<div class="form-group col-md-6">
    {!! Form::label('ten', 'Tên/Chủ đề hội nghị, hội thảo:') !!}
    <p>{{ $hoiNghiHoiThao->ten }}</p>
</div>

<!-- Noi Dung Field -->
<div class="form-group col-md-6">
    {!! Form::label('co_quan', 'Tên cơ quan/Tổ chức nước ngoài phối hợp thực hiện:') !!}
    <p>{{ $hoiNghiHoiThao->co_quan }}</p>
</div>

<!-- Noi Dung Field -->
<div class="form-group col-md-6">
    {!! Form::label('noi_dung', 'Nội dung hoạt động:') !!}
    <p>{{ $hoiNghiHoiThao->noi_dung }}</p>
</div>

<!-- Db Vn Field -->
<div class="form-group col-md-3">
    {!! Form::label('db_vn', 'Số lượng đại biểu người Việt Nam:') !!}
    <p>{{ $hoiNghiHoiThao->db_vn }}</p>
</div>

<!-- Db Nn Trong Nuoc Field -->
<div class="form-group col-md-3">
    {!! Form::label('db_nn_trong_nuoc', 'Số lượng đại biểu người nước ngoài ở trong nước:') !!}
    <p>{{ $hoiNghiHoiThao->db_nn_trong_nuoc }}</p>
</div>

<!-- Db Nn Ngoai Nuoc Field -->
<div class="form-group col-md-3">
    {!! Form::label('db_nn_ngoai_nuoc', 'Số lượng đại biểu người nước ngoài từ ngoài nước:') !!}
    <p>{{ $hoiNghiHoiThao->db_nn_ngoai_nuoc }}</p>
</div>

<!-- Db Cac Nuoc Den Field -->
<div class="form-group col-md-3">
    {!! Form::label('db_cac_nuoc_den', 'Đại biểu nước ngoài đến từ (các) nước:') !!}
    <p>{{ $hoiNghiHoiThao->db_cac_nuoc_den }}</p>
</div>

<!-- Thoi Gian Field -->
<div class="form-group col-md-6">
    {!! Form::label('thoi_gian', 'Thời gian thực hiện:') !!}
    <p>{{ date_format(new \DateTime($hoiNghiHoiThao->thoi_gian), 'd/m/Y') ?? '' }}</p>
</div>

<!-- Dia Diem Field -->
<div class="form-group col-md-6">
    {!! Form::label('dia_diem', 'Địa điểm tổ chức:') !!}
    <p>{{ $hoiNghiHoiThao->dia_diem }}</p>
</div>

<!-- Kinh Phi Field -->
<div class="form-group col-md-6">
    {!! Form::label('kinh_phi', 'Kinh phí:') !!}
    <p>{{ $hoiNghiHoiThao->nguon_kinh_phi_label }}</p>
</div>

<!-- Bao Cao Field -->
<div class="form-group col-md-6">
    {!! Form::label('bao_cao', 'Số, ngày báo cáo:') !!}
    <p>{{ $hoiNghiHoiThao->bao_cao }}</p>
</div>

<!-- Trong Kh Field -->
<div class="form-group col-md-6">
    {!! Form::label('trong_kh', 'Trong kế hoạch:') !!}
    <p><input type="checkbox" class="checkbox" @if($hoiNghiHoiThao->trong_kh) checked @endif disabled></p>
</div>

<!-- Cap Cho Phep Field -->
<div class="form-group col-md-6">
    {!! Form::label('cap_cho_phep', 'Cấp cho phép:') !!}
    <p>{{ $hoiNghiHoiThao->cap_cho_phep }}</p>
</div>

