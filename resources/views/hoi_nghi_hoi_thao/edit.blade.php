@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật hội nghị, hội thảo quốc tế
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($hoiNghiHoiThao, ['route' => ['hoiNghiHoiThao.update', $hoiNghiHoiThao->id], 'method' => 'patch']) !!}

                        @include('hoi_nghi_hoi_thao.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
