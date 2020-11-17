<?php

namespace App\DataTables;

use App\DataTables\ExportHandler\HoiNghiHoiThaoDataTableExportHandler;
use App\Models\HoiNghiHoiThao;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class HoiNghiHoiThaoDataTable extends DataTable
{
    private $type;
    function __construct($type = HoiNghiHoiThao::TYPE_HOST)
    {
        $this->type = $type;
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        $dataTable->filter(function ($query) {
            $query->where('loai', $this->type);
        }, true);
        return $dataTable
            ->addIndexColumn()
            ->editColumn('trong_kh', function (HoiNghiHoiThao $temp) {
                if ($temp->trong_kh){
                    return "X";
                }
                else {
                    return "";
                }
            })
            ->editColumn('thoi_gian', function ($temp){
                return date_format(new \DateTime($temp['thoi_gian']), 'd/m/Y') ?? '';
            })
            ->addColumn('action', 'hoi_nghi_hoi_thao.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HoiNghiHoiThao $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HoiNghiHoiThao $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $header = "<tr>
                        <th rowspan='3'>STT</th>
                        <th rowspan='3'>Tên/Chủ đề hội nghị, hội thảo</th>
                        <th rowspan='3'>Tên cơ quan/Tổ chức nước ngoài phối hợp thực hiện</th>
                        <th rowspan='3'>Nội dung hoạt động</th>
                        <th rowspan='1' colspan='4'>Số lượng đại biểu</th>
                        <th rowspan='3'>Thời gian thực hiện</th>
                        <th rowspan='3'>Địa điểm tổ chức</th>
                        <th rowspan='3'>Kinh phí</th>
                        <th rowspan='3'>Báo cáo</th>
                        <th rowspan='3'>Hoạt động trong KH</th>
                        <th rowspan='3'>Cấp cho phép</th>
                        <th rowspan='3'>Thao tác</th>
                    </tr>
                    <tr>
                        <th rowspan='2'>Người Việt Nam</th>
                        <th rowspan='1' colspan='3'>Người nước ngoài</th>
                    </tr>
                    <tr>
                        <th>Ở trong nước</th>
                        <th>Từ nước ngoài</th>
                        <th>Đến từ (các nước)</th>
                    </tr>";
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Thao tác'])
            ->parameters([
                "initComplete" => "function( settings, json) {
                    $(`{$header}`).prependTo('thead');
                    $('thead tr').last().remove();
                }",
                'dom' => '<"row"<"col-xs-12"f>><"row"<"col-xs-8 p-t-5"l><"col-xs-4 text-right hidden-print"B>>" +
                    "<"row m-t-10"<"col-sm-12"tr>>" +
                    "<"row"<"col-sm-6"i><"col-sm-6 hidden-print"p>>',
                'language' => [
                    "emptyTable" => "Không có bản ghi nào",
                    "info" => "Hiển thị bản ghi _START_ - _END_ trên tổng _TOTAL_ bản ghi",
                    "infoEmpty" => "Hiển thị 0 bản ghi",
                    "infoFiltered" => "",
                    "infoPostFix" => "",
                    "thousands" => ",",
                    "lengthMenu" => "Hiển thị _MENU_ bản ghi",
                    "loadingRecords" => "Đang tải...",
                    "processing" => 'Đang xử lý...',
                    "search" => "Tìm kiếm: ",
                    "zeroRecords" => "Không tìm thấy bản ghi nào",
                    "paginate" => [
                        "first" => "«",
                        "last" => "»",
                        "next" => ">",
                        "previous" => "<"
                    ],
                    "aria" => [
                        "sortAscending" => ": activate to sort column ascending",
                        "sortDescending" => ": activate to sort column descending"],
                    "buttons" => [
                        "copy" => "Sao chép",
                        "excel" => "Xuất Excel",
                        "csv" => "CSV",
                        "pdf" => "PDF",
                        "print" => "In",
                        "colvis" => "Chọn cột hiển thị"
                    ]
                ],
                'autoWidth' => false,
                "ordering" => false,
                'stateSave' => false,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'excel']
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'STT','searchable' => false],
            ['data' => 'ten', 'name' => 'ten', 'title' => 'Tên/Chủ đề hội nghị, hội thảo'],
            ['data' => 'co_quan', 'name' => 'co_quan', 'title' => 'Tên cơ quan/Tổ chức nước ngoài phối hợp thực hiện'],
            ['data' => 'noi_dung', 'name' => 'noi_dung', 'title' => 'Nội dung hoạt động'],
            ['data' => 'db_vn', 'name' => 'db_vn', 'title' => 'Người Việt Nam'],
            ['data' => 'db_nn_trong_nuoc', 'name' => 'db_nn_trong_nuoc', 'title' => 'Ở trong nước'],
            ['data' => 'db_nn_ngoai_nuoc', 'name' => 'db_nn_ngoai_nuoc', 'title' => 'Từ nước ngoài'],
            ['data' => 'db_cac_nuoc_den', 'name' => 'db_cac_nuoc_den', 'title' => 'Đến từ (các) nước'],
            ['data' => 'thoi_gian', 'name' => 'thoi_gian', 'title' => 'Thời gian thực hiện'],
            ['data' => 'dia_diem', 'name' => 'dia_diem', 'title' => 'Địa điểm tổ chức'],
            ['data' => 'nguon_kinh_phi_label', 'name' => 'kinh_phi', 'title' => 'Kinh phí'],
            ['data' => 'bao_cao', 'name' => 'bao_cao', 'title' => 'Báo cáo'],
            ['data' => 'trong_kh', 'name' => 'trong_kh', 'title' => 'Hoạt động trong KH'],
            ['data' => 'cap_cho_phep', 'name' => 'cap_cho_phep', 'title' => 'Cấp cho phép']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'hoi_nghi_hoi_thao_datatable_' . time();
    }

    protected $exportClass = HoiNghiHoiThaoDataTableExportHandler::class;
}
