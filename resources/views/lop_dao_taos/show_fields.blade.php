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

    <div class="tab-content" id="tab-doanRa">
        <div class="tab-pane active" id="info" role="tabpanel" aria-labelledby="info-tab">
            <div class="row">
                <!-- Ten Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('ten', 'Tên lớp:') !!}
                    <p>{{ $lopDaoTao->ten }}</p>
                </div>

                <!-- Thoi Gian Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('thoi_gian', 'Thời gian thực hiện:') !!}
                    <p>{{ date_format(new \DateTime($lopDaoTao->thoi_gian), 'd/m/Y') ?? '' }}</p>
                </div>

                <!-- Dia Diem Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('dia_diem', 'Địa điểm:') !!}
                    <p>{{ $lopDaoTao->dia_diem }}</p>
                </div>

                <!-- So Luong Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('so_luong', 'Số lượng đại biểu:') !!}
                    <p>{{ $lopDaoTao->so_luong }}</p>
                </div>

                <!-- Bao Cao Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('bao_cao', 'Số, ngày báo cáo:') !!}
                    <p>{{ $lopDaoTao->bao_cao }}</p>
                </div>

                <!-- Kinh Phi Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('kinh_phi', 'Kinh phí thực hiện:') !!}
                    <p>{{ $lopDaoTao->ten_kinh_phi }}</p>
                </div>

                <!-- Noi Dung Field -->
                <div class="form-group col-md-6">
                    {!! Form::label('noi_dung', 'Nội dung:') !!}
                    <p>{{ $lopDaoTao->noi_dung }}</p>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="member">
            <div class="row">
                <div class="col-md-12">
                    <table id="selected_members" class="table table-striped table-bordered dataTable no-footer">
                        <thead>
                        <tr>
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
            var table = $('#selected_members').DataTable({
                responsive: true,
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

            $(document).on('shown.bs.tab', 'a[data-toggle="tab"][href="#member"]', function (e) {
                table.columns.adjust().responsive.recalc();
            })
        })
    </script>
@endpush

