@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Chi tiết người dùng
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-tag"></i> Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('users.show_fields')
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-tag"></i> Thông tin vai trò và quyền</h3>
            </div>
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('users.show_roles')
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('users.edit', ['user' => $user->id ]) }}" class="btn btn-primary">Sửa thông tin</a>
            <a href="{{ route('users.index') }}" class="btn btn-default">Quay lại</a>
        </div>
    </div>
@endsection
