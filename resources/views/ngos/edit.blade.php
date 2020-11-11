@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chỉnh sửa thông tin tổ chức NGOs
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ngo, ['route' => ['ngos.update', $ngo->id], 'method' => 'patch']) !!}

                        @include('ngos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
