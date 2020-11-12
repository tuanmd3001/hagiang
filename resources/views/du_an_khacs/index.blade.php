@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Danh sách dự án của các Đại sứ quán, quỹ, tổ chức quốc tế khác</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('duAnKhacs.create') }}">Thêm mới</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('du_an_khacs.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
