@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới người Hà Giang ở nước ngoài về thăm thân, làm việc trong nước, trong tỉnh
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'ngHgVeNuocs.store']) !!}

                        @include('ng_hg_ve_nuocs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
