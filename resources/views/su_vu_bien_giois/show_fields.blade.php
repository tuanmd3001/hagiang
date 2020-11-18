<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Tên vụ việc:') !!}
    <p>{{ $suVuBienGioi->ten }}</p>
</div>

<!-- Dia Ban Field -->
<div class="form-group">
    {!! Form::label('dia_ban', 'Địa bàn xảy ra vụ việc:') !!}
    <p>{{ $suVuBienGioi->dia_ban }}</p>
</div>

<!-- Noi Dung Field -->
<div class="form-group">
    {!! Form::label('noi_dung', 'Nội dung vụ việc:') !!}
    <p>{{ $suVuBienGioi->noi_dung }}</p>
</div>

<!-- Giai Quyet Field -->
<div class="form-group">
    {!! Form::label('giai_quyet', 'Tình hình giải quyết:') !!}
    <p>{{ $suVuBienGioi->giai_quyet }}</p>
</div>

