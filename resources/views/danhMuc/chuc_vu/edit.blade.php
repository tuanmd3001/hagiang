@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật chức vụ
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmChucVu, ['route' => ['danhMuc.chucVu.update', $dmChucVu->id], 'method' => 'patch']) !!}

                        @include('danhMuc.chuc_vu.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
