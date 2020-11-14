<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Họ tên:') !!}
    <p>{{ $canBo->ten }}</p>
</div>

<!-- Ngay Sinh Field -->
<div class="form-group">
    {!! Form::label('ngay_sinh', 'Ngày sinh:') !!}
    <p>{{ date_format(new \DateTime($canBo->ngay_sinh), 'd/m/Y') ?? '' }}</p>
</div>

<!-- Gioi Tinh Field -->
<div class="form-group">
    {!! Form::label('gioi_tinh', 'Giới tính:') !!}
    <p>{{ \App\Models\Constants::GENDER_LABEL[$canBo->gioi_tinh] }}</p>
</div>

<!-- Sdt Field -->
<div class="form-group">
    {!! Form::label('sdt', 'Số điện thoại:') !!}
    <p>{{ $canBo->sdt }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $canBo->email }}</p>
</div>

<!-- Noi Cong Tac Field -->
<div class="form-group">
    {!! Form::label('noi_cong_tac', 'Nơi công tác:') !!}
    <p>{{ $canBo->noi_cong_tac }}</p>
</div>

<!-- Noi O Field -->
<div class="form-group">
    {!! Form::label('noi_o', 'Nơi ở:') !!}
    <p>{{ $canBo->noi_o }}</p>
</div>

