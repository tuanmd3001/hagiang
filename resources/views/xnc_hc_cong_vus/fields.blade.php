<!-- Hc Id Field -->
<div class="form-group col-md-12 @if($errors->has('hc_id')) has-error @endif">
    {!! Form::label('hc_id', 'Hộ chiếu công vụ:') !!}
    <div class="row">
        <div class="col-md-6">
            <select class="form-control select2 select2-hidden-accessible" name="hc_id">
                <option></option>
                @foreach($hcs as $hc)
                    <option @if (isset($xncHcCongVu) && $xncHcCongVu->hc_id == $hc->id) selected @endif value="{{$hc->id}}">
                        {{$hc->so_ho_chieu . " - " . $hc->ho_ten}}
                    </option>
                @endforeach
            </select>
            @if($errors->has('hc_id'))
                <div class="help-block">{{ $errors->first('hc_id') }}</div>
            @endif
        </div>
        <div class="col-md-6">
            <a href="{{route('hcCongVus.create')}}">
                <button class="btn btn-primary" type="button">
                    Thêm hộ chiếu
                </button>
            </a>
        </div>
    </div>
</div>

<!-- Ngay Xnc Field -->
<div class="form-group col-md-6 @if($errors->has('ngay_xnc')) has-error @endif">
    {!! Form::label('ngay_xnc', 'Ngày xuất, nhập cảnh:') !!}
    {!! Form::text('ngay_xnc', null, ['class' => 'form-control','id'=>'ngay_xnc']) !!}
    @if($errors->has('ngay_xnc'))
        <div class="help-block">{{ $errors->first('ngay_xnc') }}</div>
    @endif
</div>

@push('scripts')
    <script type="text/javascript">
        $('#ngay_xnc').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
        $('.select2').select2({
            placeholder: "Chọn hộ chiếu công vụ"
        })
    </script>
@endpush

<!-- Noi Dung Field -->
<div class="form-group col-md-12 @if($errors->has('noi_dung')) has-error @endif">
    {!! Form::label('noi_dung', 'Nội dung XUất, nhập cảnh:') !!}
    {!! Form::textarea('noi_dung', null, ['class' => 'form-control']) !!}
    @if($errors->has('noi_dung'))
        <div class="help-block">{{ $errors->first('noi_dung') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('xncHcCongVus.index') }}" class="btn btn-default">Quay lại</a>
</div>
