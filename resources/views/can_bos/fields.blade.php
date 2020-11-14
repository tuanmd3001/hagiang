<!-- Ten Field -->
<div class="form-group col-md-4 @if($errors->has('ten')) has-error @endif">
    {!! Form::label('ten', 'Họ tên:') !!}
    {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ten'))
        <div class="help-block">{{ $errors->first('ten') }}</div>
    @endif
</div>

<!-- Ngay Sinh Field -->
<div class="form-group col-md-4 @if($errors->has('ngay_sinh')) has-error @endif">
    {!! Form::label('ngay_sinh', 'Ngày sinh:') !!}
    {!! Form::text('ngay_sinh', null, ['class' => 'form-control','id'=>'ngay_sinh']) !!}
    @if($errors->has('ngay_sinh'))
        <div class="help-block">{{ $errors->first('ngay_sinh') }}</div>
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $('#ngay_sinh').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Gioi Tinh Field -->
<div class="form-group col-md-4 @if($errors->has('gioi_tinh')) has-error @endif">
    {!! Form::label('gioi_tinh', 'Giới tính:') !!}
    <select class="form-control select2 select2-hidden-accessible" name="gioi_tinh">
        @foreach(\App\Models\Constants::GENDER_LABEL as $key => $gioi_tinh)
            <option @if (isset($canBo) && $canBo->gioi_tinh == $key) selected @endif value="{{$key}}">{{$gioi_tinh}}</option>
        @endforeach
    </select>
    @if($errors->has('gioi_tinh'))
        <div class="help-block">{{ $errors->first('gioi_tinh') }}</div>
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush

<!-- Sdt Field -->
<div class="form-group col-md-4 @if($errors->has('sdt')) has-error @endif">
    {!! Form::label('sdt', 'Số điện thoại:') !!}
    {!! Form::text('sdt', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
    @if($errors->has('sdt'))
        <div class="help-block">{{ $errors->first('sdt') }}</div>
    @endif
</div>

<!-- Email Field -->
<div class="form-group col-md-4 @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('email'))
        <div class="help-block">{{ $errors->first('email') }}</div>
    @endif
</div>

<!-- Noi Cong Tac Field -->
<div class="form-group col-md-4 @if($errors->has('noi_cong_tac')) has-error @endif">
    {!! Form::label('noi_cong_tac', 'Nơi công tác:') !!}
    {!! Form::text('noi_cong_tac', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('noi_cong_tac'))
        <div class="help-block">{{ $errors->first('noi_cong_tac') }}</div>
    @endif
</div>

<!-- Noi O Field -->
<div class="form-group col-md-4 @if($errors->has('noi_o')) has-error @endif">
    {!! Form::label('noi_o', 'Nơi ở:') !!}
    {!! Form::text('noi_o', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('noi_o'))
        <div class="help-block">{{ $errors->first('noi_o') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('canBos.index') }}" class="btn btn-default">Quay lại</a>
</div>
