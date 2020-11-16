@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới đơn vị
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'danhMuc.donVi.store']) !!}

                        @include('danhMuc.don_vi.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
