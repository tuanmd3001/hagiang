@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết tổ chức NGOs
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('ngos.show_fields')
                    <a href="{{ route('ngos.edit', ['ngo' => $ngo->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('ngos.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
