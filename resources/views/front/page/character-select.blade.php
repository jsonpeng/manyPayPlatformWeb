@extends('front.partial.base')

@section('css')
	<style>
		@font-face{
			font-family:'mutouren';
			src:url('{{asset('fonts/HYZhuZiMuTouRenW.ttf')}}');
		}
		header{
			background:url('images/head_bg.jpg') no-repeat center center;
			background-size:cover;
		}
		nav{
			margin:0 190px;
			padding:48px 0;
		}
		.logo-top{
			overflow: hidden;
		}
		.logo-top p.first{
			font-size:26px;
			line-height: 38px;
			float:left;
			padding-right:12px;
			margin-right: 14px;
			position:relative;
		}
		.logo-top .first:after{
			content:'';
			position:absolute;
			right:0;
			top:50%;
			width:2px;
			height:22px;
			background-color: #222;
			transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			-moz-transform: translateY(-50%);
			-webkit-transform: translateY(-50%);
			-o-transform: translateY(-50%);
		}
		.logo-top div{
			font-size:12px;
			float:left;
			line-height: 19px;
		}
	</style>
@endsection

@include('front.page.seo')

@section('content')
		<nav>
			<div class="logo-top">
				<p class="first">您的专属英文名字</p>
				<div class="hidden-xs">
					<p>CUSTOMZATION</p>
					<p>YOUR EXCLUSIVE ENGLISH NAME</p>
				</div>
				<div class="visible-xs">
					<p>CUSTOMZATION YOUR EXCLUSIVE ENGLISH NAME</p>
				</div>
			</div>
			<div class="logo-bottom">
				<img src="images/logo.png" alt="" class="img-responsive">
			</div>
		</nav>
@endsection