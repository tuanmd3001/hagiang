<!-- Ten Field -->
<div class="form-group col-md-6  @if($errors->has('ten')) has-error @endif">
    {!! Form::label('ten', 'Tên đơn vị, doanh nghiệp:') !!}
    {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ten'))
        <div class="help-block">{{ $errors->first('ten') }}</div>
    @endif
</div>

<!-- So Du An Field -->
<div class="form-group col-md-6  @if($errors->has('so_du_an')) has-error @endif">
    {!! Form::label('so_du_an', 'Số dự án đầu tư:') !!}
    {!! Form::number('so_du_an', null, ['class' => 'form-control']) !!}
    @if($errors->has('so_du_an'))
        <div class="help-block">{{ $errors->first('so_du_an') }}</div>
    @endif
</div>

<!-- Noi Dung Field -->
<div class="form-group col-md-12 @if($errors->has('noi_dung')) has-error @endif">
    {!! Form::label('noi_dung', 'Nội dung hoạt động:') !!}
    {!! Form::textarea('noi_dung', null, ['class' => 'form-control']) !!}
    @if($errors->has('noi_dung'))
        <div class="help-block">{{ $errors->first('noi_dung') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dnNuocNgoais.index') }}" class="btn btn-default">Quay lại</a>
</div>
