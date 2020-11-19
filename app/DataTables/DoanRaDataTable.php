<?php

namespace App\DataTables;

use App\DataTables\ExportHandler\BaseExportHandler;
use App\Models\Danh_Muc\DmLoaiKinhPhi;
use App\Models\Danh_Muc\DmQuocGia;
use App\Models\DoanRa;
use App\Models\DoanRaThanhVien;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DoanRaDataTable extends DataTable
{
    private $level;
    function __construct($level = DoanRa::LEVEL_TINH)
    {
        $this->level = $level;
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
            $query->where('level', $this->level);
        }, true);

        return $dataTable
            ->addIndexColumn()
            ->editColumn('trong_kh', function ($temp) {
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
            ->editColumn('truong_doan', function ($temp){
                $truong_doan = DoanRaThanhVien::where('doan_ra_id', $temp->id)->where("truong_doan", 1)->first();
                return $truong_doan ? $truong_doan->ten : "";
            })
            ->editColumn('so_nguoi', function ($temp){
                return DoanRaThanhVien::where('doan_ra_id', $temp->id)->count();
            })
            ->addColumn('action', 'doan_ras.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\DoanRa $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DoanRa $model)
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
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Thao tác', 'className' => 'text-center'])
            ->parameters([
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
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'STT','searchable' => false, 'className' => 'text-center'],
            ['name' => 'ten_doan', 'data' => 'ten_doan', 'title' => 'Tên đoàn'],
            ['name' => 'truong_doan', 'data' => 'truong_doan', 'title' => 'Trưởng đoàn'],
            ['name' => 'ten_nuoc_di', 'data' => 'ten_nuoc_di', 'title' => 'Nước đi'],
            ['name' => 'doi_tac', 'data' => 'doi_tac', 'title' => 'Đối tác làm việc'],
            ['name' => 'noi_dung', 'data' => 'noi_dung', 'title' => 'Nội dung hoạt động'],
            ['name' => 'so_nguoi', 'data' => 'so_nguoi', 'title' => 'Số người', 'className' => 'text-right'],
            ['name' => 'thoi_gian', 'data' => 'thoi_gian', 'title' => 'Thời gian thực hiện', 'className' => 'text-center'],
            ['name' => 'ten_kinh_phi', 'data' => 'ten_kinh_phi', 'title' => 'Kinh phí', 'className' => 'text-center'],
            ['name' => 'bao_cao', 'data' => 'bao_cao', 'title' => 'Báo cáo'],
            ['name' => 'trong_kh', 'data' => 'trong_kh', 'title' => 'Đoàn trong KH', 'className' => 'text-center'],
            ['name' => 'ghi_chu', 'data' => 'ghi_chu', 'title' => 'Ghi chú']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'doan_ras_datatable_' . time();
    }
    protected $exportClass = BaseExportHandler::class;
}
