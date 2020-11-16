@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật danh nghĩa đoàn
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmDanhNghiaDoan, ['route' => ['danhMuc.danhNghiaDoan.update', $dmDanhNghiaDoan->id], 'method' => 'patch']) !!}

                        @include('danhMuc.danh_nghia_doan.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
