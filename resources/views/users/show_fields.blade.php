<div class="col-md-6">
    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Tên:') !!}
        <p>{{ $user->name }}</p>
    </div>
</div>
<div class="col-md-6">
    <!-- Email Field -->
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        <p>{{ $user->email }}</p>
    </div>
</div>
<div class="col-md-12">
    <a href="{{ route('users.edit', ['user' => $user->id ]) }}" class="btn btn-primary">Đặt lại mật khẩu</a>
</div>

