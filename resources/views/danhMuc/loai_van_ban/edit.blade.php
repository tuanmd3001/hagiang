@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật loại văn bản
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmLoaiVanBan, ['route' => ['danhMuc.loaiVanBan.update', $dmLoaiVanBan->id], 'method' => 'patch']) !!}

                        @include('danhMuc.loai_van_ban.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
