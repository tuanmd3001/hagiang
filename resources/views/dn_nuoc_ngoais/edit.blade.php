@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin chi tiết doanh nghiệp nước ngoài tại Hà Giang
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dnNuocNgoai, ['route' => ['dnNuocNgoais.update', $dnNuocNgoai->id], 'method' => 'patch']) !!}

                        @include('dn_nuoc_ngoais.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
