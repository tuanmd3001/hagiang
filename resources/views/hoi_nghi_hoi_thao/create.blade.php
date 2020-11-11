@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới hội nghị, hội thảo quốc tế
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'hoiNghiHoiThao.store']) !!}

                        @include('hoi_nghi_hoi_thao.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
