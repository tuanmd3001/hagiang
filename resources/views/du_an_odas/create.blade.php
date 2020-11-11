@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới dụ án ODA
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'duAnOdas.store']) !!}

                        @include('du_an_odas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
