@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">提交记录</h1>
        <a href="javascript:$.zcjyFrameOpen('/zcjy/frame_logs','批量删除');" style="margin-top: 5px;margin-left:5px;display: inline-block;">批量删除</a>
     {{--    <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('submitLogs.create') !!}">Add New</a>
        </h1> --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>
            <div class="clearfix"></div>
                       <div class="box box-default box-solid mb10-xs {!! !$tools?'collapsed-box':'' !!}">
                        <div class="box-header with-border">
                          <h3 class="box-title">查询</h3>
                          <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-{!! !$tools?'plus':'minus' !!}"></i></button>
                          </div><!-- /.box-tools -->
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form id="order_search">

                                <div class="form-group col-md-2 col-sm-6 col-xs-6">
                                    <label for="order_delivery">姓名</label>
                                   <input type="text" class="form-control" name="name" placeholder="名称" @if (array_key_exists('name', $input))value="{{$input['name']}}"@endif>
                                </div>
                    
                        
                                <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                    <label for="shelf">提交时间</label>
                                     <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" class="form-control" name="start_time" id="datetimepicker_begin" placeholder="起" @if (array_key_exists('start_time', $input))value="{{$input['start_time']}}"@endif>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <input type="text" class="form-control" name="end_time" id="datetimepicker_end" placeholder="止" @if (array_key_exists('end_time', $input))value="{{$input['end_time']}}"@endif>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-1 hidden-sm hidden-xs" style="padding-top: 25px;">
                                    <button type="submit" class="btn btn-primary pull-right" onclick="search()">查询</button>
                                </div>

                                 <div class="form-group col-md-1 visible-xs visible-sm">
                                    <button type="submit" class="btn btn-primary pull-left" onclick="search()">查询</button>
                                </div>

                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('submit_logs.table')
            </div>
        </div>
        <div class="text-center">{!! $submitLogs->appends($input)->links() !!}</div>
    </div>

    {!! Form::open(['route' => ['submitLogs.manydels'], 'method' => 'post','id'=>'select_form']) !!}
        <input type="hidden" name="attr_arr" value="" />
    {!! Form::close() !!}

@endsection

@section('scripts')
<script type="text/javascript">
       $('#datetimepicker_begin').datepicker({
                format: "yyyy-mm-dd",
                language: "zh-CN",
                todayHighlight: true
            });
        $('#datetimepicker_end').datepicker({
            format: "yyyy-mm-dd",
            language: "zh-CN",
            todayHighlight: true
        });
        function call_back_by_action(arr){
            layer.closeAll();
            $('input[name=attr_arr]').val(arr);
            $('#select_form').submit();
        }
</script>
@endsection