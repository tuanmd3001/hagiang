@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới đoàn vào cấp {{\App\Models\DoanRa::LEVEL_LABEL[$level]}}
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}
        @if($errors->has('truong_doan') || $errors->has('members') || $errors->has('system'))
            <ul class="alert alert-danger" style="list-style-type: none">
                @if($errors->has('members')) <li>{{ $errors->first('members') }}</li> @endif
                @if($errors->has('truong_doan')) <li>{{ $errors->first('truong_doan') }}</li> @endif
                @if($errors->has('system')) <li>{{ $errors->first('system') }}</li> @endif
            </ul>
        @endif
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => \App\Models\DoanRa::ROUTE_NAME[$level].'.store']) !!}

                        @include('doan_vaos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @include('layouts.datatables_js')
@endpush
