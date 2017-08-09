@extends('main')

@section('title', ' | Welcome to Jobpress Blog')

@section('content')
  <!-- Blog Section -->
  		<div class="section blog-list-section">
  			<div class="inner">
  				<div class="container">

  					<div class="blog-posts-wrapper flex space-between no-wrap">
  						<div class="blog-left-side">
                @foreach($posts as $post)
  							<div class="blog-list flex no-wrap">
  								<div class="left-side">
  									<img src="{{asset('images/featured_image/'.$post->image)}}" alt="blog-post-featured-img" class="img-responsive">
  								</div> <!-- end .left-side -->
  								<div class="right-side">
  									<h2 class="dark">{{$post->title}}</h2>
  									<div class="news-meta flex no-column">
  										<h6><a href="#0" class="news-author">{{$post->author}}</a></h6>
  										<h6 class="publish-date">{{ date('M j, Y h:ia',strtotime($post->created_at))}}</h6>
  										<h6><a href="#0" class="comment-count">{{$post->comments()->count()}} comments</a></h6>
  									</div> <!-- end .news-meta -->
  									<p>{{substr(strip_tags($post->body),0,250)}}{{ strlen(strip_tags($post->body))> 250 ?"....." : ""}}</p>
  									<a href="{{route('blog.single', $post->slug)}}"><button type="button" class="button">Read More</button></a>
  								</div> <!-- end .right-side -->
  							</div> <!-- end .blog-list -->
              @endforeach

      </div>
      @include('partials._sidebar')
      </div>
      </div>
    </div>
  </div>

@endsection
