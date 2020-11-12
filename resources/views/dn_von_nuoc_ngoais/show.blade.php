@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết doanh nghiệp có vốn đầu tư nước ngoài
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('dn_von_nuoc_ngoais.show_fields')
                    <a href="{{ route('dnVonNuocNgoais.edit', ['dnVonNuocNgoai' => $dnVonNuocNgoai->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('dnVonNuocNgoais.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
