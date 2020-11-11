@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật thông tin chi tiết số liệu hàng hóa xuất - nhập khẩu
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($xuatNhapKhau, ['route' => ['xuatNhapKhaus.update', $xuatNhapKhau->id], 'method' => 'patch']) !!}

                        @include('xuat_nhap_khaus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
