@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết vụ việc lãnh sự trên địa bàn tỉnh
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('lanh_su_tinhs.show_fields')
                    <a href="{{ route('lanhSuTinhs.edit', ['lanhSuTinh' => $lanhSuTinh->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('lanhSuTinhs.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
