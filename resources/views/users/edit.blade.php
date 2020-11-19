@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật người dùng
        </h1>
    </section>
    <div class="content">
{{--        @include('adminlte-templates::common.errors')--}}

        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

        @include('users.fields')

        {!! Form::close() !!}
    </div>
@endsection
