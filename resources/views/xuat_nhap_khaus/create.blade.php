@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới số liệu hàng hóa xuất - nhập khẩu
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'xuatNhapKhaus.store']) !!}

                        @include('xuat_nhap_khaus.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
