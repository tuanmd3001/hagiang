@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            hông tin chi tiết đơn vị, quốc gia tài trợ vốn FDI
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('nguon_fdis.show_fields')
                    <a href="{{ route('nguonFdis.edit', ['nguonFdi' => $nguonFdi->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('nguonFdis.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
