@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết {{\App\Models\LopDaoTao::TYPE_LABEL[$class_type]}}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('lop_dao_taos.show_fields')
                    <div class="col-md-12">
                        <a href="{{ route(\App\Models\LopDaoTao::ROUTE_NAME[$class_type] . '.edit', $lopDaoTao->id) }}" class="btn btn-primary">Sửa</a>
                        <a href="{{ route(\App\Models\LopDaoTao::ROUTE_NAME[$class_type] . '.index') }}" class="btn btn-default">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('layouts.datatables_js')
@endpush
