@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Danh sách người nước ngoài đang hoạt động, tạm trú tại Hà Giang</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('bhNgNuocNgoais.create') }}">Thêm mới</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('bh_ng_nuoc_ngoais.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

