@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin đoàn vào cấp {{\App\Models\DoanVao::LEVEL_LABEL[$level]}}
        </h1>
   </section>
   <div class="content">
       @if($errors->has('truong_doan') || $errors->has('members') || $errors->has('system'))
           <ul class="alert alert-danger" style="list-style-type: none">
               @if($errors->has('members')) <li>{{ $errors->first('members') }}</li> @endif
               @if($errors->has('truong_doan')) <li>{{ $errors->first('truong_doan') }}</li> @endif
               @if($errors->has('system')) <li>{{ $errors->first('system') }}</li> @endif
           </ul>
       @endif
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($doanVao, ['route' => [\App\Models\DoanVao::ROUTE_NAME[$level].'.update', $doanVao->id], 'method' => 'patch']) !!}

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
