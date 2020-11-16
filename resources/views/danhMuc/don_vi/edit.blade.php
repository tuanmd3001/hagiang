@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật đơn vị
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmDonVi, ['route' => ['danhMuc.donVi.update', $dmDonVi->id], 'method' => 'patch']) !!}

                        @include('danhMuc.don_vi.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
