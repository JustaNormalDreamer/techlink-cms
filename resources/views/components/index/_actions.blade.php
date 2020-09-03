<td>
    <a href="{{ route("cms.{$type}.edit", $model->id) }}" class="btn btn-info">Edit</a>
</td>
<td>
    {!! Form::model($model, ['route' => ["cms.{$type}.destroy", $model->id]]) !!}
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Delete</button>
    {!! Form::close() !!}
</td>
