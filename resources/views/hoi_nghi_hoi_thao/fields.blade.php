<!-- Loai Field -->
<div class="form-group col-md-6 @if($errors->has('loai')) has-error @endif">
    {!! Form::label('loai', 'Loại hội nghị, hội thảo:') !!}
    <select class="form-control select2 select2-hidden-accessible" name="loai">
    @foreach(\App\Models\HoiNghiHoiThao::TYPE_LABEL as $type => $label)
            <option @if (isset($hoiNghiHoiThao) && $hoiNghiHoiThao->loai == $type) selected @endif value="{{$type}}">{{$label}}</option>
    @endforeach
    </select>
    @if($errors->has('loai'))
        <div class="help-block">{{ $errors->first('loai') }}</div>
    @endif
</div>

<!-- Ten Field -->
<div class="form-group col-md-6 @if($errors->has('ten')) has-error @endif">
    {!! Form::label('ten', 'Tên/Chủ đề hội nghị, hội thảo:') !!}
    {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ten'))
        <div class="help-block">{{ $errors->first('ten') }}</div>
    @endif
</div>

<!-- Noi Dung Field -->
<div class="form-group col-md-6 @if($errors->has('co_quan')) has-error @endif">
    {!! Form::label('co_quan', 'Tên cơ quan/Tổ chức nước ngoài phối hợp thực hiện:') !!}
    {!! Form::text('co_quan', null, ['class' => 'form-control']) !!}
    @if($errors->has('co_quan'))
        <div class="help-block">{{ $errors->first('co_quan') }}</div>
    @endif
</div>

<!-- Noi Dung Field -->
<div class="form-group col-md-6 @if($errors->has('noi_dung')) has-error @endif">
    {!! Form::label('noi_dung', 'Nội dung hoạt động:') !!}
    {!! Form::text('noi_dung', null, ['class' => 'form-control']) !!}
    @if($errors->has('noi_dung'))
        <div class="help-block">{{ $errors->first('noi_dung') }}</div>
    @endif
</div>

<!-- Db Vn Field -->
<div class="form-group col-sm-3 @if($errors->has('db_vn')) has-error @endif">
    {!! Form::label('db_vn', 'Số lượng đại biểu người Việt Nam:') !!}
    {!! Form::number('db_vn', null, ['class' => 'form-control']) !!}
    @if($errors->has('db_vn'))
        <div class="help-block">{{ $errors->first('db_vn') }}</div>
    @endif
</div>

<!-- Db Nn Trong Nuoc Field -->
<div class="form-group col-sm-3 @if($errors->has('db_nn_trong_nuoc')) has-error @endif">
    {!! Form::label('db_nn_trong_nuoc', 'Số lượng đại biểu người nước ngoài ở trong nước:') !!}
    {!! Form::number('db_nn_trong_nuoc', null, ['class' => 'form-control']) !!}
    @if($errors->has('db_nn_trong_nuoc'))
        <div class="help-block">{{ $errors->first('db_nn_trong_nuoc') }}</div>
    @endif
</div>

<!-- Db Nn Ngoai Nuoc Field -->
<div class="form-group col-sm-3 @if($errors->has('db_nn_ngoai_nuoc')) has-error @endif">
    {!! Form::label('db_nn_ngoai_nuoc', 'Số lượng đại biểu người nước ngoài từ ngoài nước:') !!}
    {!! Form::number('db_nn_ngoai_nuoc', null, ['class' => 'form-control']) !!}
    @if($errors->has('db_nn_ngoai_nuoc'))
        <div class="help-block">{{ $errors->first('db_nn_ngoai_nuoc') }}</div>
    @endif
</div>

<!-- Db Cac Nuoc Den Field -->
<div class="form-group col-sm-3 @if($errors->has('db_cac_nuoc_den')) has-error @endif">
    {!! Form::label('db_cac_nuoc_den', 'Đại biểu nước ngoài đến từ (các) nước:') !!}
    {!! Form::text('db_cac_nuoc_den', null, ['class' => 'form-control']) !!}
    @if($errors->has('db_cac_nuoc_den'))
        <div class="help-block">{{ $errors->first('db_cac_nuoc_den') }}</div>
    @endif
</div>

<!-- Thoi Gian Field -->
<div class="form-group col-md-6 @if($errors->has('thoi_gian')) has-error @endif">
    {!! Form::label('thoi_gian', 'Thời gian thực hiện:') !!}
    {!! Form::text('thoi_gian', null, ['class' => 'form-control','id'=>'thoi_gian']) !!}
    @if($errors->has('thoi_gian'))
        <div class="help-block">{{ $errors->first('thoi_gian') }}</div>
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $('#thoi_gian').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Dia Diem Field -->
<div class="form-group col-md-6 @if($errors->has('dia_diem')) has-error @endif">
    {!! Form::label('dia_diem', 'Địa điểm tổ chức:') !!}
    {!! Form::text('dia_diem', null, ['class' => 'form-control']) !!}
    @if($errors->has('dia_diem'))
        <div class="help-block">{{ $errors->first('dia_diem') }}</div>
    @endif
</div>

<!-- Kinh Phi Field -->
<div class="form-group col-md-6 @if($errors->has('kinh_phi')) has-error @endif">
        {!! Form::label('kinh_phi', 'Kinh phí:') !!}
    <select class="form-control select2 select2-hidden-accessible" name="kinh_phi">
        @foreach($nguon_kinh_phi as $kinh_phi)
            <option @if (isset($hoiNghiHoiThao) && $hoiNghiHoiThao->kinh_phi == $kinh_phi['id']) selected @endif value="{{$kinh_phi['id']}}">{{$kinh_phi['name']}}</option>
        @endforeach
    </select>
    @if($errors->has('kinh_phi'))
        <div class="help-block">{{ $errors->first('kinh_phi') }}</div>
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush

<!-- Bao Cao Field -->
<div class="form-group col-md-6 @if($errors->has('bao_cao')) has-error @endif">
    {!! Form::label('bao_cao', 'Số, ngày báo cáo:') !!}
    {!! Form::text('bao_cao', null, ['class' => 'form-control']) !!}
    @if($errors->has('bao_cao'))
        <div class="help-block">{{ $errors->first('bao_cao') }}</div>
    @endif
</div>

<!-- Trong Kh Field -->
<div class="form-group col-md-6 @if($errors->has('trong_kh')) has-error @endif">
    {!! Form::label('trong_kh', 'Trong kế hoạch:') !!}
    {!! Form::checkbox('trong_kh', null, null) !!}
    @if($errors->has('trong_kh'))
        <div class="help-block">{{ $errors->first('trong_kh') }}</div>
    @endif
</div>

<!-- Cap Cho Phep Field -->
<div class="form-group col-md-6 @if($errors->has('cap_cho_phep')) has-error @endif">
    {!! Form::label('cap_cho_phep', 'Cấp cho phép:') !!}
    {!! Form::text('cap_cho_phep', null, ['class' => 'form-control']) !!}
    @if($errors->has('cap_cho_phep'))
        <div class="help-block">{{ $errors->first('cap_cho_phep') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ isset($hoiNghiHoiThao) ? route('hoiNghiHoiThao.index', ['type' => $hoiNghiHoiThao->loai]) :  route('hoiNghiHoiThao.index')}}" class="btn btn-default">Quay lại</a>
</div>
