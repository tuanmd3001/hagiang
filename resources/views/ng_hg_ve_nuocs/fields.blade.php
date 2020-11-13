<!-- Ten Field -->
<div class="form-group col-md-6 @if($errors->has('ten')) has-error @endif">
    {!! Form::label('ten', 'Họ tên:') !!}
    {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ten'))
        <div class="help-block">{{ $errors->first('ten') }}</div>
    @endif
</div>

<!-- Quoc Gia Field -->
<div class="form-group col-md-6 @if($errors->has('quoc_gia')) has-error @endif">
    {!! Form::label('quoc_gia', 'Ở tại quốc gia:') !!}
    {!! Form::text('quoc_gia', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('quoc_gia'))
        <div class="help-block">{{ $errors->first('quoc_gia') }}</div>
    @endif
</div>

<!-- Noi Dung Field -->
<div class="form-group col-md-12 @if($errors->has('noi_dung')) has-error @endif">
    {!! Form::label('noi_dung', 'Nội dung làm việc khi về tỉnh:') !!}
    {!! Form::textarea('noi_dung', null, ['class' => 'form-control']) !!}
    @if($errors->has('noi_dung'))
        <div class="help-block">{{ $errors->first('noi_dung') }}</div>
    @endif
</div>

<!-- Dia Phuong Field -->
<div class="form-group col-md-6 @if($errors->has('dia_phuong')) has-error @endif">
    {!! Form::label('dia_phuong', 'Địa phương về làm việc:') !!}
    {!! Form::text('dia_phuong', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('dia_phuong'))
        <div class="help-block">{{ $errors->first('dia_phuong') }}</div>
    @endif
</div>

<!-- Thoi Gian Field -->
<div class="form-group col-md-6 @if($errors->has('thoi_gian')) has-error @endif">
    {!! Form::label('thoi_gian', 'Thời gian về làm việc:') !!}
    {!! Form::text('thoi_gian', null, ['class' => 'form-control','id'=>'thoi_gian']) !!}
    @if($errors->has('thoi_gian'))
        <div class="help-block">{{ $errors->first('thoi_gian') }}</div>
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $('#thoi_gian').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ngHgVeNuocs.index') }}" class="btn btn-default">Quay lại</a>
</div>
