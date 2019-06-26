@extends('front.partial.base')

@section('css')
	<link href="https://cdn.bootcss.com/animate.css/3.0.0/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
	<style>
		.pay{
			padding:66px 0;
			border-bottom: 1px solid #dcdcdc;
		}
		.pay .price{
			position:relative;
			padding-left: 150px;
		}
		.pay .price .title{
			position:absolute;
			left:0;
			top:20px;
			font-size:22px;
		}
		.price-item{
			width:290px;
			padding:0 44px;
			border:3px solid #fe70af;
			border-radius: 9px;
			position:relative;
		}
		.price-item p.cost{
			font-size:18px;
			line-height: 42px;
			text-align: center;
			border-bottom:1px solid #dcdcdc;
		}
		.price-item p.des{
			text-align: center;
			font-size:16px;
			line-height: 28px;
			padding:6px 0;
		}
		.gou{
			position:absolute;
			top:-3px;
			left:-3px;
		}
		.payment{
			padding:60px 15px;
		}
		.payment .payWay{
			position:relative;
			padding-left: 150px;
		}
		.payment .payWay .title{
			position:absolute;
			left:0;
			top:20px;
			font-size:22px;
		}
		.payment .payWay .way-item{
			width:290px;
			display: inline-block;
			height:110px;
			line-height: 110px;
			border:1px solid #76b2f5;
			border-radius: 9px;
			position:relative;
			margin-right: 75px;
			vertical-align: top;
		}
		.payment .payWay .way-item.active{
			border:3px solid #fe70af;
			background: url("{{asset('images/gou.png')}}") no-repeat -3px -3px;
		}
		.payment .payWay .way-item .img-box{
			text-align: center;
		}
		.popup{
			padding-top: 66px;
			padding-bottom: 100px;
			text-align: center;
		}
		.popup p{
			font-size: 22px;
			margin-top: 30px;
		}
		.popup p:last-child{
			margin-top: 20px;
			font-size:18px;
		}
		.erweima{
			position:fixed;
			top:50%;
			left:50%;
			-webkit-transform: translate(-50%,-50%);
			-moz-transform: translate(-50%,-50%);
			-ms-transform: translate(-50%,-50%);
			-o-transform: translate(-50%,-50%);
			z-index:10000;
		}
		.zhezhao{
		  position:fixed;
		  top:0;
		  right:0;
		  bottom:0;
		  left:0;
		  background-color: rgba(0, 0, 0, .65);
		  z-index: 9999;
		}
		@media (max-width: 767px){
			.pay{
				padding:45px 0;
			}
			.pay .price{
				width:100%;
				padding:0 15px;
			}
			.pay .price .title{
				position:static;
				margin-bottom: 20px;
			}
			.price-item{
				margin:0 auto;
			}
			.payment{
				padding:45px 0;
			}
			.payment .payWay{
				width:100%;
				padding:0 15px;
			}
			.payment .payWay .title{
				position:static;
				margin-bottom: 20px;
			}
			.payment .payWay .way-item{
				display: block;
				margin:0 auto;
				margin-bottom: 30px;
			}
		}
	</style>
@endsection

