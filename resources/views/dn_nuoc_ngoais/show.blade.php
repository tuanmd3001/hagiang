@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết doanh nghiệp nước ngoài tại Hà Giang
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('dn_nuoc_ngoais.show_fields')
                    <a href="{{ route('dnNuocNgoais.edit', ['dnNuocNgoai' => $dnNuocNgoai->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('dnNuocNgoais.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
