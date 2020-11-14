<!-- Hc Id Field -->
<div class="form-group">
    {!! Form::label('ho_ten', 'Họ tên:') !!}
    <p>{{ $xncHcCongVu->ho_ten }}</p>
</div>
<div class="form-group">
    {!! Form::label('so_ho_chieu', 'Số hộ chiếu:') !!}
    <p>{{ $xncHcCongVu->so_ho_chieu }}</p>
</div>

<!-- Ngay Xnc Field -->
<div class="form-group">
    {!! Form::label('ngay_xnc', 'Ngày xuất/nhập cảnh:') !!}
    <p>{{ date_format(new \DateTime($xncHcCongVu->ngay_xnc), 'd/m/Y') ?? '' }}</p>
</div>

<!-- Noi Dung Field -->
<div class="form-group">
    {!! Form::label('noi_dung', 'Nội dung xuất/nhập cảnh:') !!}
    <p>{{ $xncHcCongVu->noi_dung }}</p>
</div>

