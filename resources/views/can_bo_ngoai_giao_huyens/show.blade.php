@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết cán bộ chuyên trách đối ngoại cấp huyện
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('can_bo_ngoai_giao_huyens.show_fields')
                    <a href="{{ route('canBoNgoaiGiaoHuyens.edit', ['canBoNgoaiGiaoHuyen' => $canBoNgoaiGiaoHuyen->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('canBoNgoaiGiaoHuyens.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
