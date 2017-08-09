@extends('main_post')

@section('title', '| All Categories')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')
<div class="row">
	<div class="col-md-8">
	<h1>Categories</h1>
	<table class="table table-bordered">
	<thead>
		<th>#</th>
		<th>Name:</th>
    <th></th>
    <th></th>
	</thead>
	<tbody>
	@foreach ($categories as $category)
		<tr>
			<th>{{ $category->id}}</th>
			<td> {{ $category->name}}</td>
      <td></td>
      <td></td>
		</tr>
@endforeach
	</tbody>
	</table>
	</div>
	<div class="col-sm-3">
		<div class="well">
			{!! Form::open(['route' => 'categories.store', 'method' =>'post','data-parsley-validate' => ''])!!}
			<h2>New Category</h2>
			{{ Form::label('name', 'Name')}}
			{{Form::text('name', null, ['class' => 'form-control','required' => ''] )}}
			{{Form::submit('Create New Category',['class' =>'btn btn-primary btn-block btn-h1-spacing ', 'style' => 'margin-top:10px;'])}}


			{!! Form::close() !!}
		</div>
	</div>
</div>



@endsection
@section('scripts')
{!! Html::script('js/parsely.min.js')!!}
@endsection
