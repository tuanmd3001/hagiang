<!-- Co Quan De Xuat Field -->
<div class="form-group col-md-6">
    {!! Form::label('co_quan_de_xuat', 'Cơ quan, địa phương đề xuất ký:') !!}
    <p>{{ $ttqt->co_quan_de_xuat }}</p>
</div>

<!-- Danh Nghia Ky Field -->
<div class="form-group col-md-6">
    {!! Form::label('danh_nghia_ky', 'Danh nghĩa ký:') !!}
    <p>{{ \App\Models\Ttqt::LEVEL_LABEL[$ttqt->danh_nghia_ky] }}</p>
</div>

<!-- Loai Van Ban Field -->
<div class="form-group col-md-6">
    {!! Form::label('loai_van_ban', 'Loại văn bản:') !!}
    <p>{{ \App\Models\Duqt::TYPE_LABEL[$ttqt->loai_van_ban] }}</p>
</div>

<!-- Ten Van Ban Field -->
<div class="form-group col-md-6">
    {!! Form::label('ten_van_ban', 'Tên văn bản:') !!}
    <p>{{ $ttqt->ten_van_ban }}</p>
</div>

<!-- Nuoc Ky Field -->
<div class="form-group col-md-6">
    {!! Form::label('nuoc_ky', 'Nước ký:') !!}
    <p>{{ $ttqt->nuoc_ky }}</p>
</div>

<!-- Ten Doi Tac Field -->
<div class="form-group col-md-6">
    {!! Form::label('ten_doi_tac', 'Tên đối tác:') !!}
    <p>{{ $ttqt->ten_doi_tac }}</p>
</div>

<!-- Ngay Ky Field -->
<div class="form-group col-md-3">
    {!! Form::label('ngay_ky', 'Ngày ký:') !!}
    <p>{{ date_format(new \DateTime($ttqt->ngay_ky), 'd/m/Y') ?? '' }}</p>
</div>

<!-- Tinh Trang Hieu Luc Field -->
<div class="form-group col-md-3">
    {!! Form::label('tinh_trang_hieu_luc', 'Tình trạng hiệu lực:') !!}
    <p>{{ \App\Models\Duqt::STATUS_LABEL[$ttqt->tinh_trang_hieu_luc] }}</p>
</div>

<!-- Ngay Hieu Luc Field -->
<div class="form-group col-md-3">
    {!! Form::label('ngay_hieu_luc', 'Ngày hiệu lực:') !!}
    <p>{{ date_format(new \DateTime($ttqt->ngay_hieu_luc), 'd/m/Y') ?? '' }}</p>
</div>

<!-- Thoi Han Hieu Luc Field -->
<div class="form-group col-md-3">
    {!! Form::label('thoi_han_hieu_luc', 'Thời hạn hiệu lực:') !!}
    <p>{{ $ttqt->thoi_han_hieu_luc }}</p>
</div>

<!-- Nguoi Ky Field -->
<div class="form-group col-md-6">
    {!! Form::label('nguoi_ky', 'Người ký:') !!}
    <p>{{ $ttqt->nguoi_ky }}</p>
</div>

<!-- Cap Phe Duyet Field -->
<div class="form-group col-md-6">
    {!! Form::label('cap_phe_duyet', 'Cấp có thẩm quyền phê duyệt:') !!}
    <p>{{ $ttqt->cap_phe_duyet }}</p>
</div>

<!-- Trong Kh Field -->
<div class="form-group col-md-12">
    {!! Form::label('uy_quyền', 'Có ủy quyền:') !!}
    <p><input type="checkbox" class="checkbox" @if($ttqt->trong_kh) checked @endif disabled></p>
</div>

<!-- Ghi Chu Field -->
<div class="form-group col-md-12">
    {!! Form::label('ghi_chu', 'Ghi chú:') !!}
    <p>{{ $ttqt->ghi_chu }}</p>
</div>

