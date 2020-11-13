<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Họ tên:') !!}
    <p>{{ $ngHgVeNuoc->ten }}</p>
</div>

<!-- Quoc Gia Field -->
<div class="form-group">
    {!! Form::label('quoc_gia', 'Ở tại quốc gia:') !!}
    <p>{{ $ngHgVeNuoc->quoc_gia }}</p>
</div>

<!-- Noi Dung Field -->
<div class="form-group">
    {!! Form::label('noi_dung', 'Nội dung làm việc khi về tỉnh:') !!}
    <p>{{ $ngHgVeNuoc->noi_dung }}</p>
</div>

<!-- Dia Phuong Field -->
<div class="form-group">
    {!! Form::label('dia_phuong', 'Địa phương về làm việc:') !!}
    <p>{{ $ngHgVeNuoc->dia_phuong }}</p>
</div>

<!-- Thoi Gian Field -->
<div class="form-group">
    {!! Form::label('thoi_gian', 'Thời gian về làm việc:') !!}
    <p>{{ date_format(new \DateTime($ngHgVeNuoc->thoi_gian), 'd/m/Y') ?? '' }}</p>
</div>

