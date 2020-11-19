@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin thỏa thuận quốc tế do cấp {{\App\Models\Ttqt::LEVEL_LABEL[$level]}} ký kết
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ttqt, ['route' => [\App\Models\Ttqt::ROUTE_NAME[$level] . '.update', $ttqt->id], 'method' => 'patch']) !!}

                        @include('ttqts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
