@extends('main_post')

@section('title','| '.htmlspecialchars($tag->name, ENT_QUOTES, 'UTF-8'))

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $tag->name}} Tag <small>{{$tag->posts()->count()}} Post
			</small></h1>
		</div>
		<div class="col-md-2 ">
		<a href="{{route('tag.edit',$tag->id)}}" class="btn btn-primary btn-block pull-right" style="margin-top: 20px;">Edit</a>
		</div>
<div class="col-md-2">
{{Form::open(['route' => ['tag.destroy', $tag->id], 'method'=> 'DELETE' ]) }}
  {{ csrf_field() }}
{{Form::submit('Delete', ['class' => 'btn btn-danger btn-block ', 'style' =>'margin-top:20px;'])}}
{{Form::close()}}
</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				</th>Tags</th>
				<th></th>
			</thead>
			<tbody>
			@foreach( $tag->posts as $post)
				<tr>
					<th>{{$post->id}}</th>
					<td><a href="{{route('post.show',$post->id)}}"> {{$post->title}}</a></td>
					<td>@foreach ($post->tags as $tag)
						<span class="label label-default">{{$tag->name}}</span>
					@endforeach
					</td>
					<td> <a href="{{route('post.show', $post->id) }}" class="btn btn-default btn-xs"> view</a></td>
				</tr>
			@endforeach
			</tbody>
		</table>>
	</div>
</div>

@stop
