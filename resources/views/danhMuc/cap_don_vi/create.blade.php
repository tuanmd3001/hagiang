@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới cấp đơn vị
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'danhMuc.capDonVi.store']) !!}

                        @include('danhMuc.cap_don_vi.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
