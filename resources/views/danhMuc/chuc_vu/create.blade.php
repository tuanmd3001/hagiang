@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới chức vụ
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'danhMuc.chucVu.store']) !!}

                        @include('danhMuc.chuc_vu.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
