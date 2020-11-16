@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chi tiết loại kinh phí
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('danhMuc.loai_kinh_phi.show_fields')
                    <a href="{{ route('danhMuc.loaiKinhPhi.edit', ['loaiKinhPhi' => $dmLoaiKinhPhi->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('danhMuc.loaiKinhPhi.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
