<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Tên vụ việc:') !!}
    <p>{{ $lanhSuNuocNgoai->ten }}</p>
</div>

<!-- Noi Dung Field -->
<div class="form-group">
    {!! Form::label('noi_dung', 'Nội dung vụ việc:') !!}
    <p>{{ $lanhSuNuocNgoai->noi_dung }}</p>
</div>

<!-- Dia Ban Field -->
<div class="form-group">
    {!! Form::label('dia_ban', 'Địa bàn xảy ra vụ việc:') !!}
    <p>{{ $lanhSuNuocNgoai->dia_ban }}</p>
</div>

<!-- Giai Quyet Field -->
<div class="form-group">
    {!! Form::label('giai_quyet', 'Tình hình giải quyết:') !!}
    <p>{{ $lanhSuNuocNgoai->giai_quyet }}</p>
</div>
