@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chi tiết loại sự kiện
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('danhMuc.loai_su_kien.show_fields')
                    <a href="{{ route('danhMuc.loaiSuKien.edit', ['loaiSuKien' => $dmLoaiSuKien->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('danhMuc.loaiSuKien.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