@section('content')
	<header>
		<nav>
			<div class="logo-top hidden-xs">
				<p class="first">英文取名网</p>
				<div>
					<p>CUSTOMZATION</p>
					<p>YOUR EXCLUSIVE ENGLISH NAME</p>
				</div>
				<!-- <div class="visible-xs">
					<p>CUSTOMZATION YOUR EXCLUSIVE ENGLISH NAME</p>
				</div> -->
			</div>
			<div class="logo-bottom">
				<!-- <img src="images/logo.png" alt="" class="img-responsive"> -->
				<p>英文取名·<span style="color:#76b2f5;">专业定制</span></p>
			</div>
		</nav>
		<div class="banner container-fluid">
			<div class="row">
				<div class="col-xs-6">
					<div class="label-boy" >
						<div class="label-box">
							<span>男孩英文取名</span>
						</div>
					</div>
					<div class="boy">
						<img src="images/boy.png" alt="" class="img-responsive">
						<a href="javascript:;" class="change" data-sex="boy">
							<img src="images/start1.png" alt="" class="img-responsive" >
						</a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="label-girl">
						<div class="label-box">
							<span>女孩英文取名</span>
						</div>
					</div>
					<div class="girl">
						<img src="images/girl.png" alt="" class="img-responsive">
						<a href="javascript:;" class="change" data-sex="girl">
							<img src="images/start2.png" alt="" class="img-responsive">
						</a>
					</div>
				</div>
			</div>
			<div class="shark hidden-xs">
				<img src="{{asset('images/shark1.png')}}" alt="">
			</div>
		</div>
	</header>
	<div class="character-select container-fluid" style="display: none">
		<div class="title">
			<p>请选择<span style="color:#76b2f5;">5个</span>性格特点</p>
			<div class="line"></div>
		</div>
		<div class="character-list">
			<?php $characters = characterAll();?>
			<ul>
				@foreach ($characters as $item)
				<li>{!! $item !!}</li>
				@endforeach
			</ul>
		</div>
	</div>
	<form class="form-inline"  style="display: none">
		<div class="container-fluid">
			<div class="col-sm-6">
			  	<div class="form-group">
				    <label for="yourName"><span style="color:#ff1e1e;margin-right: 5px;">*</span>请填写姓名:</label>
				    <input type="text" name="name" class="form-control" id="yourName" placeholder="">
				</div>
			</div>
			<div class="col-sm-6 ">
				<div class="form-group right">
				    <label for="yourEmail"><span style="color:#ff1e1e;margin-right: 5px;">*</span>电子邮箱</label>
				    <input type="email" name="email" class="form-control" id="yourEmail" placeholder="">
				</div>
			</div>
		</div>
		<div class="btn-box">
	  		<button id="submit_info" class="btn1 btn-default">提交</button>
	  		<button id="a-return" class="btn0 btn-default">返回</button>
	  	</div>
	  	
	</form>
	<div class="pay container-fluid" style="display: none">
		<div class="price">
			<div class="title"><span style="color:#ff1e1e;margin-right: 5px;">*</span>套餐价格:</div>
			<div class="price-item">
				<p class="cost">特惠价:{!! getSettingValueByKey('name_price') !!}元</p>
				<p class="des">4折，我们的专家将为您定制5个英文名字</p>
				<img src="{{asset('images/gou.png')}}" alt="" class="gou">
			</div>
		</div>
	</div>
	<div class="payment container-fluid" style="display: none">
		<div class="payWay">
			<div class="title"><span style="color:#ff1e1e;margin-right: 5px;">*</span>支付方式:</div>	
			<div class="way-item">
				<div class="img-box">
					<img src="{{asset('images/zhifubao.png')}}" alt="">
				</div>
				<!-- <img src="{{asset('images/gou.png')}}" alt="" class="gou"> -->
			</div>
			<div class="way-item">
				<div class="img-box" id="show-erweima">
					<img src="{{asset('images/weixin.png')}}" alt="">
				</div>
			</div>

		</div>	
		<div class="btn-box">
	  		<button id="pay_success" class="btn1 btn-default">提交</button>
	  		<button id="pay-return" class="btn0 btn-default">返回</button>
	  	</div>
	  	<div class="erweima" style="display: none;padding:0 30px;background-color: #fff;text-align: center;">
	  		<h3 style="padding:15px 0;font-size: 18px;">微信支付</h3>
  			<img src="{{asset('images/erweima.png')}}" alt="">
  			<p style="padding:10px 0;font-size: 14px;">请用微信扫一扫二维码支付</p>
  		</div>
  		<div class="zhezhao" style="display: none;"></div>
	</div>
	<div class="popup container-fluid" style="display: none">
		<div class="success">
			<img src="{{asset('images/laugh.png')}}" alt="">
		</div>
		<p>支付成功!</p>
		<p>尊敬的顾客，我们的专家将尽快为您定制英文名字，两天内发您邮箱。</p>
		<div class="btn-box">
	  		<a href="/" class="btn0 btn-default" style="margin-left: 0;">返回</a>
	  	</div>
	</div>
	<div class="ditu" style="overflow: hidden; display: none">
		<img src="{{asset('images/ditu.jpg')}}" alt="" class="img-responsive">
	</div>
	<main>
		@if(!empty($one))
		<div class="adver container-fluid">
			<h3>
				{!! $one->name !!}
				<p class="hidden-xs">{!! $one->seo_title !!}</p>
			</h3>
			<img src="{!! $one->image !!}" alt="" class="img-responsive hidden-xs">
			<img src="images/adver_xs.jpg" alt="" class="img-responsive visible-xs">
		</div>
		@endif

		@if(!empty($two))
		<div class="intro">
			<div class="container-fluid">
				<div class="title">
					<p>{!! $two->name !!}</p>
					<div class="line"></div>
				</div>
				<div class="media">
					<div class="media-left">
						<p> {!! $two->seo_des !!}</p>
					</div>
					<div class="media-body hidden-xs">
						<img src="{!! $two->image !!}" alt="" >
					</div>
					<div class="media-body visible-xs">
						<img src="images/intro.jpg" alt="" class="img-responsive">
					</div>
				</div>
			</div>
		</div>
		@endif

		@if(!empty($three))
		<div class="important container-fluid" >
			<div class="media">
				<div class="media-left hidden-xs">
					<img src="{!! $three->image !!}" alt="{!! $three->image !!}">
				</div>
				<div class="media-body">
					<h3>
						{!! $three->name !!}
						<p>{!! $three->seo_title !!}</p>
						<!-- <img src="images/title3.jpg" alt="" class="img-responsive"> -->
					</h3>
					<div>
						<p>{!! $three->seo_des !!}</p>
					</div>
				</div>
			</div>	
		</div>
		@endif
	</main>

	@if(!empty($four))
	<footer>
		<div class="footer container-fluid">
			<h3>
				{!! $four->name !!}
				<div class="line"></div>
			</h3>
			<div class="footing">
				<p>{!! $four->seo_des !!}</p>
			</div>
			<div class="shark hidden-xs">
				<img src="{!! $four->image !!}" alt="">
			</div>
			<div class="contact-way">
				<p>
					@if(getSettingValueByKey('service_tel'))
					<span>服务电话：<a href="tel:{{ getSettingValueByKey('service_tel') }}">{{ getSettingValueByKey('service_tel') }}</a></span>
					@endif
					@if(getSettingValueByKey('email'))
					<span>邮箱：{{ getSettingValueByKey('email') }}</span>
					@endif
					<span style="margin-left: 30px;">链接到：
						<a href="http://www.yingwenquming.com/" >http://www.yingwenquming.com/</a>
					</span>
				</p>
			</div>
		</div>
		<a class="mobile_a" href="#" style="display: none;"><span class="mobile_click">.</span></a>
	</footer>
	@endif
