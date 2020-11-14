@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết cán bộ XNC bằng hộ chiếu ngoại giao
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('xnc_hc_ngoai_giaos.show_fields')
                    <a href="{{ route('xncHcNgoaiGiaos.edit', ['xncHcNgoaiGiao' => $xncHcNgoaiGiao->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('xncHcNgoaiGiaos.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
