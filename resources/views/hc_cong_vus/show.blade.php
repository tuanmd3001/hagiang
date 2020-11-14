@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết hộ chiếu công vụ
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('hc_cong_vus.show_fields')
                    <a href="{{ route('hcCongVus.edit', ['hcCongVu' => $hcCongVu->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('hcCongVus.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
