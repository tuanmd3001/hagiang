<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Tên đơn vị, quốc gia:') !!}
    <p>{{ $nguonFdi->ten }}</p>
</div>

<!-- Tong Von Field -->
<div class="form-group">
    {!! Form::label('tong_von', 'Tổng vốn ODA đang đầu tư:') !!}
    <p>{{ $nguonFdi->tong_von }}</p>
</div>

<!-- Dia Ban Field -->
<div class="form-group">
    {!! Form::label('dia_ban', 'Địa bàn/dự án đầu tư thông qua hình thức ODA:') !!}
    <p>{{ $nguonFdi->dia_ban }}</p>
</div>
