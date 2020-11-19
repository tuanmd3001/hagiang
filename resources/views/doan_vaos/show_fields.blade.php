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
                <div class="form-group col-md-6">
                    {!! Form::label('ten_doan', 'Tên đoàn:') !!}
                    <p>{{ $doanVao->ten_doan }}</p>
                </div>

                <!-- Nuoc Di Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('nuoc_den', 'Đến từ nước:') !!}
                    <p>{{ $doanVao->ten_nuoc_den }}</p>
                </div>

                <!-- Doi Tac Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('doi_tac', 'Đơn vị, địa phương làm việc:') !!}
                    <p>{{ $doanVao->doi_tac }}</p>
                </div>

                <!-- Thoi Gian Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('thoi_gian', 'Thời gian thực hiện:') !!}
                    <p>{{ date_format(new \DateTime($doanVao->thoi_gian), 'd/m/Y') ?? '' }}</p>
                </div>

                <!-- Kinh Phi Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('kinh_phi', 'Nguồn kinh phí:') !!}
                    <p>{{ $doanVao->ten_kinh_phi }}</p>
                </div>
                <!-- Bao Cao Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('bao_cao', 'Số, ngày báo cáo:') !!}
                    <p>{{ $doanVao->bao_cao }}</p>
                </div>

                <!-- Trong Kh Field -->
                <div class="form-group col-md-12">
                    {!! Form::label('trong_kh', 'Đoàn trong KH:') !!}
                    <p><input type="checkbox" class="checkbox" @if($doanVao->trong_kh) checked @endif disabled></p>
                </div>

                <!-- Noi Dung Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('noi_dung', 'Nội dung làm việc:') !!}
                    <p>{{ $doanVao->noi_dung }}</p>
                </div>

                <!-- Ghi Chu Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('ghi_chu', 'Ghi chú:') !!}
                    <p>{{ $doanVao->ghi_chu }}</p>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="member">
            <div class="row">
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
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($thanh_viens))
                            @foreach($thanh_viens as $thanh_vien)
                                @php $thanh_vien->ngay_sinh = date_format(new \DateTime($thanh_vien->ngay_sinh), 'd/m/Y') ?? '' @endphp
                                <tr>
                                    <td class="text-center">
                                        <input type="radio" name="truong_doan" disabled value="{{$thanh_vien->id}}" @if($thanh_vien->truong_doan) checked @endif>
                                        <input type="hidden" name="members[]" value='{{json_encode($thanh_vien)}}'>
                                    </td>
                                    <td>{{ $thanh_vien->ten }}</td>
                                    <td class="text-center">{{ $thanh_vien->ngay_sinh }}</td>
                                    <td class="text-center">{{ \App\Models\Constants::GENDER_LABEL[$thanh_vien->gioi_tinh] }}</td>
                                    <td>{{ $thanh_vien->sdt }}</td>
                                    <td>{{ $thanh_vien->email }}</td>
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
@push('scripts')
    <script>
        $(function (){
            $('#selected_members').DataTable({
                dom: '<"row"<"col-xs-12"f>><"row"<"col-xs-8 p-t-5"l>><"row m-t-10"<"col-sm-12"tr>><"row"<"col-sm-6"i><"col-sm-6 hidden-print"p>>',
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
        })
    </script>
@endpush

