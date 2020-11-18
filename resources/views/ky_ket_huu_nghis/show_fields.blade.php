<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Tên cặp địa phương ký kết hữu nghị:') !!}
    <p>{{ $kyKetHuuNghi->ten }}</p>
</div>

<!-- Ngay Ky Field -->
<div class="form-group">
    {!! Form::label('ngay_ky', 'Ngày ký kết:') !!}
    <p>{{ date_format(new \DateTime($kyKetHuuNghi->ngay_ky), 'd/m/Y') ?? '' }}</p>
</div>

<!-- Tinh Hinh Field -->
<div class="form-group">
    {!! Form::label('tinh_hinh', 'Tình hình ký kết:') !!}
    <p>{{ $kyKetHuuNghi->tinh_hinh }}</p>
</div>

<!-- Ket Qua Field -->
<div class="form-group">
    {!! Form::label('ket_qua', 'Kết quả triển khai ký kết:') !!}
    <p>{{ $kyKetHuuNghi->ket_qua }}</p>
</div>

