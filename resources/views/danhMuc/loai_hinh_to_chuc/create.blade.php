@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới loại hình tổ chức
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'danhMuc.loaiHinhToChuc.store']) !!}

                        @include('danhMuc.loai_hinh_to_chuc.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
