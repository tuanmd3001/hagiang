@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chi tiết chức vụ
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('danhMuc.chuc_vu.show_fields')
                    <a href="{{ route('danhMuc.chucVu.edit', ['chucVu' => $dmChucVu->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('danhMuc.chucVu.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
