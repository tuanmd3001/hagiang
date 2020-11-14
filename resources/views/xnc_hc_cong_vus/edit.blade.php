@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin cán bộ XNC bằng hộ chiếu công vụ
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($xncHcCongVu, ['route' => ['xncHcCongVus.update', $xncHcCongVu->id], 'method' => 'patch']) !!}

                        @include('xnc_hc_cong_vus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
