@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới cán bộ XNC bằng hộ chiếu ngoại giao
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'xncHcNgoaiGiaos.store']) !!}

                        @include('xnc_hc_ngoai_giaos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
