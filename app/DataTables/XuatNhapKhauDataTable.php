<?php

namespace App\DataTables;

use App\DataTables\ExportHandler\BaseExportHandler;
use App\Models\XuatNhapKhau;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class XuatNhapKhauDataTable extends DataTable
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
            ->editColumn("loai_hinh", function ($temp){
                if ($temp->loai_hinh == XuatNhapKhau::TYPE_EXPORT){
                    return "<span class='label label-success'>Xuất khẩu</span>";
                }
                elseif ($temp->loai_hinh == XuatNhapKhau::TYPE_IMPORT){
                    return "<span class='label label-primary'>Nhập khẩu</span>";
                }
                elseif ($temp->loai_hinh == XuatNhapKhau::TYPE_OTHER){
                    return "<span class='label label-info'>Loại hình khác</span>";
                }
                else{
                    return "";
                }
            })
            ->addColumn('action', 'xuat_nhap_khaus.datatables_actions')
            ->rawColumns(['loai_hinh', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\XuatNhapKhau $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(XuatNhapKhau $model)
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
            ['name' => 'ten', 'data' => 'ten', 'title' => 'Tên hàng hóa'],
            ['name' => 'kim_ngach', 'data' => 'kim_ngach', 'title' => 'Tổng kim ngạch XNK', 'className' => 'text-right'],
            ['name' => 'loai_hinh', 'data' => 'loai_hinh', 'title' => 'Loại hình XNK', 'className' => 'text-center'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'xuat_nhap_khaus_datatable_' . time();
    }
    protected $exportClass = BaseExportHandler::class;
}
