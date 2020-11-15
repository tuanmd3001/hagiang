@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết điều ước quốc tế
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    @include('duqts.show_fields')
                    <div class="col-md-12">
                    <a href="{{ route('duqts.edit', ['duqt' => $duqt->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('duqts.index') }}" class="btn btn-default">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
