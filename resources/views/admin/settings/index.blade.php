@extends('layouts.app')


@section('content')
<section class="content pdall0-xs pt10-xs">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li>
                <a href="javascript:;">
                    <span style="font-weight: bold;">通用设置</span>
                </a>
            </li>
            <li class="active">
                <a href="#tab_1" data-toggle="tab">网站设置</a>
            </li>
            
            <li>
                <a href="#tab_8" data-toggle="tab">其他设置</a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="box box-info form">
                    <!-- form start -->
                    <div class="box-body">
                        <form class="form-horizontal" id="form1">
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">网站名称</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" maxlength="60" placeholder="网站名称" value="{{ getSettingValueByKey('name') }}"></div>
                            </div>

                         {{--    <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">网站英文名称</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="english_name" maxlength="60" placeholder="网站英文名称" value="{{ getSettingValueByKey('english_name') }}"></div>
                            </div> --}}
                              <div class="form-group">
                                <label for="weixin" class="col-sm-3 control-label">系统性格选项(多个使用回车换行)</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control"  id="character_all" name="character_all" placeholder="项目金额选项(多个使用回车换行，一行一个选项)" rows="{!! count(characterAll()) !!}">{!! getSettingValueByKey('character_all') !!}</textarea>
                                    <p class="help-block">多个使用回车换行，一行一个选项</p>
                                </div>
                            </div>


                             <div class="form-group">
                                <label for="name_price" class="col-sm-3 control-label">定制名字费用</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name_price" maxlength="60" placeholder="定制名字费用" value="{{ getSettingValueByKey('name_price') }}"></div>
                            </div>

                       {{--      <div class="form-group">
                                <label for="icp" class="col-sm-3 control-label">热门推荐</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="hot_tuijian" maxlength="60" placeholder="热门推荐" value="{{ getSettingValueByKey('hot_tuijian') }}">
                                </div>
                            </div> --}}

                            <div class="form-group">
                                <label for="logo" class="col-sm-3 control-label">网站LOGO</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="image1" name="logo" placeholder="网站LOGO" value="{{ getSettingValueByKey('logo') }}">
                                    <div class="input-append">
                                        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image1')">选择图片</a>
                                        <img src="@if(getSettingValueByKey('logo')) {{ getSettingValueByKey('logo') }} @endif" style="max-width: 100%; max-height: 150px; display: block;"></div>
                                    <p class="help-block">默认网站首页LOGO,通用头部显示，最佳显示尺寸为240*60像素</p>
                                </div>
                            </div>
                            <!--
                            <div class="form-group">
                                <label for="seo_title" class="col-sm-3 control-label">网站标题</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="seo_title" maxlength="60" placeholder="网站标题" value="{{ getSettingValueByKey('seo_title') }}"></div>
                            </div>-->
                            <div class="form-group">
                                <label for="seo_des" class="col-sm-3 control-label">网站描述</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="seo_des" maxlength="60" placeholder="网站描述" value="{{ getSettingValueByKey('seo_des') }}"></div>
                            </div>
                            <div class="form-group">
                                <label for="seo_keywords" class="col-sm-3 control-label">网站关键字</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="seo_keywords" maxlength="60" placeholder="网站关键字" value="{{ getSettingValueByKey('seo_keywords') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="service_tel" class="col-sm-3 control-label">服务电话</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="service_tel" maxlength="60" placeholder="服务电话" value="{{ getSettingValueByKey('service_tel') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">邮箱</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" maxlength="60" placeholder="邮箱" value="{{ getSettingValueByKey('email') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="mobile" class="col-sm-3 control-label">手机号</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="mobile" maxlength="60" placeholder="手机号" value="{{ getSettingValueByKey('mobile') }}"></div>
                            </div>

                     {{--       <div class="form-group">
                                <label for="weixin_erweima" class="col-sm-3 control-label">客服微信</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="image2" name="weixin_erweima" placeholder="微信公众号二维码" value="{{ getSettingValueByKey('weixin_erweima') }}">
                                    <div class="input-append">
                                        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image2')">选择图片</a>
                                        <img src="@if(getSettingValueByKey('weixin_erweima')) {{ getSettingValueByKey('weixin_erweima') }} @endif" style="max-width: 100%; max-height: 150px; display: block;"></div>
                                </div>
                            </div> --}}

                       {{--      <div class="form-group">
                                <label for="contact_man" class="col-sm-3 control-label">联系人</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="contact_man" maxlength="60" placeholder="联系人" value="{{ getSettingValueByKey('contact_man') }}"></div>
                            </div> --}}

                        {{--     <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">邮箱</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" maxlength="60" placeholder="邮箱" value="{{ getSettingValueByKey('email') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="web_address" class="col-sm-3 control-label">网址</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="web_address" maxlength="60" placeholder="网址" value="{{ getSettingValueByKey('web_address') }}"></div>
                            </div> --}}



                            <!--
                            <div class="form-group">
                                <label for="weixin" class="col-sm-3 control-label">微信公众号</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="image2" name="weixin" placeholder="微信公众号二维码" value="{{ getSettingValueByKey('weixin') }}">
                                    <div class="input-append">
                                        <a data-toggle="modal" href="javascript:;" data-target="#myModal" class="btn" type="button" onclick="changeImageId('image2')">选择图片</a>
                                        <img src="@if(getSettingValueByKey('weixin')) {{ getSettingValueByKey('weixin') }} @endif" style="max-width: 100%; max-height: 150px; display: block;"></div>
                                </div>
                            </div>
                              <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">微信</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="weixin" placeholder="微信" value="{{ getSettingValueByKey('weixin') }}"></div>
                            </div>
                            -->

                   {{--          <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">QQ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="qq" placeholder="qq" value="{{ getSettingValueByKey('qq') }}"></div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-sm-3 control-label">地址</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"  name="address" placeholder="地址" value="{{ getSettingValueByKey('address') }}">
                                    <a class="inline-block pd10" onclick="openMap('address')">在地图中设定</a>
                                </div>
                            </div> --}}

                        </form>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-left" onclick="saveForm(1)">保存</button>
                    </div>
                    <!-- /.box-footer --> </div>
            </div>

            <!-- /.tab-pane -->

            <div class="tab-pane" id="tab_8">
                <div class="box box-info form">
                    <!-- form start -->
                    <div class="box-body">
                        <form class="form-horizontal" id="form8">
                              
                            <div class="form-group">
                                <label for="feie_sn" class="col-sm-3 control-label">后台每页显示记录数量</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="records_per_page" value="{{ getSettingValueByKey('records_per_page') }}"></div>
                            </div>

                          

                      {{--       <div class="form-group">
                                <label for="feie_sn" class="col-sm-3 control-label">前端列表每页显示数量</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="front_take" value="{{ getSettingValueByKey('front_take') }}"></div>
                            </div> --}}

                        </form>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-left" onclick="saveForm(8)">保存</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.tab-content --> </div>
</section>
@endsection

@include('admin.partial.imagemodel')

@section('scripts')
<script>
        function saveForm(index){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"/zcjy/settings/setting",
                type:"POST",
                data:$("#form"+index).serialize(),
                success: function(data) {
                  if (data.code == 0) {
                    layer.msg(data.message, {icon: 1});
                  }else{
                    layer.msg(data.message, {icon: 5});
                  }
                },
                error: function(data) {
                  //提示失败消息

                },
            });  
        }

       function openMap(type=''){
            var name =type==''?'detail':'address';
            var address=$('input[name='+name+']').val();
            var url="/zcjy/settings/map?address="+address;
                if($(window).width()<479){
                        layer.open({
                            type: 2,
                            title:'请选择详细地址',
                            shadeClose: true,
                            shade: 0.8,
                            area: ['100%', '100%'],
                            content: url, 
                        });
                }else{
                     layer.open({
                        type: 2,
                        title:'请选择详细地址',
                        shadeClose: true,
                        shade: 0.8,
                        area:['60%', '680px'],
                        content: url, 
                    });
                }
        }

        function call_back_by_map(address,jindu,weidu){
            $('input[name=detail],input[name=address]').val(address);
            $('input[name=lat]').val(weidu);
            $('input[name=lon]').val(jindu);
            layer.closeAll();
        }

      $('#character_all').keypress(function(e) {  
            var rows=parseInt($(this).attr('rows'));
            // 回车键事件  
           if(e.which == 13) {  
                rows +=1;
           }  
           $(this).attr('rows',rows);
      }); 
    </script>
@endsection