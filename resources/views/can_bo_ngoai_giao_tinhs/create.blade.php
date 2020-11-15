@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới cán bộ chuyên trách đối ngoại cấp tỉnh
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'canBoNgoaiGiaoTinhs.store']) !!}

                        @include('can_bo_ngoai_giao_tinhs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
