<div class="col-md-12">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item active">
            <a class="nav-link"
               id="info-tab"
               data-toggle="tab"
               href="#info"
               role="tab"
               aria-controls="info"
               aria-selected="true">
                Thông tin lớp
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link"
               id="member-tab"
               data-toggle="tab"
               href="#member"
               role="tab"
               aria-controls="info"
               aria-selected="true">
                Thành viên tham dự
            </a>
        </li>
    </ul>
    <div class="tab-content" id="tab-lopDaoTao">
        <div class="tab-pane active" id="info" role="tabpanel" aria-labelledby="info-tab">
            <div class="row">
                <!-- Ten Field -->
                <div class="form-group col-md-6 @if($errors->has('ten')) has-error @endif">
                    {!! Form::label('ten', 'Tên lớp:') !!}
                    {!! Form::text('ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    @if($errors->has('ten'))
                        <div class="help-block">{{ $errors->first('ten') }}</div>
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

                <!-- Dia Diem Field -->
                <div class="form-group col-md-6 @if($errors->has('dia_diem')) has-error @endif">
                    {!! Form::label('dia_diem', 'Địa điểm:') !!}
                    {!! Form::text('dia_diem', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    @if($errors->has('dia_diem'))
                        <div class="help-block">{{ $errors->first('dia_diem') }}</div>
                    @endif
                </div>

                <!-- So Luong Field -->
                <div class="form-group col-md-6 @if($errors->has('so_luong')) has-error @endif">
                    {!! Form::label('so_luong', 'Số lượng đại biểu:') !!}
                    {!! Form::number('so_luong', null, ['class' => 'form-control']) !!}
                    @if($errors->has('so_luong'))
                        <div class="help-block">{{ $errors->first('so_luong') }}</div>
                    @endif
                </div>

                <!-- Bao Cao Field -->
                <div class="form-group col-md-6 @if($errors->has('bao_cao')) has-error @endif">
                    {!! Form::label('bao_cao', 'Số, ngày báo cáo:') !!}
                    {!! Form::text('bao_cao', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    @if($errors->has('bao_cao'))
                        <div class="help-block">{{ $errors->first('bao_cao') }}</div>
                    @endif
                </div>

                <!-- Kinh Phi Field -->
                <div class="form-group col-md-6 @if($errors->has('kinh_phi')) has-error @endif">
                    {!! Form::label('kinh_phi', 'Kinh phí thực hiện:') !!}
                    <select class="form-control select2 select2-hidden-accessible" name="kinh_phi">
                        <option></option>
                        @foreach($kinh_phis as $kinh_phi)
                            <option @if ((isset($lopDaoTao) && $lopDaoTao->kinh_phi == $kinh_phi->id) || old('kinh_phi') == $kinh_phi->id) selected @endif value="{{$kinh_phi->id}}">{{$kinh_phi->ten}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kinh_phi'))
                        <div class="help-block">{{ $errors->first('kinh_phi') }}</div>
                    @endif
                </div>

                <!-- Noi Dung Field -->
                <div class="form-group col-md-12 @if($errors->has('noi_dung')) has-error @endif">
                    {!! Form::label('noi_dung', 'Nội dung:') !!}
                    {!! Form::textarea('noi_dung', null, ['class' => 'form-control']) !!}
                    @if($errors->has('noi_dung'))
                        <div class="help-block">{{ $errors->first('noi_dung') }}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="tab-pane" id="member">
            <div class="row">
                <div class="form-group col-md-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_member_modal">
                        Thêm thành viên
                    </button>
                </div>
                <div class="col-md-12">
                    {!! Form::label('', 'Danh sách tham dự:') !!}
                </div>
                <div class="col-md-12">
                    <table id="selected_members" class="table table-striped table-bordered dataTable no-footer">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Ngày sinh</th>
                            <th>Giới tính</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (old('members'))
                            @foreach(old('members') as $member)
                                @php $thanh_vien = json_decode($member) @endphp
                                <tr>
                                    <td>
                                        {{ $thanh_vien->ten }}
                                        <input type="hidden" name="members[]" value='{{json_encode($thanh_vien)}}'>
                                    </td>
                                    <td class="text-center">{{ $thanh_vien->ngay_sinh }}</td>
                                    <td class="text-center">{{ \App\Models\Constants::GENDER_LABEL[$thanh_vien->gioi_tinh] }}</td>
                                    <td>{{ $thanh_vien->sdt }}</td>
                                    <td>{{ $thanh_vien->email }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-xs">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @elseif(isset($thanh_viens))
                            @foreach($thanh_viens as $thanh_vien)
                                @php $thanh_vien->ngay_sinh = date_format(new \DateTime($thanh_vien->ngay_sinh), 'd/m/Y') ?? '' @endphp
                                <tr>
                                    <td>
                                        {{ $thanh_vien->ten }}
                                        <input type="hidden" name="members[]" value='{{json_encode($thanh_vien)}}'>
                                    </td>
                                    <td class="text-center">{{ $thanh_vien->ngay_sinh }}</td>
                                    <td class="text-center">{{ \App\Models\Constants::GENDER_LABEL[$thanh_vien->gioi_tinh] }}</td>
                                    <td>{{ $thanh_vien->sdt }}</td>
                                    <td>{{ $thanh_vien->email }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-xs">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add_member_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title pull-left" id="exampleModalLabel">Nhập thành viên</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        {!! Form::label('new_ten', 'Họ tên:') !!}
                        {!! Form::text('new_ten', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('new_ngay_sinh', 'Ngày sinh:') !!}
                        {!! Form::text('new_ngay_sinh', null, ['class' => 'form-control','id'=>'new_ngay_sinh']) !!}
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('new_gioi_tinh', 'Giới tính:') !!}
                        <select class="form-control select2 select2-hidden-accessible" id="new_gioi_tinh" name="new_gioi_tinh">
                            @foreach(\App\Models\Constants::GENDER_LABEL as $key => $gioi_tinh)
                                <option value="{{$key}}">{{$gioi_tinh}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('new_sdt', 'Số điện thoại:') !!}
                        {!! Form::text('new_sdt', null, ['class' => 'form-control','maxlength' => 15,'maxlength' => 15]) !!}
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('new_email', 'Email:') !!}
                        {!! Form::email('new_email', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" id="add_member_submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-md-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route(\App\Models\LopDaoTao::ROUTE_NAME[$class_type] . '.index') }}" class="btn btn-default">Quay lại</a>
</div>



@push('scripts')
    <script type="text/javascript">
        var table;
        $('#thoi_gian').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
        $('#new_ngay_sinh').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
        $('.select2').select2({
            placeholder: "--- Chọn ---"
        });

        $(document).ready(function (){
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
            table = $('#selected_members').DataTable({
                dom: 'Prtip',
                "ordering": false,
                'language' : {
                    "emptyTable" : "Không có bản ghi nào",
                    "info" : "Hiển thị bản ghi _START_ - _END_ trên tổng _TOTAL_ bản ghi",
                    "infoEmpty" : "Hiển thị 0 bản ghi",
                    "infoFiltered" : "",
                    "infoPostFix" : "",
                    "thousands" : ",",
                    "lengthMenu" : "Hiển thị _MENU_ bản ghi",
                    "loadingRecords" : "Đang tải...",
                    "processing" : 'Đang xử lý...',
                    "search" : "Tìm kiếm: ",
                    "zeroRecords" : "Không tìm thấy bản ghi nào",
                    "paginate" : {
                        "first" : "«",
                        "last" : "»",
                        "next" : ">",
                        "previous" : "<"
                    },
                },
            });

            $('#add_member_modal').on('hidden.bs.modal', function () {
                $('#new_ten').val("").parents('.form-group').removeClass('has-error').find('.help-block').remove();
                $('#new_ngay_sinh').val("").parents('.form-group').removeClass('has-error').find('.help-block').remove();
                $('#new_sdt').val("").parents('.form-group').removeClass('has-error').find('.help-block').remove();
                $('#new_email').val("").parents('.form-group').removeClass('has-error').find('.help-block').remove();
            });

            $("#add_member_submit").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                let new_mem = {
                    ten: $('#new_ten').val().trim(),
                    ngay_sinh: $('#new_ngay_sinh').val().trim(),
                    gioi_tinh: $('#new_gioi_tinh').val(),
                    sdt: $('#new_sdt').val().trim(),
                    email: $('#new_email').val().trim(),
                }
                var validate = validateNewMem(new_mem);
                if (validate === true){
                    addNewRow(new_mem);
                }
                else {
                    showNewMemErrors(validate);
                }
            });

            $('#selected_members tbody').on( 'click', '.glyphicon.glyphicon-trash', function () {
                if (confirm("Chắc chắn xóa?")){
                    table.row($(this).parents('tr')).remove().draw();
                }
            });
        });
        const required_field = ['ten', 'ngay_sinh', 'gioi_tinh', 'sdt'];
        function validateNewMem(new_mem){
            let has_error = false;
            let errors = [];
            for (let i in required_field){
                if(new_mem[required_field[i]] === ""){
                    has_error = true;
                    errors[required_field[i]] = "Thông tin này là bắt buộc";
                }
            }
            if (!errors['email'] && new_mem['email'] && new_mem['email'] !== "" && !ValidateEmail(new_mem['email'])){
                has_error = true;
                errors['email'] = "Email không hợp lệ";
            }
            if (has_error){
                return errors
            }
            return true;
        }
        function ValidateEmail(text)
        {
            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            return !!text.match(mailformat);
        }
        function showNewMemErrors(errors){
            for (let i in errors){
                const parent = $('#' + "new_" + i).parents('.form-group');
                parent.find('.help-block').remove();
                if (errors[i] !== undefined){
                    parent.addClass('has-error').append('<div class="help-block">'+errors[i]+'</div>');
                }
            }
        }
        function addNewRow(new_mem){
            const new_mem_json = JSON.stringify(new_mem);
            const rowNode = table.row.add([
                new_mem.ten + '<input type="hidden" name="members[]" value=\''+new_mem_json+'\'>',
                new_mem.ngay_sinh,
                new_mem.gioi_tinh ? "Nam" : 'Nữ',
                new_mem.sdt,
                new_mem.email,
                '<button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></button>',
            ]).draw(false).node();
            $( rowNode ).find('td').eq(1).addClass('text-center');
            $( rowNode ).find('td').eq(2).addClass('text-center');
            $( rowNode ).find('td').eq(3).addClass('text-center');
            $( rowNode ).find('td').eq(5).addClass('text-center');
            $('#add_member_modal').modal('hide');
        }
    </script>
@endpush
