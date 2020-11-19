{!! Form::open(['route' => [\App\Models\LopDaoTao::ROUTE_NAME[$type] . '.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route(\App\Models\LopDaoTao::ROUTE_NAME[$type] . '.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route(\App\Models\LopDaoTao::ROUTE_NAME[$type] . '.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
