@extends('main')

@section('title' ,'| Title')


@section('content')

  <div class="section blog-single-section-sidebar">
  			<div class="inner">
  				<div class="container">
  					<div class="section blog-single-section-sidebar-inner flex no-wrap">
  						<div class="blog-left-side">

  							<div class="blog-featured-section blog-featured-image">
  								<img src="{{asset('images/featured_image/'.$post->image)}}" alt="blog-featured-image" class="img-responsive">
  							</div> <!-- end .blog-featured-image -->

  							<div class="blog-text-content">
  								<div class="content-meta flex items-center no-column no-wrap">
  									<div class="left-side">
  										<img src="{{asset('images/avatar01.jp')}}" alt="post-author-image" class="img-responsive">
  									</div> <!-- end .left-side -->
  									<div class="right-side">
  										<h1 class="dark">{{$post->title}}</h1>
  										<div class="right-side-bottom-wrapper flex items-center no-column">
  											<div class="news-meta flex no-column">
  												<h6><a href="#0" class="news-author">{{$post->author}}</a></h6>
  												<h6 class="publish-date">{{ date('M j, Y h:ia',strtotime($post->created_at))}}</h6>
  												<h6><a href="#0" class="comment-count">{{$post->comments()->count()}} comment(s)</a></h6>
  											</div> <!-- end .news-meta -->
  											<div class="post-tags-wrapper flex items-center no-column">
  												<h6>Tags:</h6>
                          @foreach($post->tags as $tag)
  												<ul class="post-tags flex items-center no-column list-unstyled">
  													<li><a href="#0" class="button button-sm grey">{{$tag->name}}</a></li>

  												</ul> <!-- end .post-tags -->
                        @endforeach
  											</div> <!-- end .post-tags-wrapper -->
  										</div> <!-- end .right-side-bottom-wrapper -->
  									</div> <!-- end .right-side -->
  								</div> <!-- end .blog-content-meta -->

  								<div class="divider"></div>

  								<div class="blog-text">
  									<p>{!! $post->body!!}</p>
  								</div> <!-- end .blog-text -->

  								<div class="social-share-wrapper flex items-center no-wrap">
  									<h6>Share this title:</h6>
  									<ul class="social-share flex no-wrap no-column list-unstyled">
  										<li><a href="#0" class="button button-sm facebook-btn"><span><i class="ion-social-facebook"></i></span>Facebook</a></li>
  										<li><a href="#0" class="button button-sm twitter-btn"><span><i class="ion-social-twitter"></i></span>Twitter</a></li>
  										<li><a href="#0" class="button button-sm g-plus-btn"><span><i class="ion-social-googleplus"></i></span>Google plus</a></li>
  									</ul> <!-- end .social-share -->
  								</div> <!-- end .social-share-wrapper -->

  							</div> <!-- end .blog-text-content -->

  							<div class="divider"></div>

  							<div class="related-posts-wrapper">
  								<h3>Related Posts</h3>
  								<div class="news-grid">
  									<div class="news-grid-row flex space-between" style="">

  										<div class="news-item">
  											<img src="{{asset('images/news-grid01.jpg')}}" alt="news-thumbnail" class="img-responsive">
  											<div class="news-content">
  												<div class="news-meta flex no-column">
  													<h6><a href="#0" class="news-author">Nancy watson</a></h6>
  													<h6 class="publish-date">20.02.2017</h6>
  													<h6><a href="#0" class="comment-count"> comments</a></h6>
  												</div> <!-- end .news-meta -->
  												<h3 class="news-title"></h3>
  												<a href="#0">Read More<i class="ion-ios-arrow-thin-right"></i></a>
  											</div> <!-- end .news-content -->
  										</div> <!-- end .news-item -->

  									</div>  <!-- end .news-grid-row -->
  								</div> <!-- end .news-grid -->
  							</div> <!-- end .related-post-wrapper -->
                <div class="comment-section-wrapper">
								<div class="left-side-wrapper">
									<h3>There are {{$post->comments()->count()}} comments on this post</h3>

                  @foreach($post->comments as $comment)
                    @if($comment->user == false)
									<div class="comment-wrapper">
										<div class="comment-wrapper-inner flex no-column no-wrap">
											<div class="left-side">
												<img src="{{"https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email))). "?s=50&dwavatar:"}}" alt="comment-image" class="img-responsive">
											</div> <!-- end .left-side -->
											<div class="right-side">
												<h4 class="dark">{{$comment->name}}</h4>
                        <strong>{{$comment->subject}}</strong>
												<p>{{$comment->comment}}</p>
												<div class="comment-meta flex items-center no-wrap no-column">
													<h6>44 minutes ago</h6>
													<h6><a href="#0">Reply</a></h6>
												</div> <!-- end .comment-meta -->
											</div> <!-- end.right-side -->
										</div> <!-- end .comment-wrapper-inner -->
                  </div>
                @else
                  <div class="comment-wrapper sub-comment">
											<div class="comment-wrapper-inner flex no-column no-wrap">
												<div class="left-side">
													<img src="{{"https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email))). "?s=50&d=wavatar"}}" alt="comment-image" class="img-responsive">
												</div> <!-- end .left-side -->
												<div class="right-side">
                          <h4 class="dark">{{$comment->name}}</h4>
                          <strong>{{$comment->subject}}</strong>
  												<p>{{$comment->comment}}</p>
													<div class="comment-meta flex items-center no-wrap no-column">
														<h6>44 minutes ago</h6>
														<h6><a href="#0">Reply</a></h6>
													</div> <!-- end .comment-meta -->
												</div> <!-- end.right-side -->
											</div> <!-- end .comment-wrapper.inner -->
										</div> <!-- end .sub-comment-wrapper -->

                @endif
                @endforeach




</div>
								</div> <!-- end .left-side-wrapper -->
                <div class="right-side-wrapper">

                      @include('partials/_messages')


									<h3>Leave a comment</h3>

                    {{Form::open(['route' => ['comment.store',$post->id],'class' =>'comment-form', 'id' => 'comment-form'])}}

										<div class="form-group-wrapper flex space-between items-center">
                      @if(Auth::check())

                      @else
											<div class="form-group">

                        {{Form::text('name',null,['class'=>'form-control','id'=>'commentor-name','placeholder'=>'Enter your name'])}}
											</div> <!-- end .form-group -->

											<div class="form-group">

                        {{Form::email('email',null,['class'=>'form-control','id'=>'commentor-email','placeholder'=>'Enter your email'])}}
											</div> <!-- end .form-group -->
                    @endif
										</div> <!-- end .form-group-wrapper -->

										<div class="form-group">

                      {{Form::text('subject',null,['class'=>'form-control','id'=>'commentor-name','placeholder'=>'Enter your subject'])}}
										</div> <!-- end .form-group -->

										<div class="form-group">

                      {{Form::textarea('comment',null,['class'=>'form-control','placeholder'=>'Enter your Comment'])}}
										</div> <!-- end .form-group -->

											{{Form::submit('Submit Comment' , array('class' =>'button'))}}
									{{Form::close()}}
								</div> <!-- end .right-side-wrapper -->
              </div>

            @include('partials._sidebar')	</div> <!-- end .comment-section-wrapper -->

 @endsection
                						</div> <!-- end .left-side -->

					</div> <!-- end .blog-single-section-inner -->

				</div> <!-- end .container -->
			</div> <!-- end .section -->
