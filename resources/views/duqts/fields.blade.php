<!-- Co Quan De Xuat Field -->
<div class="form-group col-md-6 @if($errors->has('co_quan_de_xuat')) has-error @endif">
    {!! Form::label('co_quan_de_xuat', 'Cơ quan, địa phương đề xuất ký:') !!}
    {!! Form::text('co_quan_de_xuat', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('co_quan_de_xuat'))
        <div class="help-block">{{ $errors->first('co_quan_de_xuat') }}</div>
    @endif
</div>

<!-- Danh Nghia Ky Field -->
<div class="form-group col-md-6 @if($errors->has('danh_nghia_ky')) has-error @endif">
    {!! Form::label('danh_nghia_ky', 'Danh nghĩa ký:') !!}
    {!! Form::text('danh_nghia_ky', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('danh_nghia_ky'))
        <div class="help-block">{{ $errors->first('danh_nghia_ky') }}</div>
    @endif
</div>

<!-- Loai Van Ban Field -->
<div class="form-group col-md-6 @if($errors->has('loai_van_ban')) has-error @endif">
    {!! Form::label('loai_van_ban', 'Loại văn bản:') !!}
    <select class="form-control select2 select2-hidden-accessible" name="loai_van_ban">
        @foreach(\App\Models\Duqt::TYPE_LABEL as $key => $loai)
            <option @if (isset($duqt) && $duqt->loai_van_ban == $key) selected @endif value="{{$key}}">{{$loai}}</option>
        @endforeach
    </select>
    @if($errors->has('loai_van_ban'))
        <div class="help-block">{{ $errors->first('loai_van_ban') }}</div>
    @endif
</div>

<!-- Ten Van Ban Field -->
<div class="form-group col-md-6 @if($errors->has('ten_van_ban')) has-error @endif">
    {!! Form::label('ten_van_ban', 'Tên văn bản:') !!}
    {!! Form::text('ten_van_ban', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ten_van_ban'))
        <div class="help-block">{{ $errors->first('ten_van_ban') }}</div>
    @endif
</div>

<!-- Nuoc Ky Field -->
<div class="form-group col-md-6 @if($errors->has('nuoc_ky')) has-error @endif">
    {!! Form::label('nuoc_ky', 'Nước ký:') !!}
    {!! Form::text('nuoc_ky', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('nuoc_ky'))
        <div class="help-block">{{ $errors->first('nuoc_ky') }}</div>
    @endif
</div>

<!-- Ten Doi Tac Field -->
<div class="form-group col-md-6 @if($errors->has('ten_doi_tac')) has-error @endif">
    {!! Form::label('ten_doi_tac', 'Tên đối tác:') !!}
    {!! Form::text('ten_doi_tac', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ten_doi_tac'))
        <div class="help-block">{{ $errors->first('ten_doi_tac') }}</div>
    @endif
</div>

<!-- Ngay Ky Field -->
<div class="form-group col-md-3 @if($errors->has('ngay_ky')) has-error @endif">
    {!! Form::label('ngay_ky', 'Ngày ký:') !!}
    {!! Form::text('ngay_ky', null, ['class' => 'form-control','id'=>'ngay_ky']) !!}
    @if($errors->has('ngay_ky'))
        <div class="help-block">{{ $errors->first('ngay_ky') }}</div>
    @endif
</div>

<!-- Tinh Trang Hieu Luc Field -->
<div class="form-group col-md-3 @if($errors->has('tinh_trang_hieu_luc')) has-error @endif">
    {!! Form::label('tinh_trang_hieu_luc', 'Tình trạng hiệu lực:') !!}
    <select class="form-control select2 select2-hidden-accessible" name="tinh_trang_hieu_luc">
        @foreach(\App\Models\Duqt::STATUS_LABEL as $key => $tinh_trang_hieu_luc)
            <option @if (isset($duqt) && $duqt->tinh_trang_hieu_luc == $key) selected @endif value="{{$key}}">{{$tinh_trang_hieu_luc}}</option>
        @endforeach
    </select>
    @if($errors->has('tinh_trang_hieu_luc'))
        <div class="help-block">{{ $errors->first('tinh_trang_hieu_luc') }}</div>
    @endif
</div>

<!-- Ngay Hieu Luc Field -->
<div class="form-group col-md-3 @if($errors->has('ngay_hieu_luc')) has-error @endif">
    {!! Form::label('ngay_hieu_luc', 'Ngày hiệu lực:') !!}
    {!! Form::text('ngay_hieu_luc', null, ['class' => 'form-control','id'=>'ngay_hieu_luc']) !!}
    @if($errors->has('ngay_hieu_luc'))
        <div class="help-block">{{ $errors->first('ngay_hieu_luc') }}</div>
    @endif
</div>
<!-- Thoi Han Hieu Luc Field -->
<div class="form-group col-md-3 @if($errors->has('thoi_han_hieu_luc')) has-error @endif">
    {!! Form::label('thoi_han_hieu_luc', 'Thời hạn hiệu lưc:') !!}
    {!! Form::text('thoi_han_hieu_luc', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('thoi_han_hieu_luc'))
        <div class="help-block">{{ $errors->first('thoi_han_hieu_luc') }}</div>
    @endif
</div>

<!-- Nguoi Ky Field -->
<div class="form-group col-md-6 @if($errors->has('nguoi_ky')) has-error @endif">
    {!! Form::label('nguoi_ky', 'Người ký:') !!}
    {!! Form::text('nguoi_ky', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('nguoi_ky'))
        <div class="help-block">{{ $errors->first('nguoi_ky') }}</div>
    @endif
</div>

<!-- Cap Phe Duyet Field -->
<div class="form-group col-md-6 @if($errors->has('cap_phe_duyet')) has-error @endif">
    {!! Form::label('cap_phe_duyet', 'Cấp có thẩm quyền phê duyệt:') !!}
    {!! Form::text('cap_phe_duyet', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('cap_phe_duyet'))
        <div class="help-block">{{ $errors->first('cap_phe_duyet') }}</div>
    @endif
</div>

<!-- Ky Nhan Doan Cap Cao Field -->
<div class="form-group col-md-6 @if($errors->has('ky_nhan_doan_cap_cao')) has-error @endif">
    {!! Form::label('ky_nhan_doan_cap_cao', 'Ký nhân đoàn cấp cao:') !!}
    {!! Form::text('ky_nhan_doan_cap_cao', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ky_nhan_doan_cap_cao'))
        <div class="help-block">{{ $errors->first('ky_nhan_doan_cap_cao') }}</div>
    @endif
</div>

<!-- Trong Kh Field -->
<div class="form-group col-md-12 @if($errors->has('trong_kh')) has-error @endif">
    {!! Form::label('trong_kh', 'Hoạt động trong kế hoạch:') !!}
    {!! Form::checkbox('trong_kh', null, null) !!}
    @if($errors->has('trong_kh'))
        <div class="help-block">{{ $errors->first('trong_kh') }}</div>
    @endif
</div>

<!-- Ghi Chu Field -->
<div class="form-group col-md-12 @if($errors->has('ghi_chu')) has-error @endif">
    {!! Form::label('ghi_chu', 'Ghi chú:') !!}
    {!! Form::textarea('ghi_chu', null, ['class' => 'form-control']) !!}
    @if($errors->has('ghi_chu'))
        <div class="help-block">{{ $errors->first('ghi_chu') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('duqts.index') }}" class="btn btn-default">Quay lại</a>
</div>

@push('scripts')
    <script type="text/javascript">
        $('#ngay_ky').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
    </script>
    <script type="text/javascript">
        $('#ngay_hieu_luc').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
    </script>
    <script type="text/javascript">
        $('.select2').select2()
    </script>
@endpush
