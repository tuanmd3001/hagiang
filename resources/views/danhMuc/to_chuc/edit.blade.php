@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật tổ chức
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmToChuc, ['route' => ['danhMuc.toChuc.update', $dmToChuc->id], 'method' => 'patch']) !!}

                        @include('danhMuc.to_chuc.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
