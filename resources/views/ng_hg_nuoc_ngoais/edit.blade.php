@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin người Hà Giang ở nước ngoài
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ngHgNuocNgoai, ['route' => ['ngHgNuocNgoais.update', $ngHgNuocNgoai->id], 'method' => 'patch']) !!}

                        @include('ng_hg_nuoc_ngoais.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