@endsection


@section('js')
	<script>
		var log_id;
		var weixin;
		$(function(){
			@if(array_key_exists('success', $input) && $input['success'] == 'ok')
					window.opener=null;
					window.close();
			@endif
			var sex;
			$('.character-list').find('li').click(function(e) {
				if($('.character-list li.choose').length==5 && $(this).hasClass('choose')){
					$(this).removeClass('choose');
					return;
				}
				if($('.character-list li.choose').length<5){
					$(this).toggleClass('choose');
				};
			});
			
			$('.change').click(function(e) {
				sex=$(this).data('sex');
				$('header').css('background-image', 'url(../images/top.png)');
				$('.banner,main,.contact-way').hide();
				$('.character-select,form').show();
			});
			$('#a-return').click(function(e) {
				e.preventDefault();
				$('header').css('background-image', 'url(../images/top.png)');
				$('.character-select,form').hide();
				$('.banner,main').show();
			});
			$('#submit_info').click(function(e) {
				console.log(sex);
				e.preventDefault();
				var name=$('input[name=name]').val();
				var email=$('input[name=email]').val();
				var submit_data='';
				if($('.choose').length<5){
					alert('性格需要选取5个！');
					return false;
				}else{
					$('.choose').each(function(index, el) {
						if(index<4){
							submit_data+=($(this).html()+',');
						}else{
							submit_data+=$(this).html();
						}
					});
					console.log(submit_data);
				}
				var reg = new RegExp("^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$");
				if(name=='' || name==null){
					alert('请填写您的姓名！');
			        return false;
				}
				if(email=='' || email==null){
					alert('请填写您的邮箱！');
			        return false;
				}
				if(!reg.test(email)){
					alert('邮箱格式有误');
					return false;
				}
				$.ajaxSetup({
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            }
		        });
		        $.ajax({
		            url:'/api/submit_data',
		            type:"POST",
		            data:{name:name,email:email,submit_sex:sex,submit_data},
		            success: function(data) {
		            	console.log(data);
		            	if (data.code==0){
		            		log_id = data.message;
		            		console.log(data.message);
		            		$("form input").val("");
		            		$('.choose').each(function(){
		            			$(this).removeClass('choose')
		            		});
							$('.character-select,form').hide();
							$('.pay,.payment,.tidu').show();
							//
							$.ajaxSetup({
					            headers: {
					                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					            }
					        });
						    $.ajax({
				            url:'/wechat/pay/'+log_id,
				            type:"GET",
				            data:{},
				            success: function(data) {
				            	if(data){
				            		weixin = data.result;
				            		$('.erweima').find('img').attr('src',data.image);
				            	}
				            }
				        	});

		            	}
		            }
		        })
			});
		})
	</script>
	<script>
        $(function () {
            /**通用-banner大图自定义缩放**/
            var zoomWidth = 992; //缩放阀值992px, 即所有小于992px的视口都会对原图进行缩放, 只是缩放比例不同
            var maxWidth = 1920; //最大宽度1920px
            var ratio = 1; //缩放比例
            var viewWidth = window.innerWidth; // 视口宽度
            var zoomSlider = function () {
                if (viewWidth < 768) { //当视口小于768时(移动端), 按992比例缩放
                    ratio = viewWidth / zoomWidth; //视口宽度除以阀值, 计算缩放比例
                } else if (viewWidth < zoomWidth) { //当视口界于768与992之间时, bootstrap主宽度为750, 这区间图片缩放比例固定.
                    ratio = zoomWidth / (zoomWidth + (zoomWidth - 750));
                } else { // PC端不缩放
                    ratio = 1;
                }
                var width = maxWidth * ratio; //缩放宽度
                $(".ditu img").each(function () {
                    $(this).css({
                        "width": width,
                        "max-width": width,
                        "margin-left": -(width - viewWidth) / 2
                    }); //图片自适应居中, 图片宽度与视口宽度差除以2的值, 设置为负margin
                });
            }
            zoomSlider(); //页面加载时初始化并检查一次.
            /**视口发生变化时的事件**/
            $(window).resize(function () {
                viewWidth = window.innerWidth; // 重置视口宽度
                zoomSlider();//判断是否绽放banner
            });
            $('.way-item').click(function(e) {
            	$('.way-item').removeClass('active');
				$(this).toggleClass('active');
			});
			$('#pay-return').click(function(e) {
				e.preventDefault();
				$('.pay,.payment').hide();
				$('.character-select,form').show();
			});
			$('#pay_success').click(function(e) {
				e.preventDefault();
				//$('.pay,.payment').hide();
				//$('.popup').show();
				var index = 0;
				$('.way-item').each(function(){
					if($(this).hasClass('active')){
						index = $(this).index();
					}
				});
				if(!index){
					alert('请选择支付方式!');
					return false;
				}
				startPayNotify();
				if(index == 1){
					window.open("/alipay/pay/"+log_id);
				}
				else{
					if($(window).width()<=479){
						$('.mobile_a').attr('href','/wechat/pay_web/'+log_id);
						$('.mobile_click').click();
						return;
					}
					$('.erweima').show();
					$('.zhezhao').show();
				}
			});
			$('#index-return').click(function(e) {
				
			});
			$('.zhezhao').click(function(){
				$(this).hide();
				$('.erweima').hide();
			})
        });
		
		//打开支付提示
		function openPayNotify(){
			$('.pay,.payment,.tidu').hide();
			$('.popup').show();
		}
		var timer;
		function startPayNotify(){
			timer = setInterval(function(){
 				$.ajaxSetup({
		            headers: {
		                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		            }
		        });
		        $.ajax({
		            url:'/varify/'+log_id,
		            type:"GET",
		            data:{},
		            success: function(data) {
		            	console.log(data);
		            	if (data.code==0){
	            			openPayNotify();
	            			window.clearInterval(timer);
		            	}
		            }
		        })
			},3000);
		}
	</script>
@endsection
