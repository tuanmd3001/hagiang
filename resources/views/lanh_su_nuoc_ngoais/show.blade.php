@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết vụ việc lãnh sự xảy ra tại nước ngoài
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('lanh_su_nuoc_ngoais.show_fields')
                    <a href="{{ route('lanhSuNuocNgoais.edit', ['lanhSuNuocNgoai' => $lanhSuNuocNgoai->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('lanhSuNuocNgoais.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
