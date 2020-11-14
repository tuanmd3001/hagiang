@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết chữ ký, con dấu
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('chu_kies.show_fields')
                    <a href="{{ route('chuKies.edit', ['chuKy' => $chuKy->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('chuKies.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
