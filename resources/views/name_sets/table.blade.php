<table class="table table-responsive" id="nameSets-table">
    <thead>
        <tr>
        <th>名称</th>
        <th>使用次数</th>
        <th>类型</th>
        <th>对应性格</th>
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($nameSets as $nameSet)
        <?php $characters = $nameSet->characters()->get();?>
        <tr>
            <td>{!! $nameSet->name !!}</td>
            <td>{!! $nameSet->use_time !!}</td>
            <td>{!! $nameSet->type !!}</td>
            <td>@foreach ($characters as $item)
                <span style="color: orange;">{!! $item->character !!}</span>&nbsp;&nbsp;
                @endforeach 
            </td>
            <td>
                {!! Form::open(['route' => ['nameSets.destroy', $nameSet->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                  {{--   <a href="{!! route('nameSets.show', [$nameSet->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                  {{--   <a href="{!! route('nameSets.edit', [$nameSet->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定要删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>