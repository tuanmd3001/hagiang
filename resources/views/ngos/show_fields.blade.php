<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Tên tổ chức:') !!}
    <p>{{ $ngo->ten }}</p>
</div>

<!-- Noi Dung Field -->
<div class="form-group">
    {!! Form::label('noi_dung', 'Nội dung hoạt động:') !!}
    <p>{{ $ngo->noi_dung }}</p>
</div>

<!-- Dia Ban Field -->
<div class="form-group">
    {!! Form::label('dia_ban', 'Địa bàn hoạt động:') !!}
    <p>{{ $ngo->dia_ban }}</p>
</div>

<!-- Giay Phep Field -->
<div class="form-group">
    {!! Form::label('giay_phep', 'Giấy phép hoạt động:') !!}
    <p>
        @if($ngo->giay_phep == 0)
            <span class='label label-warning'>Chưa có giấy phép</span>
        @elseif($ngo->giay_phep == 1)
            <span class='label label-success'>Đã có giấy phép</span>
        @endif
    </p>
</div>

