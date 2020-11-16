@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật cấp đơn vị
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmCapDonVi, ['route' => ['danhMuc.capDonVi.update', $dmCapDonVi->id], 'method' => 'patch']) !!}

                        @include('danhMuc.cap_don_vi.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
