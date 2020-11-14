<!-- So Ho Chieu Field -->
<div class="form-group">
    {!! Form::label('so_ho_chieu', 'Số hộ chiếu:') !!}
    <p>{{ $hcCongVu->so_ho_chieu }}</p>
</div>

<!-- Ho Ten Field -->
<div class="form-group">
    {!! Form::label('ho_ten', 'Họ tên người sử dụng:') !!}
    <p>{{ $hcCongVu->ho_ten }}</p>
</div>

<!-- Don Vi Field -->
<div class="form-group">
    {!! Form::label('don_vi', 'Đơn vị công tác:') !!}
    <p>{{ $hcCongVu->don_vi }}</p>
</div>

<!-- Thoi Han Field -->
<div class="form-group">
    {!! Form::label('thoi_han', 'Hạn hộ chiếu:') !!}
    <p>{{ date_format(new \DateTime($hcCongVu->thoi_han), 'd/m/Y') ?? '' }}</p>
</div>

<!-- Loai Field -->
<div class="form-group">
    {!! Form::label('loai', 'Loại hình hộ chiếu:') !!}
    <p>
    @if($hcCongVu->loai == \App\Models\Constants::HC_NGOAI_GIAO)
        <span class='label label-primary'>{{\App\Models\Constants::HC_LABEL[\App\Models\Constants::HC_NGOAI_GIAO]}}</span>
    @elseif($hcCongVu->loai == \App\Models\Constants::HC_CONG_VU)
        <span class='label label-warning'>{{\App\Models\Constants::HC_LABEL[\App\Models\Constants::HC_CONG_VU]}}</span>
    @elseif($hcCongVu->loai == \App\Models\Constants::HC_PHO_THONG)
        <span class='label label-default'>{{\App\Models\Constants::HC_LABEL[\App\Models\Constants::HC_PHO_THONG]}}</span>
    @endif
    </p>
</div>

