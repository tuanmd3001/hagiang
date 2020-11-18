<!-- Ho Ten Field -->
<div class="form-group">
    {!! Form::label('ho_ten', 'Họ tên:') !!}
    <p>{{ $bhNgHaGiang->ho_ten }}</p>
</div>

<!-- Nam Sinh Field -->
<div class="form-group">
    {!! Form::label('nam_sinh', 'Năm sinh:') !!}
    <p>{{ $bhNgHaGiang->nam_sinh }}</p>
</div>

<!-- Que Quan Field -->
<div class="form-group">
    {!! Form::label('que_quan', 'Quê quán:') !!}
    <p>{{ $bhNgHaGiang->que_quan }}</p>
</div>

<!-- Nuoc Lao Dong Field -->
<div class="form-group">
    {!! Form::label('nuoc_lao_dong', 'Đi lao động tại nước:') !!}
    <p>{{ $bhNgHaGiang->ten_nuoc_lao_dong }}</p>
</div>

<!-- Nganh Nghe Field -->
<div class="form-group">
    {!! Form::label('nganh_nghe', 'Ngành nghề lao động:') !!}
    <p>{{ $bhNgHaGiang->nganh_nghe }}</p>
</div>

<!-- Thoi Han Field -->
<div class="form-group">
    {!! Form::label('thoi_han', 'Thời hạn lao động:') !!}
    <p>{{ date_format(new \DateTime($bhNgHaGiang->thoi_han), 'd/m/Y') ?? '' }}</p>
</div>

