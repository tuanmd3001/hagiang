<!-- Ten Field -->
<div class="col-md-12 @if($errors->has('ten')) has-error @endif">
    <div class="row">
        <div class="form-group col-md-6">
            {!! Form::label('ten', 'Tên:') !!}
            {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
            @if($errors->has('ten'))
                <div class="help-block">{{ $errors->first('ten') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="row">
        <!-- File Field -->
        <div class="form-group col-md-6 @if($errors->has('file')) has-error @endif">
            {!! Form::label('file', 'Chữ ký, con dấu:') !!}
            <div class="input-group">
                <label class="input-group-btn">
            <span class="btn btn-primary">Chọn file&hellip;
                <input name="file"
                       id="file"
                       type="file"
                       style="display: none;"
                       accept="image/x-png,.jpg"
                >
            </span>
                </label>
                <input type="text" id="file__name_field" class="form-control" disabled>
            </div>
            @if($errors->has('file'))
                <div class="help-block">{{ $errors->first('file') }}</div>
            @endif
        </div>
    </div>
</div>

<div class="col-md-12" id="preview_container">
    @if (isset($chuKy))
        <img id="chu_ky_preview" class="chu_ky_preview" src="{{$chuKy->file}}" alt="preview" />
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('chuKies.index') }}" class="btn btn-default">Quay lại</a>
</div>

@push('scripts')
    <script>
        $(function () {
            $(document).on('change', ':file', function () {
                if (this.files[0]) {
                    var file = this.files[0],
                        extension = file.name.substr((file.name.lastIndexOf('.') + 1)),
                        input = $(this),
                        numFiles = input.get(0).files ? input.get(0).files.length : 1,
                        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                    if (['png', 'jpg'].indexOf(extension.toLowerCase()) < 0) {
                        input.trigger('fileTypeError');
                    }
                    else if (file.size > 5242880) {
                        input.trigger('fileSizeError');
                    }
                    else {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            if ($('#chu_ky_preview').length){
                                $('#chu_ky_preview')
                                    .attr('src', e.target.result)
                                    .width(300);
                            }
                            else {
                                $('#preview_container').append('<img id="chu_ky_preview" class="chu_ky_preview" src="'+e.target.result+'" alt="preview" />')
                            }
                        };

                        reader.readAsDataURL(file);

                        input.trigger('fileSelected', [numFiles, label]);
                    }
                }
            });


            $(document).ready(function () {
                $(':file').on('fileTypeError', function (event) {
                    $(this).val("");
                    $(this).parents('.input-group').find(':text').val('');
                    $(this).parents('.form-group').addClass('has-error')
                        .append('<div class="help-block">File có định dạng png, jpg</div>');
                });
                $(':file').on('fileSizeError', function (event) {
                    $(this).val("");
                    $(this).parents('.input-group').find(':text').val('');
                    $(this).parents('.form-group').addClass('has-error')
                        .append('<div class="help-block">Dung lượng file tối đa là 5MB</div>');
                });
                $(':file').on('fileSelected', function (event, numFiles, label) {
                    var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                    if (input.length) {
                        input.val(log);
                    }
                    $(this).parents('.form-group').removeClass('has-error').find('.help-block').remove();

                });
            });
        });
    </script>
@endpush
