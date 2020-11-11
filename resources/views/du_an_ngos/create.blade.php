@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới dự án của các tổ chức NGOs
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'duAnNgos.store']) !!}

                        @include('du_an_ngos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
