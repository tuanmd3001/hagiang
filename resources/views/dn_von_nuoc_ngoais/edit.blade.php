@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thông tin chi tiết doanh nghiệp có vốn đầu tư nước ngoài
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dnVonNuocNgoai, ['route' => ['dnVonNuocNgoais.update', $dnVonNuocNgoai->id], 'method' => 'patch']) !!}

                        @include('dn_von_nuoc_ngoais.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
