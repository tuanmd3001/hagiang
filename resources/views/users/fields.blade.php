
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-tag"></i> Thông tin cơ bản</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <!-- Name Field -->
                <div class="form-group">
                    {!! Form::label('name', 'Tên:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
                </div>
            </div>
            <div class="col-md-6">
                <!-- Name Field -->
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class' => 'form-control','maxlength' => 191,'maxlength' => 191]) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-tag"></i> Thông tin vai trò và quyền</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label for="role_select">
                    Vai trò
                </label>
                <select id="role_select" class="form-control select2-multiple" name="roles[]" multiple="multiple">
                    @foreach($roles as $role)
                        <option @if (isset($user) && $user->hasrole($role->name)) selected @endif value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">
                <label>
                    Quyền
                </label>
                @foreach($permissions as $permission)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permissions[]">
                            {{$permission->name}}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2-multiple').select2();
        });
    </script>
@endpush
<!-- Submit Field -->
<div class="form-group row">
    <div class="col-sm-12">
        {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('users.index') }}" class="btn btn-default">Quay lại</a>
    </div>
</div>
