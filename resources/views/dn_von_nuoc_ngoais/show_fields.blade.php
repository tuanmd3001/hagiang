<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Tên đơn vị, doanh nghiệp:') !!}
    <p>{{ $dnNuocNgoai->ten }}</p>
</div>

<!-- So Du An Field -->
<div class="form-group">
    {!! Form::label('so_du_an', 'Số lượng dự án đầu tư:') !!}
    <p>{{ $dnNuocNgoai->so_du_an }}</p>
</div>

<!-- Noi Dung Field -->
<div class="form-group">
    {!! Form::label('noi_dung', 'Nội dung hoạt động:') !!}
    <p>{{ $dnNuocNgoai->noi_dung }}</p>
</div>

