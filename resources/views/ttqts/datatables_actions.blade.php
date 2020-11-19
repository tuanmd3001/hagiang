{!! Form::open(['route' => [\App\Models\Ttqt::ROUTE_NAME[$danh_nghia_ky] . '.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route(\App\Models\Ttqt::ROUTE_NAME[$danh_nghia_ky] . '.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route(\App\Models\Ttqt::ROUTE_NAME[$danh_nghia_ky] . '.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
