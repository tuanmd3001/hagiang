@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết người Hà Giang ở nước ngoài về thăm thân, làm việc trong nước, trong tỉnh
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('ng_hg_ve_nuocs.show_fields')
                    <a href="{{ route('ngHgVeNuocs.edit', ['ngHgVeNuoc' => $ngHgVeNuoc->id]) }}" class="btn btn-primary">Sửa</a>
                    <a href="{{ route('ngHgVeNuocs.index') }}" class="btn btn-default">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
@endsection
