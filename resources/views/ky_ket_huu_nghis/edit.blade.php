@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin, tình hình ký kết hữu nghị
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($kyKetHuuNghi, ['route' => ['kyKetHuuNghis.update', $kyKetHuuNghi->id], 'method' => 'patch']) !!}

                        @include('ky_ket_huu_nghis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
