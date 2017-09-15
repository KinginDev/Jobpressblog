@extends('main')

@section('title', '| Tags')

@section('content')
  <div class="section news-grid-section solid-light-grey-bg">
			<div class="inner">
				<div class="container">
					<div class="news-grid">

              <div class="news-grid-row flex space-between">
                  @foreach ($tags->posts as $post)
                <div class="news-item">
              			<img src="{{asset('images/featured_image/'.$post->image)}}" alt="blog-post-featured-img" class="img-responsive">
                  <div class="news-content">
                    <div class="news-meta flex no-column">
                      <h6><a href="#0" class="news-author">{{$post->author}}</a></h6>
                      <h6 class="publish-date">{{ date('M j, Y h:ia',strtotime($post->created_at))}}</h6>
                      <h6><a href="#0" class="comment-count">{{$post->comments()->count()}} comments</a></a></h6>
                    </div> <!-- end .news-meta -->
                    <h3 class="news-title">{{$post->title}}</h3>
                    <p class="news-excerpt">>{{substr(strip_tags($post->body),0,250)}}{{ strlen(strip_tags($post->body))> 250 ?"....." : ""}}</p>
                  <a href="{{route('blog.single', $post->slug)}}"><button type="button" class="button">Read More</button></a>
                  </div> <!-- end .news-content -->
                </div> <!-- end .news-item -->
            @endforeach

</div>
</div>
</div>
</div>
</div>

@endsection
