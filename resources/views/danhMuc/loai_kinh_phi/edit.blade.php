@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật loại kinh phí
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmLoaiKinhPhi, ['route' => ['danhMuc.loaiKinhPhi.update', $dmLoaiKinhPhi->id], 'method' => 'patch']) !!}

                        @include('danhMuc.loai_kinh_phi.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
