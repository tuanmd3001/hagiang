<!-- Ho Ten Field -->
<div class="form-group col-md-6 @if($errors->has('ho_ten')) has-error @endif">
    {!! Form::label('ho_ten', 'Họ tên:') !!}
    {!! Form::text('ho_ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ho_ten'))
        <div class="help-block">{{ $errors->first('ho_ten') }}</div>
    @endif
</div>

<!-- Don Vi Field -->
<div class="form-group col-md-6 @if($errors->has('don_vi')) has-error @endif">
    {!! Form::label('don_vi', 'Đơn vị:') !!}
    {!! Form::text('don_vi', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('don_vi'))
        <div class="help-block">{{ $errors->first('don_vi') }}</div>
    @endif
</div>

<!-- Chuc Danh Field -->
<div class="form-group col-md-6 @if($errors->has('chuc_danh')) has-error @endif">
    {!! Form::label('chuc_danh', 'Chức danh:') !!}
    {!! Form::text('chuc_danh', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('chuc_danh'))
        <div class="help-block">{{ $errors->first('chuc_danh') }}</div>
    @endif
</div>

<!-- Sdt Field -->
<div class="form-group col-md-6 @if($errors->has('sdt')) has-error @endif">
    {!! Form::label('sdt', 'Số điện thoại:') !!}
    {!! Form::text('sdt', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
    @if($errors->has('sdt'))
        <div class="help-block">{{ $errors->first('sdt') }}</div>
    @endif
</div>

<!-- Email Field -->
<div class="form-group col-md-6 @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('email'))
        <div class="help-block">{{ $errors->first('email') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('canBoNgoaiGiaoTinhs.index') }}" class="btn btn-default">Quay lại</a>
</div>
