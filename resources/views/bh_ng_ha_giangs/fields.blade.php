<!-- Ho Ten Field -->
<div class="form-group col-md-4 @if($errors->has('ho_ten')) has-error @endif">
    {!! Form::label('ho_ten', 'Họ tên:') !!}
    {!! Form::text('ho_ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ho_ten'))
        <div class="help-block">{{ $errors->first('ho_ten') }}</div>
    @endif
</div>

<!-- Nam Sinh Field -->
<div class="form-group col-md-4 @if($errors->has('nam_sinh')) has-error @endif">
    {!! Form::label('nam_sinh', 'Năm sinh:') !!}
    {!! Form::text('nam_sinh', null, ['class' => 'form-control','id'=>'nam_sinh']) !!}
    @if($errors->has('nam_sinh'))
        <div class="help-block">{{ $errors->first('nam_sinh') }}</div>
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $('#nam_sinh').datetimepicker({
            format: 'YYYY',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Que Quan Field -->
<div class="form-group col-md-4 @if($errors->has('que_quan')) has-error @endif">
    {!! Form::label('que_quan', 'Quê quán:') !!}
    {!! Form::text('que_quan', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('que_quan'))
        <div class="help-block">{{ $errors->first('que_quan') }}</div>
    @endif
</div>

<!-- Nuoc Lao Dong Field -->
<div class="form-group col-md-4 @if($errors->has('nuoc_lao_dong')) has-error @endif">
    {!! Form::label('nuoc_lao_dong', 'Đi lao động tại nước:') !!}
    {!! Form::text('nuoc_lao_dong', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('nuoc_lao_dong'))
        <div class="help-block">{{ $errors->first('nuoc_lao_dong') }}</div>
    @endif
</div>

<!-- Nganh Nghe Field -->
<div class="form-group col-md-4 @if($errors->has('nganh_nghe')) has-error @endif">
    {!! Form::label('nganh_nghe', 'Ngành nghề lao động:') !!}
    {!! Form::text('nganh_nghe', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('nganh_nghe'))
        <div class="help-block">{{ $errors->first('nganh_nghe') }}</div>
    @endif
</div>

<!-- Thoi Han Field -->
<div class="form-group col-md-4 @if($errors->has('thoi_han')) has-error @endif">
    {!! Form::label('thoi_han', 'Thời hạn lao động:') !!}
    {!! Form::text('thoi_han', null, ['class' => 'form-control','id'=>'thoi_han']) !!}
    @if($errors->has('thoi_han'))
        <div class="help-block">{{ $errors->first('thoi_han') }}</div>
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $('#thoi_han').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bhNgHaGiangs.index') }}" class="btn btn-default">Quay lại</a>
</div>
