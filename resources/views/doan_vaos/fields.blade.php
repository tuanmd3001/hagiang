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
                Thông tin đoàn
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
                Thành viên đoàn
            </a>
        </li>
    </ul>

    <div class="tab-content" id="tab-doanVao">
        <div class="tab-pane active" id="info" role="tabpanel" aria-labelledby="info-tab">
            <div class="row">
                <!-- Ten Doan Field -->
                <div class="form-group col-md-6 @if($errors->has('ten_doan')) has-error @endif">
                    {!! Form::label('ten_doan', 'Tên đoàn:') !!}
                    {!! Form::text('ten_doan', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    @if($errors->has('ten_doan'))
                        <div class="help-block">{{ $errors->first('ten_doan') }}</div>
                    @endif
                </div>

                <!-- Nuoc Di Field -->
                <div class="form-group col-md-6 @if($errors->has('nuoc_den')) has-error @endif">
                    {!! Form::label('nuoc_den', 'Đến từ nước:') !!}
                    <div class="row">
                        <div class="col-xs-7 col-sm-8 col-lg-9">
                            <select class="form-control select2 select2-hidden-accessible" name="nuoc_den">
                                <option></option>
                                @foreach($quoc_gias as $quoc_gia)
                                    <option @if (isset($doanVao) && $doanVao->nuoc_den == $quoc_gia->id || old('nuoc_den') == $quoc_gia->id) selected @endif value="{{$quoc_gia->id}}">{{$quoc_gia->ten}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('nuoc_den'))
                                <div class="help-block">{{ $errors->first('nuoc_den') }}</div>
                            @endif
                        </div>
                        <div class="col-xs-5 col-sm-4 col-lg-3">
                            <a class="btn btn-primary pull-right" href="{{route('danhMuc.quocGia.create')}}">Thêm quốc gia</a>
                        </div>
                    </div>
                </div>

                <!-- Doi Tac Field -->
                <div class="form-group col-md-6 @if($errors->has('doi_tac')) has-error @endif">
                    {!! Form::label('doi_tac', 'Đơn vị, địa phương làm việc:') !!}
                    {!! Form::text('doi_tac', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    @if($errors->has('doi_tac'))
                        <div class="help-block">{{ $errors->first('doi_tac') }}</div>
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

                <!-- Kinh Phi Field -->
                <div class="form-group col-md-6 @if($errors->has('kinh_phi')) has-error @endif">
                    {!! Form::label('kinh_phi', 'Nguồn kinh phí:') !!}
                    <div class="row">
                        <div class="col-xs-7 col-sm-8 col-lg-9">
                            <select class="form-control select2 select2-hidden-accessible" name="kinh_phi">
                                <option></option>
                                @foreach($kinh_phis as $kinh_phi)
                                    <option @if ((isset($doanVao) && $doanVao->kinh_phi == $kinh_phi->id) || old('kinh_phi') == $kinh_phi->id) selected @endif value="{{$kinh_phi->id}}">{{$kinh_phi->ten}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kinh_phi'))
                                <div class="help-block">{{ $errors->first('kinh_phi') }}</div>
                            @endif
                        </div>
                        <div class="col-xs-5 col-sm-4 col-lg-3">
                            <a class="btn btn-primary pull-right" href="{{route('danhMuc.loaiKinhPhi.create')}}">Thêm kinh phí</a>
                        </div>
                    </div>
                </div>

                <!-- Bao Cao Field -->
                <div class="form-group col-md-6 @if($errors->has('bao_cao')) has-error @endif">
                    {!! Form::label('bao_cao', 'Số, ngày báo cáo:') !!}
                    {!! Form::text('bao_cao', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    @if($errors->has('bao_cao'))
                        <div class="help-block">{{ $errors->first('bao_cao') }}</div>
                    @endif
                </div>

                <!-- Trong Kh Field -->
                <div class="form-group col-md-6 @if($errors->has('trong_kh')) has-error @endif">
                    {!! Form::label('trong_kh', 'Đoàn trong KH:') !!}
                    {!! Form::checkbox('trong_kh', null, null) !!}
                    @if($errors->has('trong_kh'))
                        <div class="help-block">{{ $errors->first('trong_kh') }}</div>
                    @endif
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <!-- Noi Dung Field -->
                        <div class="form-group col-md-6 @if($errors->has('noi_dung')) has-error @endif">
                            {!! Form::label('noi_dung', 'Nội dung hoạt động:') !!}
                            {!! Form::textarea('noi_dung', null, ['class' => 'form-control']) !!}
                            @if($errors->has('noi_dung'))
                                <div class="help-block">{{ $errors->first('noi_dung') }}</div>
                            @endif
                        </div>

                        <!-- Ghi Chu Field -->
                        <div class="form-group col-md-6 @if($errors->has('ghi_chu')) has-error @endif">
                            {!! Form::label('ghi_chu', 'Ghi chú:') !!}
                            {!! Form::textarea('ghi_chu', null, ['class' => 'form-control']) !!}
                            @if($errors->has('ghi_chu'))
                                <div class="help-block">{{ $errors->first('ghi_chu') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="member">
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('can_bo', 'Chọn thành viên từ danh sách cán bộ:') !!}
                        </div>
                        <div class="col-md-6">
                            <select class="form-control select2 select2-multiple" name="can_bo" id="can_bo_select">
                                <option></option>
                                @foreach($can_bos as $can_bo)
                                    <option value="{{ json_encode($can_bo) }}">{{$can_bo->ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_canBo">
                                Thêm cán bộ
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    {!! Form::label('', 'Danh sách thành viên đoàn:') !!}
                </div>
                <div class="col-md-12">
                    <table id="selected_members" class="table table-striped table-bordered dataTable no-footer">
                        <thead>
                        <tr>
                            <th>Trưởng đoàn</th>
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
                                    <td class="text-center">
                                        <input type="radio" name="truong_doan" value="{{$thanh_vien->id}}" @if(old('truong_doan') == $thanh_vien->id) checked @endif>
                                        <input type="hidden" name="members[]" value='{{json_encode($thanh_vien)}}'>
                                    </td>
                                    <td>{{ $thanh_vien->ten }}</td>
                                    <td class="text-center">{{ $thanh_vien->ngay_sinh }}</td>
                                    <td class="text-center">{{ \App\Models\Constants::GENDER_LABEL[$thanh_vien->gioi_tinh] }}</td>
                                    <td>{{ $thanh_vien->sdt }}</td>
                                    <td>{{ $thanh_vien->email }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-xs">
                                            <i class="glyphicon glyphicon-trash" data-id="{{$thanh_vien->can_bo_id??$thanh_vien->id}}"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @elseif(isset($thanh_viens))
                            @foreach($thanh_viens as $thanh_vien)
                                @php $thanh_vien->ngay_sinh = date_format(new \DateTime($thanh_vien->ngay_sinh), 'd/m/Y') ?? '' @endphp
                                <tr>
                                    <td class="text-center">
                                        <input type="radio" name="truong_doan" value="{{$thanh_vien->id}}" @if($thanh_vien->truong_doan) checked @endif>
                                        <input type="hidden" name="members[]" value='{{json_encode($thanh_vien)}}'>
                                    </td>
                                    <td>{{ $thanh_vien->ten }}</td>
                                    <td class="text-center">{{ $thanh_vien->ngay_sinh }}</td>
                                    <td class="text-center">{{ \App\Models\Constants::GENDER_LABEL[$thanh_vien->gioi_tinh] }}</td>
                                    <td>{{ $thanh_vien->sdt }}</td>
                                    <td>{{ $thanh_vien->email }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-xs">
                                            <i class="glyphicon glyphicon-trash" data-id="{{$thanh_vien->can_bo_id}}"></i>
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
<div class="modal fade" id="add_canBo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="form-group col-md-12">
                        {!! Form::label('new_noi_cong_tac', 'Nơi công tác:') !!}
                        {!! Form::text('new_noi_cong_tac', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('new_noi_o', 'Nơi ở:') !!}
                        {!! Form::text('new_noi_o', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('save_canBo', 'Thêm vào danh sách cán bộ:') !!}
                        {!! Form::checkbox('save_canBo', 1, null) !!}
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
    <a href="{{ route(\App\Models\DoanVao::ROUTE_NAME[$level].'.index') }}" class="btn btn-default">Quay lại</a>
</div>


@push('scripts')
    <script type="text/javascript">
        var table;
        var oldMembers = [
            @if (old('members'))
                @foreach(old('members') as $member)
                    @php $thanh_vien = json_decode($member) @endphp
                    "{{$thanh_vien->id}}",
                @endforeach
            @elseif(isset($thanh_viens))
                @foreach($thanh_viens as $thanh_vien)
                    "{{$thanh_vien->can_bo_id}}",
                @endforeach
            @endif
        ]
        $('.select2').select2({
            placeholder: "--- Chọn ---"
        });

        $('#ngay_sinh').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
        $('#new_ngay_sinh').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
        $('#thoi_gian').datetimepicker({
            format: 'DD/MM/YYYY',
            useCurrent: true,
            sideBySide: true
        })
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

            $('#add_canBo').on('hidden.bs.modal', function () {
                $('#new_ten').val("").parents('.form-group').removeClass('has-error').find('.help-block').remove();
                $('#new_ngay_sinh').val("").parents('.form-group').removeClass('has-error').find('.help-block').remove();
                $('#new_sdt').val("").parents('.form-group').removeClass('has-error').find('.help-block').remove();
                $('#new_email').val("").parents('.form-group').removeClass('has-error').find('.help-block').remove();
                $('#new_noi_cong_tac').val("").parents('.form-group').removeClass('has-error').find('.help-block').remove();
                $('#new_noi_o').val("").parents('.form-group').removeClass('has-error').find('.help-block').remove();
                $('#save_canBo').prop('checked', false);
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
                    noi_cong_tac: $('#new_noi_cong_tac').val().trim(),
                    noi_o: $('#new_noi_o').val().trim(),
                    save_canBo: $('#save_canBo').is(':checked') ? 1 : 0
                }
                var validate = validateNewMem(new_mem);
                if (validate === true){
                    addNewRow(new_mem);
                }
                else {
                    showNewMemErrors(validate);
                }
            });

            $("#can_bo_select").on("change.select2", function(e) {
                var value = $(this).val();
                if(value) {
                    var canBo = JSON.parse($(this).val());
                    if (!oldMembers.includes(canBo.id.toString())){
                        oldMembers.push(canBo.id.toString())
                        ngay_sinh = new Date(canBo['ngay_sinh']);
                        canBo['tempId'] = makeId();
                        canBo['save_canBo'] = 2;
                        canBo['ngay_sinh'] = ("0" + ngay_sinh.getDate()).slice(-2)  + "/" + ("0"+(ngay_sinh.getMonth()+1)).slice(-2) + "/" + ngay_sinh.getFullYear();
                        addNewRow(canBo)
                    }
                    else {
                        alert("Cán bộ đã có trong danh sách");
                    }

                    var self = $(this);
                    setTimeout(function() {
                        self.val(null).select2('close').trigger("change");
                    }, 100);
                }
            })

            $('#selected_members tbody').on( 'click', '.glyphicon.glyphicon-trash', function () {
                if (confirm("Chắc chắn xóa?")){
                    alert($(this).data("id"));
                    var idx = oldMembers.indexOf(($(this).data("id")).toString())
                    if (idx >= 0){
                        oldMembers.splice(idx, 1);
                    }
                    table.row($(this).parents('tr')).remove().draw();
                }
            });
        })
        const required_field = ['ten', 'ngay_sinh', 'gioi_tinh', 'sdt', 'email', 'noi_cong_tac', 'noi_o'];
        function validateNewMem(new_mem){
            let has_error = false;
            let errors = [];
            for (let i in required_field){
                if(new_mem[required_field[i]] === ""){
                    has_error = true;
                    errors[required_field[i]] = "Thông tin này là bắt buộc";
                }
            }
            if (has_error){
                return errors
            }
            return true;
        }
        function showNewMemErrors(errors){
            for (let i in required_field){
                const parent = $('#' + "new_" + required_field[i]).parents('.form-group');
                parent.find('.help-block').remove();
                if (errors[required_field[i]] !== undefined){
                    parent.addClass('has-error').append('<div class="help-block">'+errors[required_field[i]]+'</div>');
                }
            }
        }
        function addNewRow(new_mem){
            var memId = new_mem.tempId ?? makeId();
            new_mem["id"] = new_mem.id ?? memId;
            const new_mem_json = JSON.stringify(new_mem);
            const rowNode = table.row.add([
                '<input type="radio" name="truong_doan" value="'+memId+'"><input type="hidden" name="members[]" value=\''+new_mem_json+'\'>',
                new_mem.ten,
                new_mem.ngay_sinh,
                new_mem.gioi_tinh ? "Nam" : 'Nữ',
                new_mem.sdt,
                new_mem.email,
                '<button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash" data-id="'+new_mem["id"]+'"></i></button>',
            ]).draw(false).node();
            $( rowNode ).find('td').eq(0).addClass('text-center');
            $( rowNode ).find('td').eq(2).addClass('text-center');
            $( rowNode ).find('td').eq(3).addClass('text-center');
            $( rowNode ).find('td').eq(6).addClass('text-center');
            $('#add_canBo').modal('hide');
        }
        function makeId(length = 10) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }
    </script>
@endpush
