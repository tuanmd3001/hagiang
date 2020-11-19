@if ($user->username !== 'admin')
    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
    <div class='btn-group'>
        <a href="{{ route('users.show', $user->id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
        <a href="{{ route('users.edit', $user->id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirm('Are you sure?')"
        ]) !!}
    </div>
    {!! Form::close() !!}
@endif
