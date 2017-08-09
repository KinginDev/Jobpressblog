@extends('main_post')

@section('title', '| Create Tags')

@section('content')
  <div class="row">
    <div class="col-md-7 col-md-offset-1">
      <table class="table table-bordered"style="margin-top:20px;">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
            <tr>
              <th>{{$tag->id}}</th>
              <th><a href="{{route('tag.show', $tag->id)}}">{{$tag->name}}</a></th>
              <th></th>
              <th></th>
            </tr>

          @endforeach
          <tbody>
      </table>
    </div>
    <div class="col-md-3 col-md-offset-1" style="margin-top:20px;">
      <div class="well">
      {{Form::open(['route' => 'tag.store', 'method' => 'POST'])}}
       <div class="form-group">
         {{Form::label('name', 'Tag Name')}}
         {{Form::text('name', null , ['class' => 'form-control'])}}
       </div>

       {{Form::submit('Create New Tag', ['class' => 'btn btn-primary btn block'])}}
       {{Form::close()}}

    </div>
    </div>

  </div>

@endsection
