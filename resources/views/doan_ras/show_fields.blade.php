<!-- Ten Doan Field -->
<div class="form-group col-md-6">
    {!! Form::label('ten_doan', 'Tên đoàn:') !!}
    <p>{{ $doanRa->ten_doan }}</p>
</div>

<!-- Nuoc Di Field -->
<div class="form-group col-md-6">
    {!! Form::label('nuoc_di', 'Nước đi:') !!}
    <p>{{ $doanRa->ten_nuoc_di }}</p>
</div>

<!-- Doi Tac Field -->
<div class="form-group col-md-6">
    {!! Form::label('doi_tac', 'Đối tác làm việc:') !!}
    <p>{{ $doanRa->doi_tac }}</p>
</div>

<!-- Thoi Gian Field -->
<div class="form-group col-md-6">
    {!! Form::label('thoi_gian', 'Thời gian thực hiện:') !!}
    <p>{{ date_format(new \DateTime($doanRa->thoi_gian), 'd/m/Y') ?? '' }}</p>
</div>

<!-- Kinh Phi Field -->
<div class="form-group col-md-6">
    {!! Form::label('kinh_phi', 'Nguồn kinh phí:') !!}
    <p>{{ $doanRa->ten_kinh_phi }}</p>
</div>

<!-- Bao Cao Field -->
<div class="form-group col-md-6">
    {!! Form::label('bao_cao', 'Số, ngày báo cáo:') !!}
    <p>{{ $doanRa->bao_cao }}</p>
</div>

<!-- Trong Kh Field -->
<div class="form-group col-md-12">
    {!! Form::label('trong_kh', 'Đoàn trong KH:') !!}
    <p><input type="checkbox" class="checkbox" @if($doanRa->trong_kh) checked @endif disabled></p>
</div>

<!-- Noi Dung Field -->
<div class="form-group col-md-6">
    {!! Form::label('noi_dung', 'Nội dung làm việc:') !!}
    <p>{{ $doanRa->noi_dung }}</p>
</div>

<!-- Ghi Chu Field -->
<div class="form-group col-md-6">
    {!! Form::label('ghi_chu', 'Ghi chú:') !!}
    <p>{{ $doanRa->ghi_chu }}</p>
</div>

