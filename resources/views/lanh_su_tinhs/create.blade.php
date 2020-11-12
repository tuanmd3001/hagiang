@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới vụ việc lãnh sự trên địa bàn tỉnh
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'lanhSuTinhs.store']) !!}

                        @include('lanh_su_tinhs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
