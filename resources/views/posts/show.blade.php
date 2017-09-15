@extends('main_post')

@section('title' , "| $post->title ")

@section('content')
  <div class="row">
      <div class="col-lg-8">
        <div class="col-md-12">
		<img class="img-responsive" src="{{asset('images/featured_image/'. $post->image)}}"
	</div>
        <h1 class="center">{{$post->title}}</h1>
        <div class="panel panel-default" style="padding:20px;">
          <p clas="lead" > {!!$post->body!!}</p>

          <div class="tags">
  				@foreach($post->tags as $tag)
  		<span class="label label-default">{{$tag->name}}</span>
  				@endforeach
  				</div>
        </div>
        <div id="backendcomments" style="margin-top: 50px;">
      <div class="row">
        <div class="col-md-12 ">
          <h3>Comments <small>{{$post->comments()->count()
          }} total</small></h3>
          <table class="table table-condensed">
            <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Comment</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($post->comments as $comment)
            <tr>
              <td>{{$comment->name}}</td>
              <td>{{$comment->email}}</td>
              <td>{{$comment->comment}}</td>
              <td width="70px"> <a href="{{route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>

              <a href="{{ route('comments.delete', $comment->id)}}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
              </td>
              </tr>
            @endforeach
          </tbody>
          </table>

        </div>
      </div>
      </div>
</div>
</div>

      <div class="col-lg-4">
        <div class="well">
          <dl class="dl-horizontal">
              <label>Url</label>
              <a href="{{url('blog', $post->slug)}}">{{url('blog', $post->slug)}}</a>

            </dl>
            <dl class="dl-horizontal">
                <label> Time Created</label>
                <p>{{ date('M j, Y h:ia',strtotime($post->created_at))}}<p>
            </dl>
            <dl class="dl-horizontal">
              <label>Category:</label>
              <p>{{$post->category->name}}</p>
            </dl>
            <dl class="dl-horizontal">
              <label> Last Updated</label>
              <p>{{ date('M j, Y h:ia',strtotime($post->updated_at))}}<p>
            </dl>
            <div class="row">
              <div class="col-sm-6">
                {{Html::LinkRoute('post.edit' , 'Edit', [$post->id], ['class' => 'btn btn-primary btn-block'])}}
              </div>
              <div class="col-sm-6">
                <form id="del" method="post">
                  <input type="hidden" name="id" value="{{$post->id}}" />
                  <button type="submit" class="del btn btn-danger btn-block ">Delete</button>
                  {{csrf_field()}}
                </form>

              </div>
              <div class="col-sm-12">

                  {{Html::LinkRoute('post.index' ,'<< See All Posts >>', array(), ['class' => 'btn btn-default btn-block', 'style' =>'margin-top:15px;'])}}
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

  <script type="text/javascript">

  $('form#del').on('submit',function(e)
  {
    e.preventDefault();
    var data = $(this).serialize();
    console.log(data);
    swal({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  animation: false,
  customClass: 'animated tada',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then(function () {
  swal(
    $.post('{{url('post/delete')}}',data, function(){
  window.location.href = "{{route('post.index')}}";
    } )
  )
})

  })
  </script>

@endsection
