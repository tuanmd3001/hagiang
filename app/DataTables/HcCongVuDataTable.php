<?php

namespace App\DataTables;

use App\DataTables\ExportHandler\BaseExportHandler;
use App\Models\Constants;
use App\Models\HcCongVu;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class HcCongVuDataTable extends DataTable
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
            ->editColumn('thoi_han', function ($temp){
                return date_format(new \DateTime($temp->thoi_han), 'd/m/Y') ?? '';
            })
            ->editColumn('loai', function ($temp){
                if ($temp->loai == Constants::HC_NGOAI_GIAO){
                    return "<span class='label label-primary'>".Constants::HC_LABEL[Constants::HC_NGOAI_GIAO]."</span>";
                }
                elseif ($temp->loai == Constants::HC_CONG_VU){
                    return "<span class='label label-warning'>".Constants::HC_LABEL[Constants::HC_CONG_VU]."</span>";
                }
                elseif ($temp->loai == Constants::HC_PHO_THONG){
                    return "<span class='label label-default'>".Constants::HC_LABEL[Constants::HC_PHO_THONG]."</span>";
                }
                else{
                    return "";
                }
            })
            ->addColumn('action', 'hc_cong_vus.datatables_actions')
            ->rawColumns(['loai', 'action']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\HcCongVu $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(HcCongVu $model)
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
            ['name' => 'so_ho_chieu', 'data' => 'so_ho_chieu', 'title' => 'Số hộ chiếu'],
            ['name' => 'ho_ten', 'data' => 'ho_ten', 'title' => 'Họ tên'],
            ['name' => 'don_vi', 'data' => 'don_vi', 'title' => 'Đơn vị công tác'],
            ['name' => 'thoi_han', 'data' => 'thoi_han', 'title' => 'Hạn hộ chiếu'],
            ['name' => 'loai', 'data' => 'loai', 'title' => 'Loại hình hộ chiếu', 'className' => 'text-center']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'hc_cong_vus_datatable_' . time();
    }
    protected $exportClass = BaseExportHandler::class;
}
