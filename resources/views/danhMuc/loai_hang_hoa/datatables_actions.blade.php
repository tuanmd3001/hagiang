{!! Form::open(['route' => ['danhMuc.loaiHangHoa.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('danhMuc.loaiHangHoa.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('danhMuc.loaiHangHoa.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Chắc chắn xóa?')"
    ]) !!}
</div>
{!! Form::close() !!}
