@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin sự vụ, sự việc biên giới
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($suVuBienGioi, ['route' => ['suVuBienGiois.update', $suVuBienGioi->id], 'method' => 'patch']) !!}

                        @include('su_vu_bien_giois.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
