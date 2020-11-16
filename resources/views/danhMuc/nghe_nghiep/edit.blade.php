@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật nghề nghiệp
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmNgheNghiep, ['route' => ['danhMuc.ngheNghiep.update', $dmNgheNghiep->id], 'method' => 'patch']) !!}

                        @include('danhMuc.nghe_nghiep.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
