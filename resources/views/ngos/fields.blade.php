<div class="col-md-12">
    <div class="row">
        <!-- Ten Field -->
        <div class="form-group col-md-6 @if($errors->has('ten')) has-error @endif">
            {!! Form::label('ten', 'Tên tổ chức:') !!}
            {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
            @if($errors->has('ten'))
                <div class="help-block">{{ $errors->first('ten') }}</div>
            @endif
        </div>
    </div>
</div>

<!-- Noi Dung Field -->
<div class="form-group col-md-6 @if($errors->has('noi_dung')) has-error @endif">
    {!! Form::label('noi_dung', 'Nội dung hoạt động:') !!}
    {!! Form::textarea('noi_dung', null, ['class' => 'form-control']) !!}
    @if($errors->has('noi_dung'))
        <div class="help-block">{{ $errors->first('noi_dung') }}</div>
    @endif
</div>

<!-- Dia Ban Field -->
<div class="form-group col-md-6 @if($errors->has('dia_ban')) has-error @endif">
    {!! Form::label('dia_ban', 'Địa bàn hoạt động:') !!}
    {!! Form::textarea('dia_ban', null, ['class' => 'form-control']) !!}
    @if($errors->has('dia_ban'))
        <div class="help-block">{{ $errors->first('dia_ban') }}</div>
    @endif
</div>

<!-- Giay Phep Field -->
<div class="form-group col-md-6 @if($errors->has('giay_phep')) has-error @endif">
    {!! Form::label('giay_phep', 'Giấy phép hoạt động:') !!}
    <div class="radio">
        <label>
            {!! Form::radio('giay_phep', 0, isset($ngo) ? $ngo->giay_phep == 0 : true); !!}
            Chưa có giấy phép
        </label>
    </div>
    <div class="radio">
        <label>
            {!! Form::radio('giay_phep', 1, isset($ngo) ? $ngo->giay_phep == 1 : false); !!}
            Đã có giấy phép
        </label>
    </div>
    @if($errors->has('giay_phep'))
        <div class="help-block">{{ $errors->first('giay_phep') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ngos.index') }}" class="btn btn-default">Quay lại</a>
</div>
