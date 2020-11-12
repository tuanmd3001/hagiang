@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết người Hà Giang đi lao động tại nước ngoài
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('bh_ng_ha_giangs.show_fields')
                    <a href="{{ route('bhNgHaGiangs.edit', ['bhNgHaGiang' => $bhNgHaGiang->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('bhNgHaGiangs.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
