@if(Session::has('info'))
	<div class="alert alert-info m-4">
		<button type="button" class="close" data-dismiss="alert">
			<span>&times;</span>
		</button>
		{{ Session::get('info') }}
	</div>
@endif