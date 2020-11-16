@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chi tiết tổ chức
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('danhMuc.to_chuc.show_fields')
                    <a href="{{ route('danhMuc.toChuc.edit', ['toChuc' => $dmToChuc->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('danhMuc.toChuc.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
