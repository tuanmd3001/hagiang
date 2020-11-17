<?php

namespace App\DataTables;

use App\DataTables\ExportHandler\BaseExportHandler;
use App\Models\NgHgVeNuoc;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class NgHgVeNuocDataTable extends DataTable
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
            ->editColumn('thoi_gian', function ($temp){
                return date_format(new \DateTime($temp['thoi_gian']), 'd/m/Y') ?? '';
            })
            ->addColumn('action', 'ng_hg_ve_nuocs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\NgHgVeNuoc $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(NgHgVeNuoc $model)
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
            ->addAction(['width' => '120px', 'printable' => false, 'title' => 'Thao tác'])
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
            ['data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'title' => 'STT','searchable' => false],
            ['name' => 'ten', 'data' => 'ten', 'title' => 'Họ tên'],
            ['name' => 'quoc_gia', 'data' => 'quoc_gia', 'title' => 'Quốc gia'],
            ['name' => 'noi_dung', 'data' => 'noi_dung', 'title' => 'Nội dung làm việc'],
            ['name' => 'dia_phuong', 'data' => 'dia_phuong', 'title' => 'Địa phương làm việc'],
            ['name' => 'thoi_gian', 'data' => 'thoi_gian', 'title' => 'Thời gian về làm việc']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ng_hg_ve_nuocs_datatable_' . time();
    }
    protected $exportClass = BaseExportHandler::class;
}
