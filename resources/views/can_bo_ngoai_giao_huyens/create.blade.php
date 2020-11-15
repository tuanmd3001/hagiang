@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới cán bộ chuyên trách đối ngoại cấp huyện
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'canBoNgoaiGiaoHuyens.store']) !!}

                        @include('can_bo_ngoai_giao_huyens.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
