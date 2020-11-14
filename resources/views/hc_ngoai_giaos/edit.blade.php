@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin hộ chiếu ngoại giao
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($hcNgoaiGiao, ['route' => ['hcNgoaiGiaos.update', $hcNgoaiGiao->id], 'method' => 'patch']) !!}

                        @include('hc_ngoai_giaos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
