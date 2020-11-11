@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết dự án của các Đại sứ quán, quỹ, tổ chức quốc tế khác
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('du_an_khacs.show_fields')
                    <a href="{{ route('duAnKhacs.edit', ["duAnKhac" => $duAnKhac->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('duAnKhacs.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
