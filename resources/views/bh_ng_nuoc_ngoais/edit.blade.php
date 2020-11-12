@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin người nước ngoài đang hoạt động, tạm trú tại Hà Giang
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bhNgNuocNgoai, ['route' => ['bhNgNuocNgoais.update', $bhNgNuocNgoai->id], 'method' => 'patch']) !!}

                        @include('bh_ng_nuoc_ngoais.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
