@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin đơn vị, quốc gia tài trợ vốn ODA
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nguonOda, ['route' => ['nguonOdas.update', $nguonOda->id], 'method' => 'patch']) !!}

                        @include('nguon_odas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
