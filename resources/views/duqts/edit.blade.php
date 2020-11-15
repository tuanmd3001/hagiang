@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin diều ước quốc tế
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($duqt, ['route' => ['duqts.update', $duqt->id], 'method' => 'patch']) !!}

                        @include('duqts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
