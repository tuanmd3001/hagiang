<!-- Co Quan De Xuat Field -->
<div class="form-group col-md-6">
    {!! Form::label('co_quan_de_xuat', 'Cơ quan, địa phương đề xuất ký:') !!}
    <p>{{ $duqt->co_quan_de_xuat }}</p>
</div>

<!-- Danh Nghia Ky Field -->
<div class="form-group col-md-6">
    {!! Form::label('danh_nghia_ky', 'Danh nghĩa ký:') !!}
    <p>{{ $duqt->danh_nghia_ky }}</p>
</div>

<!-- Loai Van Ban Field -->
<div class="form-group col-md-6">
    {!! Form::label('loai_van_ban', 'Loại văn bản:') !!}
    <p>{{ $duqt->loai_van_ban_label }}</p>
</div>

<!-- Ten Van Ban Field -->
<div class="form-group col-md-6">
    {!! Form::label('ten_van_ban', 'Tên văn bản:') !!}
    <p>{{ $duqt->ten_van_ban }}</p>
</div>

<!-- Nuoc Ky Field -->
<div class="form-group col-md-6">
    {!! Form::label('nuoc_ky', 'Nước ký:') !!}
    <p>{{ $duqt->ten_nuoc_ky }}</p>
</div>

<!-- Ten Doi Tac Field -->
<div class="form-group col-md-6">
    {!! Form::label('ten_doi_tac', 'Tên đối tác:') !!}
    <p>{{ $duqt->ten_doi_tac }}</p>
</div>

<!-- Ngay Ky Field -->
<div class="form-group col-md-3">
    {!! Form::label('ngay_ky', 'Ngày ký:') !!}
    <p>{{ date_format(new \DateTime($duqt->ngay_ky), 'd/m/Y') ?? '' }}</p>
</div>

<!-- Tinh Trang Hieu Luc Field -->
<div class="form-group col-md-3">
    {!! Form::label('tinh_trang_hieu_luc', 'Tình trạng hiệu lực:') !!}
    <p>{{ \App\Models\Duqt::STATUS_LABEL[$duqt->tinh_trang_hieu_luc] }}</p>
</div>

<!-- Ngay Hieu Luc Field -->
<div class="form-group col-md-3">
    {!! Form::label('ngay_hieu_luc', 'Ngày hiệu lực:') !!}
    <p>{{ date_format(new \DateTime($duqt->ngay_hieu_luc), 'd/m/Y') ?? '' }}</p>
</div>

<!-- Thoi Han Hieu Luc Field -->
<div class="form-group col-md-3">
    {!! Form::label('thoi_han_hieu_luc', 'Thời hạn hiệu lực:') !!}
    <p>{{ $duqt->thoi_han_hieu_luc }}</p>
</div>

<!-- Nguoi Ky Field -->
<div class="form-group col-md-6">
    {!! Form::label('nguoi_ky', 'Người ký:') !!}
    <p>{{ $duqt->nguoi_ky }}</p>
</div>

<!-- Cap Phe Duyet Field -->
<div class="form-group col-md-6">
    {!! Form::label('cap_phe_duyet', 'Cấp có thẩm quyền phê duyệt:') !!}
    <p>{{ $duqt->cap_phe_duyet }}</p>
</div>

<!-- Ky Nhan Doan Cap Cao Field -->
<div class="form-group col-md-6">
    {!! Form::label('ky_nhan_doan_cap_cao', 'Ký nhân đoàn cấp cao:') !!}
    <p>{{ $duqt->ky_nhan_doan_cap_cao }}</p>
</div>

<!-- Trong Kh Field -->
<div class="form-group col-md-12">
    {!! Form::label('trong_kh', 'Hoạt động trong kế hoạch:') !!}
    <p><input type="checkbox" class="checkbox" @if($duqt->trong_kh) checked @endif disabled></p>
</div>

<!-- Ghi Chu Field -->
<div class="form-group col-md-12">
    {!! Form::label('ghi_chu', 'Ghi chú:') !!}
    <p>{{ $duqt->ghi_chu }}</p>
</div>

