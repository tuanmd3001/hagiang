@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin dự án của các Đại sứ quán, quỹ, tổ chức quốc tế khác
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($duAnKhac, ['route' => ['duAnKhacs.update', $duAnKhac->id], 'method' => 'patch']) !!}

                        @include('du_an_khacs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
