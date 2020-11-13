<!-- Quoc Gia Field -->
<div class="form-group col-md-4 @if($errors->has('quoc_gia')) has-error @endif">
    {!! Form::label('quoc_gia', 'Quốc gia:') !!}
    {!! Form::text('quoc_gia', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('quoc_gia'))
        <div class="help-block">{{ $errors->first('quoc_gia') }}</div>
    @endif
</div>

<!-- So Luong Field -->
<div class="form-group col-md-4 @if($errors->has('so_luong')) has-error @endif">
    {!! Form::label('so_luong', 'Số lượng người Hà Giang tại quốc gia:') !!}
    {!! Form::number('so_luong', null, ['class' => 'form-control']) !!}
    @if($errors->has('so_luong'))
        <div class="help-block">{{ $errors->first('so_luong') }}</div>
    @endif
</div>

<!-- Nganh Nghe Field -->
<div class="form-group col-md-4 @if($errors->has('nganh_nghe')) has-error @endif">
    {!! Form::label('nganh_nghe', 'Ngành nghề làm việc:') !!}
    {!! Form::text('nganh_nghe', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('nganh_nghe'))
        <div class="help-block">{{ $errors->first('nganh_nghe') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ngHgNuocNgoais.index') }}" class="btn btn-default">Quay lại</a>
</div>
