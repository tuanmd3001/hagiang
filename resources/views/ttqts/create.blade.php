@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới thỏa thuận quốc tế do cấp {{\App\Models\Ttqt::ROUTE_NAME[$level]}} ký kết
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => \App\Models\Ttqt::ROUTE_NAME[$level] . '.store']) !!}

                        @include('ttqts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
