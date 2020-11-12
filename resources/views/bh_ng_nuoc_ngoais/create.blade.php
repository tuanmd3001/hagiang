@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới người nước ngoài đang hoạt động, tạm trú tại Hà Giang
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'bhNgNuocNgoais.store']) !!}

                        @include('bh_ng_nuoc_ngoais.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
