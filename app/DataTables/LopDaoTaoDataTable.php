<?php

namespace App\DataTables;

use App\Models\LopDaoTao;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class LopDaoTaoDataTable extends DataTable
{
    private $class_type;
    function __construct($class_type = LopDaoTao::TYPE_LOP_DAO_TAO)
    {
        $this->class_type = $class_type;
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
            $query->where('type', $this->class_type);
        }, true);

        return $dataTable
            ->addIndexColumn()
            ->editColumn('thoi_gian', function ($temp){
                return date_format(new \DateTime($temp['thoi_gian']), 'd/m/Y') ?? '';
            })
            ->addColumn('action', 'lop_dao_taos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LopDaoTao $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LopDaoTao $model)
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
                'responsive'=> true,
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
            ['name' => 'ten', 'data' => 'ten', 'title' => 'Tên lớp'],
            ['name' => 'noi_dung', 'data' => 'noi_dung', 'title' => 'Nội dung'],
            ['name' => 'thoi_gian', 'data' => 'thoi_gian', 'title' => 'Thời gian thực hiện'],
            ['name' => 'dia_diem', 'data' => 'dia_diem', 'title' => 'Địa điểm'],
            ['name' => 'so_luong', 'data' => 'so_luong', 'title' => 'Số lượng đại biểu', 'className' => 'text-right'],
            ['name' => 'bao_cao', 'data' => 'bao_cao', 'title' => 'Số, ngày báo cáo'],
            ['name' => 'ten_kinh_phi', 'data' => 'ten_kinh_phi', 'title' => 'Kinh phi thực hiện', 'className' => 'text-center']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'lop_dao_taos_datatable_' . time();
    }
}
