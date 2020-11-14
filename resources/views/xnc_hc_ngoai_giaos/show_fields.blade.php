<!-- Hc Id Field -->
<div class="form-group">
    {!! Form::label('ho_ten', 'Họ tên:') !!}
    <p>{{ $xncHcNgoaiGiao->ho_ten }}</p>
</div>
<div class="form-group">
    {!! Form::label('so_ho_chieu', 'Số hộ chiếu:') !!}
    <p>{{ $xncHcNgoaiGiao->so_ho_chieu }}</p>
</div>

<!-- Ngay Xnc Field -->
<div class="form-group">
    {!! Form::label('ngay_xnc', 'Ngày xuất/nhập cảnh:') !!}
    <p>{{ date_format(new \DateTime($xncHcNgoaiGiao->ngay_xnc), 'd/m/Y') ?? '' }}</p>
</div>

<!-- Noi Dung Field -->
<div class="form-group">
    {!! Form::label('noi_dung', 'Nội dung xuất/nhập cảnh:') !!}
    <p>{{ $xncHcNgoaiGiao->noi_dung }}</p>
</div>

