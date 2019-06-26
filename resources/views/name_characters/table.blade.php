<table class="table table-responsive" id="nameCharacters-table">
    <thead>
        <tr>
            <th>Name Id</th>
        <th>Character</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($nameCharacters as $nameCharacter)
        <tr>
            <td>{!! $nameCharacter->name_id !!}</td>
            <td>{!! $nameCharacter->character !!}</td>
            <td>
                {!! Form::open(['route' => ['nameCharacters.destroy', $nameCharacter->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('nameCharacters.show', [$nameCharacter->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('nameCharacters.edit', [$nameCharacter->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>