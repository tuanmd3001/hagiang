{!! Form::open(['route' => [\App\Models\DoanVao::ROUTE_NAME[$level].'.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route(\App\Models\DoanVao::ROUTE_NAME[$level].'.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route(\App\Models\DoanVao::ROUTE_NAME[$level].'.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Chắc chắn xóa?')"
    ]) !!}
</div>
{!! Form::close() !!}
