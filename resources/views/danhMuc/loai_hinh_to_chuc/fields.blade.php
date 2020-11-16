<!-- Ten Field -->
<div class="form-group col-md-6 @if($errors->has('ten')) has-error @endif">
    {!! Form::label('ten', 'Tên:') !!}
    {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ten'))
        <div class="help-block">{{ $errors->first('ten') }}</div>
    @endif
</div>

<!-- Code Field -->
<div class="form-group col-md-6 @if($errors->has('code')) has-error @endif">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('code'))
        <div class="help-block">{{ $errors->first('code') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('danhMuc.loaiHinhToChuc.index') }}" class="btn btn-default">Quay lại</a>
</div>
