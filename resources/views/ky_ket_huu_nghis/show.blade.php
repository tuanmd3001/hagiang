@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chi tiết thông tin, tình hình ký kết hữu nghị
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('ky_ket_huu_nghis.show_fields')
                    <a href="{{ route('kyKetHuuNghis.edit', $kyKetHuuNghi->id) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('kyKetHuuNghis.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
