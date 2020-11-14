@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới hộ chiếu ngoại giao
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'hcNgoaiGiaos.store']) !!}

                        @include('hc_ngoai_giaos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
