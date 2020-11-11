<!-- Ten Field -->
<div class="form-group">
    {!! Form::label('ten', 'Tên hàng hóa:') !!}
    <p>{{ $xuatNhapKhau->ten }}</p>
</div>

<!-- Kim Ngach Field -->
<div class="form-group">
    {!! Form::label('kim_ngach', 'Tổng kim ngạch:') !!}
    <p>{{ $xuatNhapKhau->kim_ngach }}</p>
</div>

<!-- Loai Hinh Field -->
<div class="form-group">
    {!! Form::label('loai_hinh', 'Loại hình:') !!}
    <p>
        @if($xuatNhapKhau->loai_hinh == \App\Models\XuatNhapKhau::TYPE_EXPORT)
            <span class='label label-success'>Xuất khẩu</span>
        @elseif($xuatNhapKhau->loai_hinh == \App\Models\XuatNhapKhau::TYPE_IMPORT)
            <span class='label label-primary'>Nhập khẩu</span>
        @elseif($xuatNhapKhau->loai_hinh == \App\Models\XuatNhapKhau::TYPE_OTHER)
            <span class='label label-info'>Loại hình khác</span>
        @endif
    </p>
</div>

