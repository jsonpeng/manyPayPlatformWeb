@extends('front.partial.base')

@section('css')
	<style type="text/css">
		.media-content{
			width:100%;
		}
	</style>
@endsection

@include('front.post.seo')

@section('content')
	<div class="media-content">
		<div class="media">
			<div class="media-left">
				<img src="{{ $post->image }}" alt="" class="media-object">
			</div>
			<div class="media-body">
				<h4 class="media-heading">{{ $post->name }}</h4>
				<p>{{ $post->brief }}</p>
			</div>
		</div>
	</div>
@endsection
