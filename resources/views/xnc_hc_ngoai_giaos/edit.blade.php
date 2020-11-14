@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin cán bộ XNC bằng hộ chiếu ngoại giao
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($xncHcNgoaiGiao, ['route' => ['xncHcNgoaiGiaos.update', $xncHcNgoaiGiao->id], 'method' => 'patch']) !!}

                        @include('xnc_hc_ngoai_giaos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
