@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật loại hàng hóa
        </h1>
   </section>
   <div class="content">
{{--       @include('adminlte-templates::common.errors')--}}
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dmLoaiHangHoa, ['route' => ['danhMuc.loaiHangHoa.update', $dmLoaiHangHoa->id], 'method' => 'patch']) !!}

                        @include('danhMuc.loai_hang_hoa.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
