@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết đơn vị, quốc gia tài trợ vốn ODA
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('nguon_odas.show_fields')
                    <a href="{{ route('nguonOdas.edit', ['nguonOda' => $nguonOda->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('nguonOdas.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
