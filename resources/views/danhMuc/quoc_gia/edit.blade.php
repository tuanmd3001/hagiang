@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật quốc gia
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmQuocGia, ['route' => ['danhMuc.quocGia.update', $dmQuocGia->id], 'method' => 'patch']) !!}

                        @include('danhMuc.quoc_gia.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
