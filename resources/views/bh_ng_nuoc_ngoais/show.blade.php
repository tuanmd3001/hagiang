@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết người nước ngoài đang hoạt động, tạm trú tại Hà Giang
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('bh_ng_nuoc_ngoais.show_fields')
                    <a href="{{ route('bhNgNuocNgoais.edit', ['bhNgNuocNgoai' => $bhNgNuocNgoai->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('bhNgNuocNgoais.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
