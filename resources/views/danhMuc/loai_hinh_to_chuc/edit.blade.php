@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật loại hình tổ chức
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmLoaiHinhToChuc, ['route' => ['danhMuc.loaiHinhToChuc.update', $dmLoaiHinhToChuc->id], 'method' => 'patch']) !!}

                        @include('danhMuc.loai_hinh_to_chuc.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
