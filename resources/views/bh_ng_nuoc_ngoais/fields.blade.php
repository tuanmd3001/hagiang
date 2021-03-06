<!-- Ho Ten Field -->
<div class="col-md-12">
    <div class="row">
        <div class="form-group col-md-6 @if($errors->has('ho_ten')) has-error @endif">
            {!! Form::label('ho_ten', 'Họ tên:') !!}
            {!! Form::text('ho_ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
            @if($errors->has('ho_ten'))
                <div class="help-block">{{ $errors->first('ho_ten') }}</div>
            @endif
        </div>
    </div>
</div>

<!-- So Ho Chieu Field -->
<div class="form-group col-md-6 @if($errors->has('so_ho_chieu')) has-error @endif">
    {!! Form::label('so_ho_chieu', 'Số hộ chiếu:') !!}
    {!! Form::text('so_ho_chieu', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('so_ho_chieu'))
        <div class="help-block">{{ $errors->first('so_ho_chieu') }}</div>
    @endif
</div>

<!-- Quoc Tich Field -->
<div class="form-group col-md-6 @if($errors->has('quoc_tich')) has-error @endif">
    {!! Form::label('quoc_tich', 'Quốc tịch:') !!}
    <select class="form-control select2 select2-hidden-accessible" name="quoc_tich">
        <option></option>
        @foreach($quoc_gias as $quoc_gia)
            <option @if (isset($bhNgNuocNgoai) && $bhNgNuocNgoai->quoc_tich == $quoc_gia->id || old('quoc_tich') == $quoc_gia->id) selected @endif value="{{$quoc_gia->id}}">{{$quoc_gia->ten}}</option>
        @endforeach
    </select>
    @if($errors->has('quoc_tich'))
        <div class="help-block">{{ $errors->first('quoc_tich') }}</div>
    @endif
</div>

<!-- Noi Dung Field -->
<div class="form-group col-md-6 @if($errors->has('noi_dung')) has-error @endif">
    {!! Form::label('noi_dung', 'Nội dung hoạt động tại Hà Giang:') !!}
    {!! Form::textarea('noi_dung', null, ['class' => 'form-control']) !!}
    @if($errors->has('noi_dung'))
        <div class="help-block">{{ $errors->first('noi_dung') }}</div>
    @endif
</div>

<!-- Dia Chi Field -->
<div class="form-group col-md-6 @if($errors->has('dia_chi')) has-error @endif">
    {!! Form::label('dia_chi', 'Địa chỉ tạm trú (nếu đang tạm trú):') !!}
    {!! Form::textarea('dia_chi', null, ['class' => 'form-control']) !!}
    @if($errors->has('dia_chi'))
        <div class="help-block">{{ $errors->first('dia_chi') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bhNgNuocNgoais.index') }}" class="btn btn-default">Quay lại</a>
</div>
@push('scripts')
    <script type="text/javascript">
        $('.select2').select2()
    </script>
@endpush
