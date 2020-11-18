@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết sự vụ, sự việc biên giới
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('su_vu_bien_giois.show_fields')
                    <a href="{{ route('suVuBienGiois.edit', $suVuBienGioi->id) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('suVuBienGiois.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
