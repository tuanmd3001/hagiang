<!-- Ten Field -->
<div class="form-group col-md-6 @if($errors->has('ten')) has-error @endif">
    {!! Form::label('ten', 'Tên dự án:') !!}
    {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ten'))
        <div class="help-block">{{ $errors->first('ten') }}</div>
    @endif
</div>

<!-- Chu Dau Tu Field -->
<div class="form-group col-md-6 @if($errors->has('chu_dau_tu')) has-error @endif">
    {!! Form::label('chu_dau_tu', 'Chủ đầu tư:') !!}
    {!! Form::text('chu_dau_tu', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('chu_dau_tu'))
        <div class="help-block">{{ $errors->first('chu_dau_tu') }}</div>
    @endif
</div>


<!-- Noi Dung Field -->
<div class="form-group col-md-12 @if($errors->has('noi_dung')) has-error @endif">
    {!! Form::label('noi_dung', 'Nội dung dự án:') !!}
    {!! Form::textarea('noi_dung', null, ['class' => 'form-control']) !!}
    @if($errors->has('noi_dung'))
        <div class="help-block">{{ $errors->first('noi_dung') }}</div>
    @endif
</div>
<!-- Giai Ngan Field -->
<div class="form-group col-md-12 @if($errors->has('giai_ngan')) has-error @endif">
    {!! Form::label('giai_ngan', 'Tình hình giải ngân:') !!}
    {!! Form::text('giai_ngan', null, ['class' => 'form-control']) !!}
    @if($errors->has('giai_ngan'))
        <div class="help-block">{{ $errors->first('giai_ngan') }}</div>
    @endif
</div>

<!-- Dia Ban Field -->
<div class="form-group col-md-12 @if($errors->has('dia_ban')) has-error @endif">
    {!! Form::label('dia_ban', 'Địa bàn thực hiện:') !!}
    {!! Form::text('dia_ban', null, ['class' => 'form-control']) !!}
    @if($errors->has('dia_ban'))
        <div class="help-block">{{ $errors->first('dia_ban') }}</div>
    @endif
</div>

<!-- Ket Qua Field -->
<div class="form-group col-md-12 @if($errors->has('ket_qua')) has-error @endif">
    {!! Form::label('ket_qua', 'Tình hình kết quả thực hiện:') !!}
    {!! Form::text('ket_qua', null, ['class' => 'form-control']) !!}
    @if($errors->has('ket_qua'))
        <div class="help-block">{{ $errors->first('ket_qua') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('duAnOdas.index') }}" class="btn btn-default">Quay lại</a>
</div>
