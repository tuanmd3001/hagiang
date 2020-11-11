@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chi tiết hội nghị, hội thảo quốc tế
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('hoi_nghi_hoi_thao.show_fields')
                    <a href="{{ route('hoiNghiHoiThao.edit', ['hoiNghiHoiThao' => $hoiNghiHoiThao->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('hoiNghiHoiThao.index', ['type' => $hoiNghiHoiThao->loai]) }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
