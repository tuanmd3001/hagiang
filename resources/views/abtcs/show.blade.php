@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết thẻ ABTC
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('abtcs.show_fields')
                    <a href="{{ route('abtcs.edit', ['abtc' => $abtc->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('abtcs.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
