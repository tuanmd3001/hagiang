@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết đoàn vào cấp {{\App\Models\DoanVao::LEVEL_LABEL[$level]}}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('doan_vaos.show_fields')
                    <div class="col-md-12">
                        <a href="{{ route(\App\Models\DoanVao::ROUTE_NAME[$level].'.edit', $doanVao->id) }}" class="btn btn-primary">Sửa</a>
                        <a href="{{ route(\App\Models\DoanVao::ROUTE_NAME[$level].'.index') }}" class="btn btn-default">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('layouts.datatables_js')
@endpush
