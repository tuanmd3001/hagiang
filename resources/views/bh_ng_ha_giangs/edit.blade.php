@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin người Hà Giang đi lao động tại nước ngoài
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($bhNgHaGiang, ['route' => ['bhNgHaGiangs.update', $bhNgHaGiang->id], 'method' => 'patch']) !!}

                        @include('bh_ng_ha_giangs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
