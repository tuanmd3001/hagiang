<!-- Ho Ten Field -->
<div class="form-group col-md-6 @if($errors->has('ho_ten')) has-error @endif">
    {!! Form::label('ho_ten', 'Họ tên:') !!}
    {!! Form::text('ho_ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('ho_ten'))
        <div class="help-block">{{ $errors->first('ho_ten') }}</div>
    @endif
</div>

<!-- So The Field -->
<div class="form-group col-md-6 @if($errors->has('so_the')) has-error @endif">
    {!! Form::label('so_the', 'Số thẻ') !!}
    {!! Form::text('so_the', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('so_the'))
        <div class="help-block">{{ $errors->first('so_the') }}</div>
    @endif
</div>

<!-- Don Vi Field -->
<div class="form-group col-md-6 @if($errors->has('don_vi')) has-error @endif">
    {!! Form::label('don_vi', 'Đơn vị:') !!}
    {!! Form::text('don_vi', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    @if($errors->has('don_vi'))
        <div class="help-block">{{ $errors->first('don_vi') }}</div>
    @endif
</div>

<!-- Thoi Han Field -->
<div class="form-group col-md-6 @if($errors->has('thoi_han')) has-error @endif">
    {!! Form::label('thoi_han', 'Thời hạn:') !!}
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

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('abtcs.index') }}" class="btn btn-default">Quay lại</a>
</div>
