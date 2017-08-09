@extends('main_post')

@section('title' , ' | Admin Index')



@section('content')
<div class="row" style="margin:20px;">
  <div class="col-md-2 pull-right" style="margin-bottom: 10px;">
  			{!! Html::LinkRoute('post.create','Create new posts', array(), array('class' => 'btn btn-primary btn-block btn-h1-spacing'))  !!}
  		</div>

  <div class="col-md-12">
    <table class="table datatable table-bordered" id="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Post Title</th>
          <th>Body</th>
          <th>Date Created</th>
          <th>Date Updated</th>
          <th></th>
        </tr>
      </thead>
      @foreach ($posts as $post)


      <tbody>
        <tr>
          <th>{{$post->id}}</th>
          <td>{{$post->title}}</td>
          <td> {{ substr(strip_tags($post->body),0,50)}} {{ strlen(strip_tags($post->body)) > 50 ? ".....": ""}} </td>
				<td> {{ date('M j, Y',strtotime($post->created_at)) }}</td>
				<td> {{ date('M j, Y' ,strtotime($post->updated_at)) }}</td>
				<td> <a href="{{route('post.show',$post->id)}}" class="btn btn-default btn-sm">View</a> <a href="{{route('post.edit', $post->id)}}" class="btn btn-default btn-sm">Edit</a></td>

							</tr>

          @endforeach
      </tbody>
    </table>

    <div class="text-center">
{{ $posts->links() }}
</div>

  </div>
</div>


  <script>

      $('#table').DataTable();

   </script>
@stop
