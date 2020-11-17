@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Danh sách đoàn vào cấp {{\App\Models\DoanVao::LEVEL_LABEL[$level]}}</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route(\App\Models\DoanVao::ROUTE_NAME[$level].'.create') }}">Thêm mới</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('doan_vaos.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

