<!-- So Ho Chieu Field -->
<div class="form-group col-md-6 @if($errors->has('so_ho_chieu')) has-error @endif">
    {!! Form::label('so_ho_chieu', 'Số hộ chiếu:') !!}
    {!! Form::text('so_ho_chieu', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('so_ho_chieu'))
        <div class="help-block">{{ $errors->first('so_ho_chieu') }}</div>
    @endif
</div>

<!-- Ho Ten Field -->
<div class="form-group col-md-6 @if($errors->has('ho_ten')) has-error @endif">
    {!! Form::label('ho_ten', 'Họ tên người sử dụng:') !!}
    {!! Form::text('ho_ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ho_ten'))
        <div class="help-block">{{ $errors->first('ho_ten') }}</div>
    @endif
</div>

<!-- Don Vi Field -->
<div class="form-group col-md-6 @if($errors->has('don_vi')) has-error @endif">
    {!! Form::label('don_vi', 'Đơn vị công tác:') !!}
    {!! Form::text('don_vi', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('don_vi'))
        <div class="help-block">{{ $errors->first('don_vi') }}</div>
    @endif
</div>

<!-- Thoi Han Field -->
<div class="form-group col-md-6 @if($errors->has('thoi_han')) has-error @endif">
    {!! Form::label('thoi_han', 'Hạn hộ chiếu:') !!}
    {!! Form::text('thoi_han', null, ['class' => 'form-control','id'=>'thoi_han']) !!}
    @if($errors->has('thoi_han'))
        <div class="help-block">{{ $errors->first('thoi_han') }}</div>
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $('#thoi_han').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Loai Field -->
{{--<div class="form-group col-md-6 @if($errors->has('loai')) has-error @endif">--}}
{{--    {!! Form::label('loai', 'Loại hình hộ chiếu:') !!}--}}
{{--    <select class="form-control select2 select2-hidden-accessible" name="loai">--}}
{{--        @foreach(\App\Models\Constants::HC_LABEL as $key => $loai)--}}
{{--            <option @if (isset($hcNgoaiGiao) && $hcNgoaiGiao->loai == $key) selected @endif value="{{$key}}">{{$loai}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}
{{--    @if($errors->has('loai'))--}}
{{--        <div class="help-block">{{ $errors->first('loai') }}</div>--}}
{{--    @endif--}}
{{--</div>--}}

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('hcNgoaiGiaos.index') }}" class="btn btn-default">Quay lại</a>
</div>
