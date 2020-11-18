<!-- Ten Field -->
<div class="form-group col-md-12 @if($errors->has('ten')) has-error @endif">
    {!! Form::label('ten', 'Tên cặp địa phương ký kết hữu nghị:') !!}
    {!! Form::text('ten', null, ['class' => 'form-control']) !!}
    @if($errors->has('ten'))
        <div class="help-block">{{ $errors->first('ten') }}</div>
    @endif
</div>

<!-- Ngay Ky Field -->
<div class="form-group col-md-6 @if($errors->has('ngay_ky')) has-error @endif">
    {!! Form::label('ngay_ky', 'Ngày ký kết:') !!}
    {!! Form::text('ngay_ky', null, ['class' => 'form-control','id'=>'ngay_ky']) !!}
    @if($errors->has('ngay_ky'))
        <div class="help-block">{{ $errors->first('ngay_ky') }}</div>
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $('#ngay_ky').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Tinh Hinh Field -->
<div class="form-group col-md-6 @if($errors->has('tinh_hinh')) has-error @endif">
    {!! Form::label('tinh_hinh', 'Tình hình ký kết:') !!}
    {!! Form::text('tinh_hinh', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('tinh_hinh'))
        <div class="help-block">{{ $errors->first('tinh_hinh') }}</div>
    @endif
</div>

<!-- Ket Qua Field -->
<div class="form-group col-md-12 @if($errors->has('ket_qua')) has-error @endif">
    {!! Form::label('ket_qua', 'Kết quả triển khai ký kết:') !!}
    {!! Form::textarea('ket_qua', null, ['class' => 'form-control']) !!}
    @if($errors->has('ket_qua'))
        <div class="help-block">{{ $errors->first('ket_qua') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('kyKetHuuNghis.index') }}" class="btn btn-default">Quay lại</a>
</div>
