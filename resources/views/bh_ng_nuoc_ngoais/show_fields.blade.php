<!-- Ho Ten Field -->
<div class="form-group">
    {!! Form::label('ho_ten', 'Họ tên:') !!}
    <p>{{ $bhNgNuocNgoai->ho_ten }}</p>
</div>

<!-- Quoc Tich Field -->
<div class="form-group">
    {!! Form::label('quoc_tich', 'Quốc tịch:') !!}
    <p>{{ $bhNgNuocNgoai->ten_quoc_tich }}</p>
</div>

<!-- So Ho Chieu Field -->
<div class="form-group">
    {!! Form::label('so_ho_chieu', 'Số hộ chiếu:') !!}
    <p>{{ $bhNgNuocNgoai->so_ho_chieu }}</p>
</div>

<!-- Noi Dung Field -->
<div class="form-group">
    {!! Form::label('noi_dung', 'Nội dung hoạt động tại Hà Giang:') !!}
    <p>{{ $bhNgNuocNgoai->noi_dung }}</p>
</div>

<!-- Dia Chi Field -->
<div class="form-group">
    {!! Form::label('dia_chi', 'Địa chỉ tạm trú:') !!}
    <p>{{ $bhNgNuocNgoai->dia_chi }}</p>
</div>

