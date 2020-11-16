@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật loại dự án
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmLoaiDuAn, ['route' => ['danhMuc.loaiDuAn.update', $dmLoaiDuAn->id], 'method' => 'patch']) !!}

                        @include('danhMuc.loai_du_an.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
