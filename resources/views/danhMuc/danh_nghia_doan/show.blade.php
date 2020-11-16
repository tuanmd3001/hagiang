@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chi tiết danh nghĩa đoàn
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('danhMuc.danh_nghia_doan.show_fields')
                    <a href="{{ route('danhMuc.danhNghiaDoan.edit', ['danhNghiaDoan' => $dmDanhNghiaDoan->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('danhMuc.danhNghiaDoan.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
