<!-- Ho Ten Field -->
<div class="form-group col-md-4">
    {!! Form::label('ho_ten', 'Họ tên:') !!}
    {!! Form::text('ho_ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Nam Sinh Field -->
<div class="form-group col-md-4">
    {!! Form::label('nam_sinh', 'Năm sinh:') !!}
    {!! Form::text('nam_sinh', null, ['class' => 'form-control','id'=>'nam_sinh']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#nam_sinh').datetimepicker({
            format: 'YYYY',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Que Quan Field -->
<div class="form-group col-md-4">
    {!! Form::label('que_quan', 'Quê quán:') !!}
    {!! Form::text('que_quan', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Nuoc Lao Dong Field -->
<div class="form-group col-md-4">
    {!! Form::label('nuoc_lao_dong', 'Đi lao động tại nước:') !!}
    {!! Form::text('nuoc_lao_dong', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Nganh Nghe Field -->
<div class="form-group col-md-4">
    {!! Form::label('nganh_nghe', 'Ngành nghề lao động:') !!}
    {!! Form::text('nganh_nghe', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Thoi Han Field -->
<div class="form-group col-md-4">
    {!! Form::label('thoi_han', 'Thời hạn lao động:') !!}
    {!! Form::text('thoi_han', null, ['class' => 'form-control','id'=>'thoi_han']) !!}
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
    <a href="{{ route('bhNgHaGiangs.index') }}" class="btn btn-default">Quay lại</a>
</div>
