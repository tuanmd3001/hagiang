@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết cán bộ đối ngoại cấp tỉnh
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('can_bo_ngoai_giao_tinhs.show_fields')
                    <a href="{{ route('canBoNgoaiGiaoTinhs.edit', ['canBoNgoaiGiaoTinh' => $canBoNgoaiGiaoTinh->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('canBoNgoaiGiaoTinhs.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
