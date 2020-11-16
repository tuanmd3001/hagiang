@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật loại sự kiện
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmLoaiSuKien, ['route' => ['danhMuc.loaiSuKien.update', $dmLoaiSuKien->id], 'method' => 'patch']) !!}

                        @include('danhMuc.loai_su_kien.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
