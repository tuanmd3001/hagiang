@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới sự vụ, sự việc biên giới
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'suVuBienGiois.store']) !!}

                        @include('su_vu_bien_giois.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
