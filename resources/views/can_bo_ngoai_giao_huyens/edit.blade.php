@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin cán bộ chuyên trách đối ngoại cấp huyện
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($canBoNgoaiGiaoHuyen, ['route' => ['canBoNgoaiGiaoHuyens.update', $canBoNgoaiGiaoHuyen->id], 'method' => 'patch']) !!}

                        @include('can_bo_ngoai_giao_huyens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
