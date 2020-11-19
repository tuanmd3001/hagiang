<?php

namespace App\DataTables;

use App\DataTables\ExportHandler\BaseExportHandler;
use App\Models\KyKetHuuNghi;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class KyKetHuuNghiDataTable extends DataTable
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
            ->editColumn('ngay_ky', function ($temp){
                return date_format(new \DateTime($temp['ngay_ky']), 'd/m/Y') ?? '';
            })
            ->addColumn('action', 'ky_ket_huu_nghis.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\KyKetHuuNghi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(KyKetHuuNghi $model)
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
            ['name' => 'ten', 'data' => 'ten', 'title' => 'Tên cặp địa phương ký kết hữu nghị'],
            ['name' => 'ngay_ky', 'data' => 'ngay_ky', 'title' => 'Ngày ký kết'],
            ['name' => 'tinh_hinh', 'data' => 'tinh_hinh', 'title' => 'Tình hình ký kết'],
            ['name' => 'ket_qua', 'data' => 'ket_qua', 'title' => 'Kết quả triển khai ký kết']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ky_ket_huu_nghis_datatable_' . time();
    }
    protected $exportClass = BaseExportHandler::class;
}
