<!-- Ten Field -->
<div class="form-group col-md-6 @if($errors->has('ten')) has-error @endif">
    {!! Form::label('ten', 'Tên đơn vị, quốc gia:') !!}
    {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ten'))
        <div class="help-block">{{ $errors->first('ten') }}</div>
    @endif
</div>

<!-- Tong Von Field -->
<div class="form-group col-md-6 @if($errors->has('tong_von')) has-error @endif">
    {!! Form::label('tong_von', 'Tổng vốn ODA đang đầu tư:') !!}
    {!! Form::number('tong_von', null, ['class' => 'form-control']) !!}
    @if($errors->has('tong_von'))
        <div class="help-block">{{ $errors->first('tong_von') }}</div>
    @endif
</div>

<!-- Dia Ban Field -->
<div class="form-group col-md-12 @if($errors->has('dia_ban')) has-error @endif">
    {!! Form::label('dia_ban', 'Địa bàn/dự án đầu tư thông qua hình thức ODA:') !!}
    {!! Form::textarea('dia_ban', null, ['class' => 'form-control']) !!}
    @if($errors->has('dia_ban'))
        <div class="help-block">{{ $errors->first('dia_ban') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('nguonOdas.index') }}" class="btn btn-default">Quay lại</a>
</div>
