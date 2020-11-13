@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết người Hà Giang ở nước ngoài
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('ng_hg_nuoc_ngoais.show_fields')
                    <a href="{{ route('ngHgNuocNgoais.edit', ['ngHgNuocNgoai' => $ngHgNuocNgoai->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('ngHgNuocNgoais.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
