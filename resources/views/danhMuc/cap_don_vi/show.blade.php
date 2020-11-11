@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Dm Cap Don Vi
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('danhMuc.cap_don_vi.show_fields')
                    <a href="{{ route('danhMuc.capDonVi.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
