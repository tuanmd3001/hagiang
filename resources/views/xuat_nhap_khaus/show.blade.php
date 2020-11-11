@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết số liệu hàng hóa xuất - nhập khẩu
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('xuat_nhap_khaus.show_fields')
                    <a href="{{ route('xuatNhapKhaus.edit', ['xuatNhapKhau' => $xuatNhapKhau->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('xuatNhapKhaus.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
