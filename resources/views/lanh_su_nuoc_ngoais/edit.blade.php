@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin vụ việc lãnh sự xảy ra tại nước ngoài
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($lanhSuNuocNgoai, ['route' => ['lanhSuNuocNgoais.update', $lanhSuNuocNgoai->id], 'method' => 'patch']) !!}

                        @include('lanh_su_nuoc_ngoais.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
