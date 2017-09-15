@extends('main')

@section('title', ' | Welcome to Jobpress Blog')

@section('content')
  <!-- Blog Section -->
  		<div class="section blog-standard-section">
  			<div class="inner">
  				<div class="container">

  					<div class="blog-posts-wrapper flex space-between no-wrap">
  						<div class="blog-left-side">

                <div class="blog-standard">
                  <img src="images/blog-post-img01.jpg" alt="blog-post-featured-img" class="img-responsive">
                  <div class="blog-standard-info flex no-column no-wrap">
                    <div class="left-side">
                      <img src="images/avatar05.jpg" alt="post-author-img" class="img-responsive">
                    </div> <!-- end .left-side -->
                    <div class="right-side">
                      <h2 class="dark">{{$post->title}}</h2>
                      <div class="news-meta flex no-column">
                        <h6><a href="#0" class="news-author">Nancy watson</a></h6>
                        <h6 class="publish-date">{{$post->created_at}}</h6>
                        <h6><a href="#0" class="comment-count">5 comments</a></h6>
                      </div> <!-- end .news-meta -->
                      <p>{{substr(strip_tags($post->body),0,250)}}{{ strlen(strip_tags($post->body))> 250 ?"....." : ""}}</p>
                      <button type="button" class="button"><a href="{{ route('blog.single', $post->slug)}}">Read More</a></button>
                    </div> <!-- end .right-side -->
                  </div> <!-- end .blog-standard-info -->
                </div> <!-- end .blog-standard -->
            
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
