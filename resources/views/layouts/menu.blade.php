<li class="treeview {{ Request::is('users*') | Request::is('roles*') | Request::is('permissions*') ? 'active' : '' }}">
    <a href="#"><i class="fa fa-cogs"></i> <span>Quản trị hệ thống</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i>
                <span>Quản lý người dùng</span>
            </a>
        </li>
        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{{ route('roles.index') }}"><i class="fa fa-users"></i>
                <span>Quản lý vai trò người dùng</span>
            </a>
        </li>

        <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{{ route('permissions.index') }}"><i class="fa fa-terminal"></i>
                <span>Quản lý chức năng</span>
            </a>
        </li>
    </ul>
</li>

