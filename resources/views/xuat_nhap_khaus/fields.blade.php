<!-- Ten Field -->
<div class="form-group col-md-4 @if($errors->has('ten')) has-error @endif">
    {!! Form::label('ten', 'Tên hàng hóa:') !!}
    {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ten'))
        <div class="help-block">{{ $errors->first('ten') }}</div>
    @endif
</div>

<!-- Kim Ngach Field -->
<div class="form-group col-md-4 @if($errors->has('kim_ngach')) has-error @endif">
    {!! Form::label('kim_ngach', 'Tổng kim ngạch:') !!}
    {!! Form::number('kim_ngach', null, ['class' => 'form-control']) !!}
    @if($errors->has('kim_ngach'))
        <div class="help-block">{{ $errors->first('kim_ngach') }}</div>
    @endif
</div>

<!-- Loai Hinh Field -->
<div class="form-group col-md-4 @if($errors->has('loai_hinh')) has-error @endif">
    {!! Form::label('loai_hinh', 'Loại hình:') !!}
    <select class="form-control select2 select2-hidden-accessible" name="loai_hinh">
        @foreach(\App\Models\XuatNhapKhau::TYPE_LABEL as $type => $label)
            <option @if (isset($xuatNhapKhau) && $xuatNhapKhau->loai_hinh == $type) selected @endif value="{{$type}}">{{$label}}</option>
        @endforeach
    </select>
    @if($errors->has('loai_hinh'))
        <div class="help-block">{{ $errors->first('loai_hinh') }}</div>
    @endif
</div>

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
    <a href="{{ route('xuatNhapKhaus.index') }}" class="btn btn-default">Quay lại</a>
</div>
