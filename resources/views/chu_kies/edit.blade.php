@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tết chữ ký, con dấu
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($chuKy, ['route' => ['chuKies.update', $chuKy->id], 'method' => 'patch','files' =>true,'enctype'=>'multipart/form-data']) !!}

                        @include('chu_kies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
