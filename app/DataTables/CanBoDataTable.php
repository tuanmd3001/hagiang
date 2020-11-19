<?php

namespace App\DataTables;

use App\DataTables\ExportHandler\BaseExportHandler;
use App\Models\CanBo;
use App\Models\Constants;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class CanBoDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->addIndexColumn()
            ->editColumn('ngay_sinh', function ($temp){
                return date_format(new \DateTime($temp->ngay_sinh), 'd/m/Y') ?? '';
            })
            ->editColumn('gioi_tinh', function ($temp){
                return Constants::GENDER_LABEL[$temp->gioi_tinh];
            })
            ->addColumn('action', 'can_bos.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CanBo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(CanBo $model)
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
            ['name' => 'ten', 'data' => 'ten', 'title' => 'Họ tên'],
            ['name' => 'ngay_sinh', 'data' => 'ngay_sinh', 'title' => 'Ngày sinh'],
            ['name' => 'gioi_tinh', 'data' => 'gioi_tinh', 'title' => 'Giới tính'],
            ['name' => 'sdt', 'data' => 'sdt', 'title' => 'Số điện thoại'],
            ['name' => 'email', 'data' => 'email', 'title' => 'Email'],
            ['name' => 'noi_cong_tac', 'data' => 'noi_cong_tac', 'title' => 'Nơi công tác'],
            ['name' => 'noi_o', 'data' => 'noi_o', 'title' => 'Nơi ở']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'can_bos_datatable_' . time();
    }
    protected $exportClass = BaseExportHandler::class;
}
