<div class="form-group col-md-6">
    <label>
        Vai trò
    </label>
    @foreach($user->roles()->get() as $role)
        <div>
            <div class="label label-primary">{{$role->name}}</div>
        </div>
    @endforeach
</div>
<div class="form-group col-md-6">
    <label>
        Quyền
    </label>
    @foreach($user->permissions()->get() as $permission)
        <div>
            <div class="label label-primary">{{$permission->name}}</div>
        </div>
    @endforeach
</div>
