@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới hộ chiếu công vụ
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'hcCongVus.store']) !!}

                        @include('hc_cong_vus.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
