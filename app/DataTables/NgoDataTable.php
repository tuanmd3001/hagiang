<?php

namespace App\DataTables;

use App\DataTables\ExportHandler\BaseExportHandler;
use App\Models\Ngo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class NgoDataTable extends DataTable
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
            ->editColumn('giay_phep', function ($temp){
                if ($temp->giay_phep == 0){
                    return "<span class='label label-warning'>Chưa có giấy phép</span>";
                }
                elseif ($temp->giay_phep == 1){
                    return "<span class='label label-success'>Đã có giấy phép</span>";
                }
                else {
                    return "";
                }
            })
            ->addColumn('action', 'ngos.datatables_actions')
            ->rawColumns(['giay_phep', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ngo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ngo $model)
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
            ['name' => 'ten', 'data' => 'ten', 'title' => 'Tên tổ chức'],
            ['name' => 'noi_dung', 'data' => 'noi_dung', 'title' => 'Nội dung hoạt động'],
            ['name' => 'dia_ban', 'data' => 'dia_ban', 'title' => 'Địa bàn hoạt động'],
            ['name' => 'giay_phep', 'data' => 'giay_phep', 'title' => 'Giấy phép hoạt động', 'className' => 'text-center']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ngos_datatable_' . time();
    }
    protected $exportClass = BaseExportHandler::class;
}
