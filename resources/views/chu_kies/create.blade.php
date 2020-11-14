@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới chũ ký, con dấu
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'chuKies.store','files' =>true,'enctype'=>'multipart/form-data']) !!}

                        @include('chu_kies.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
