@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật loại đoàn
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmLoaiDoan, ['route' => ['danhMuc.loaiDoan.update', $dmLoaiDoan->id], 'method' => 'patch']) !!}

                        @include('danhMuc.loai_doan.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
