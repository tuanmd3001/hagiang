@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết thỏa thuận quốc tế do {{\App\Models\Ttqt::LEVEL_LABEL[$level]}} ký kết
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('ttqts.show_fields')
                    <div class="col-md-12">
                    <a href="{{ route(\App\Models\Ttqt::ROUTE_NAME[$level] . '.edit', ['ttqt' => $ttqt->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route(\App\Models\Ttqt::ROUTE_NAME[$level] . '.index') }}" class="btn btn-default">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
