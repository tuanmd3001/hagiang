@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Xnc Hc Cong Vu
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('xnc_hc_cong_vus.show_fields')
                    <a href="{{ route('xncHcCongVus.edit', ['xncHcCongVu' => $xncHcCongVu->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('xncHcCongVus.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
