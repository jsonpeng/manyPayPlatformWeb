@section('scripts')
<script type="text/javascript">
	$('input[type=checkbox]').click(function(){
			console.log($('input[type=checkbox]:checked').length);
		if($('input[type=checkbox]:checked').length >=3){
			$('input[type=submit]').removeAttr('disabled');
		}
		else{
			$('input[type=submit]').attr('disabled','disabled');
		}
	});
</script>
@endsection