@if (Session::has('success'))

<div class="alert alert-success alert-dismissable">
	<strong>Success: {{Session::get('success') }}</strong>
</div>

@endif

@if (count($errors) > 0)

	<div class="alert alert-danger">
	<strong>Errors:</strong>
	@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
	@endforeach
</div>
@endif
