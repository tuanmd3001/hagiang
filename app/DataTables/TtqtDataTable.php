<?php

namespace App\DataTables;

use App\Models\Ttqt;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class TtqtDataTable extends DataTable
{
    private $type;
    function __construct($type = Ttqt::LEVEL_TINH)
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
            $query->where('danh_nghia_ky', $this->type);
        }, true);

        return $dataTable
            ->addIndexColumn()
            ->editColumn('uy_quyen', function ($temp) {
                if ($temp->uy_quyen){
                    return "X";
                }
                else {
                    return "";
                }
            })
            ->editColumn('ngay_ky', function ($temp){
                return date_format(new \DateTime($temp['ngay_ky']), 'd/m/Y') ?? '';
            })
            ->editColumn('ngay_hieu_luc', function ($temp){
                return date_format(new \DateTime($temp['ngay_hieu_luc']), 'd/m/Y') ?? '';
            })
            ->editColumn('danh_nghia_ky', function ($temp){
                return Ttqt::LEVEL_LABEL[$temp['danh_nghia_ky']];
            })
            ->editColumn('loai_van_ban', function ($temp){
                return Ttqt::TYPE_LABEL[$temp['loai_van_ban']];
            })
            ->editColumn('tinh_trang_hieu_luc', function ($temp){
                return Ttqt::STATUS_LABEL[$temp['tinh_trang_hieu_luc']];
            })
            ->addColumn('action', 'ttqts.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Ttqt $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Ttqt $model)
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
                    "infoFiltered" => "(lọc từ _MAX_ bản ghi)",
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
            ['name' => 'co_quan_de_xuat', 'data' => 'co_quan_de_xuat', 'title' => 'Cơ quan, địa phương đề xuất ký'],
            ['name' => 'danh_nghia_ky', 'data' => 'danh_nghia_ky', 'title' => 'Danh nghĩa ký'],
            ['name' => 'loai_van_ban', 'data' => 'loai_van_ban', 'title' => 'Loại văn bản'],
            ['name' => 'ten_van_ban', 'data' => 'ten_van_ban', 'title' => 'Tên văn bản'],
            ['name' => 'nuoc_ky', 'data' => 'nuoc_ky', 'title' => 'Nước ký'],
            ['name' => 'ten_doi_tac', 'data' => 'ten_doi_tac', 'title' => 'Tên đối tác'],
            ['name' => 'ngay_ky', 'data' => 'ngay_ky', 'title' => 'Ngày ký'],
            ['name' => 'tinh_trang_hieu_luc', 'data' => 'tinh_trang_hieu_luc', 'title' => 'Tình trạng hiệu lực'],
            ['name' => 'ngay_hieu_luc', 'data' => 'ngay_hieu_luc', 'title' => 'Ngày hiệu lực'],
            ['name' => 'thoi_han_hieu_luc', 'data' => 'thoi_han_hieu_luc', 'title' => 'Thời hạn hiệu lực'],
            ['name' => 'nguoi_ky', 'data' => 'nguoi_ky', 'title' => 'Người ký'],
            ['name' => 'cap_phe_duyet', 'data' => 'cap_phe_duyet', 'title' => 'Cấp có thẩm quyền phê duyệt'],
            ['name' => 'uy_quyen', 'data' => 'uy_quyen', 'title' => 'Có ủy quyền', 'className' => 'text-center'],
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
        return 'ttqts_datatable_' . time();
    }
}
