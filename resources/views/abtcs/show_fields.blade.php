<!-- Ho Ten Field -->
<div class="form-group">
    {!! Form::label('ho_ten', 'Họ tên:') !!}
    <p>{{ $abtc->ho_ten }}</p>
</div>

<!-- So The Field -->
<div class="form-group">
    {!! Form::label('so_the', 'Số thẻ:') !!}
    <p>{{ $abtc->so_the }}</p>
</div>

<!-- Don Vi Field -->
<div class="form-group">
    {!! Form::label('don_vi', 'Đơn vị:') !!}
    <p>{{ $abtc->don_vi }}</p>
</div>

<!-- Thoi Han Field -->
<div class="form-group">
    {!! Form::label('thoi_han', 'Thời hạn:') !!}
    <p>{{ date_format(new \DateTime($abtc->thoi_han), 'd/m/Y') ?? '' }}</p>
</div>

