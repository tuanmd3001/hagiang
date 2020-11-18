<!-- Ten Field -->
<div class="form-group col-md-6 @if($errors->has('ten')) has-error @endif">
    {!! Form::label('ten', 'Tên vụ việc:') !!}
    {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ten'))
        <div class="help-block">{{ $errors->first('ten') }}</div>
    @endif
</div>

<!-- Dia Ban Field -->
<div class="form-group col-md-6 @if($errors->has('dia_ban')) has-error @endif">
    {!! Form::label('dia_ban', 'Địa bàn xảy ra vụ việc:') !!}
    {!! Form::text('dia_ban', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('dia_ban'))
        <div class="help-block">{{ $errors->first('dia_ban') }}</div>
    @endif
</div>

<!-- Noi Dung Field -->
<div class="form-group col-md-6 @if($errors->has('noi_dung')) has-error @endif">
    {!! Form::label('noi_dung', 'Nội dung vụ việc:') !!}
    {!! Form::textarea('noi_dung', null, ['class' => 'form-control']) !!}
    @if($errors->has('noi_dung'))
        <div class="help-block">{{ $errors->first('noi_dung') }}</div>
    @endif
</div>

<!-- Giai Quyet Field -->
<div class="form-group col-md-6 @if($errors->has('giai_quyet')) has-error @endif">
    {!! Form::label('giai_quyet', 'Tình hình giải quyết:') !!}
    {!! Form::textarea('giai_quyet', null, ['class' => 'form-control']) !!}
    @if($errors->has('giai_quyet'))
        <div class="help-block">{{ $errors->first('giai_quyet') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('suVuBienGiois.index') }}" class="btn btn-default">Quay lại</a>
</div>
