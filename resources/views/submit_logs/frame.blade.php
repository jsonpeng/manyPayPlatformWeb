<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ getSettingValueByKeyCache('name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css">

    
    <link rel="stylesheet" href="{{ asset('vendor/adminLTE/css/AdminLTE.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/skins/_all-skins.min.css"-->

    <!-- Ionicons -->
    <style type="text/css">
        .trSelected{
            background-color:#367fa9;
            color:white;
        }
        .box-body{
            padding: 0;
        }
    </style>
    @yield('css')
</head>

<body class="skin-blue sidebar-mini">
    <style type="text/css">
        body{max-width: 1500px; margin: 0 auto;}
    </style>

     <section class="content-header">
        <h1 class="pull-left">批量删除记录</h1>
   
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                 @if(count($submitLogs))
                 <a class="select_all">全选</a>
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
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($submitLogs as $submitLog)
                            <tr data-id="{!! $submitLog->id !!}">
                                <td>{!! $submitLog->name !!}</td>
                                <td>{!! $submitLog->email !!}</td>
                                <td>{!! $submitLog->submit_sex !!}</td>
                                <td>{!! $submitLog->submit_data !!}</td>
                                <td>{!! $submitLog->pay_status !!}</td>
                                <td>{!! $submitLog->pay_platform!!}</td>
                                <td>{!! $submitLog->price !!}</td>
                                <td>{!! $submitLog->created_at !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                <h1 class="text-center">这里空空如也...</h1>
                @endif
            </div>
         
             <div class="pull-left" style="margin-top:15px;">
                 <input type="button" class="btn btn-primary"  value="批量删除" id="del">
             </div>
         
        </div>
        <div class="text-center">
            {!! $submitLogs->appends('')->links() !!}
        </div>
    </div>
 

    <!-- jQuery 2.1.4 -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/adminLTE/js/app.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/layer/layer.js') }}"></script>
    <script type="text/javascript">
        $('.select_all').click(function(){
            $('tbody > tr').toggleClass('trSelected');
        });
        //选择
        $('tr').click(function(){
           $(this).toggleClass('trSelected');
        });;
        //恢复 删除点击后
        $('#del').click(function(){
            var action = actionFunc();
            if(action){
                javascript:window.parent.call_back_by_action(action);
            }
        });

        function actionFunc(){
                 var topic_arr=[];
                 var selected=$('tr').hasClass('trSelected');
                    if(!selected){
                       layer.alert('请选择', {icon: 2}); 
                       return false;
                    }
                    $('tr').each(function(){
                        if($(this).hasClass('trSelected')){
                           topic_arr.push($(this).data('id'));
                           console.log(topic_arr);
                        }
                        else{
                            $(this).remove();
                        }
                    });
                    return topic_arr;
        }
    </script>
</body>
</html>