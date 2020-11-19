@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin {{\App\Models\LopDaoTao::TYPE_LABEL[$class_type]}}
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       @if($errors->has('system'))
           <ul class="alert alert-danger" style="list-style-type: none">
               @if($errors->has('system'))<li>{{ $errors->first('system') }}</li> @endif
           </ul>
       @endif
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lopDaoTao, ['route' => [\App\Models\LopDaoTao::ROUTE_NAME[$class_type] . '.update', $lopDaoTao->id], 'method' => 'patch']) !!}

                        @include('lop_dao_taos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@push('scripts')
    @include('layouts.datatables_js')
@endpush
