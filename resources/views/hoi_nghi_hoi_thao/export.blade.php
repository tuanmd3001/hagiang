<table>
    <thead>
        <tr>
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
        </tr>
        <tr>
            <th rowspan='2'>Người Việt Nam</th>
            <th rowspan='1' colspan='3'>Người nước ngoài</th>
        </tr>
        <tr>
            <th>Ở trong nước</th>
            <th>Từ nước ngoài</th>
            <th>Đến từ (các nước)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($collection as $data)
            <tr>
                @foreach($data as $cell)
                    <td>{{ $cell }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
