@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết cán bộ
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('can_bos.show_fields')
                    <a href="{{ route('canBos.edit', ['canBo' => $canBo->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('canBos.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
