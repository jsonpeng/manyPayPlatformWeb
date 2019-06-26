<table class="table table-responsive" id="submitLogs-table">
    <thead>
        <tr>
        <th>提交人姓名</th>
        <th>邮箱</th>
        <th>性别</th>
        <th>提交性格</th>
        <th>支付状态</th>
        <th>支付平台</th>
        <th>支付金额</th>
        <th>提交时间</th>
{{--         <th>系统推荐姓名</th> --}}
            <th colspan="3">操作</th>
        </tr>
    </thead>
    <tbody>
    @foreach($submitLogs as $submitLog)
        <tr>
            <td>{!! $submitLog->name !!}</td>
            <td>{!! $submitLog->email !!}</td>
            <td>{!! $submitLog->submit_sex !!}</td>
            <td>{!! $submitLog->submit_data !!}</td>
            <td>{!! $submitLog->pay_status !!}</td>
            <td>{!! $submitLog->pay_platform!!}</td>
            <td>{!! $submitLog->price !!}</td>
            <td>{!! $submitLog->created_at !!}</td>
            {{-- <td>{!! $submitLog->rec_name !!}</td> --}}
            <td>
                {!! Form::open(['route' => ['submitLogs.destroy', $submitLog->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="mailto:{!! $submitLog->email !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i>发送邮件</a>
                   {{--  <a href="{!! route('submitLogs.show', [$submitLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('submitLogs.edit', [$submitLog->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('确定删除吗?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>