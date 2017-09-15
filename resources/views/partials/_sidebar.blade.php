<div class="blog-sidebar">

							<div class="search-widget blog-widget">
								<h6>Search this site</h6>
				                <div class="input-group search-form">
				                    <input type="text" class="form-control"  placeholder="Enter your keyword" >
				                    <button type="submit"><span><i class="ion-ios-search"></i></span></button>
	                			</div>
							</div> <!-- end .search-widget -->

							<div class="recent-posts-widget blog-widget">
								<h6>Recent Posts</h6>
								@foreach($recposts as $recpost)
								<div class="recent-post flex items-center no-column no-wrap">
									<img src="{{asset('images/featured_image/'.$recpost->image)}}" alt="recent-post-img" class="img-responsive">
									<h4><a href="{{route('blog.single', $post->slug)}}">{{$recpost->title}}</a></h4>
								</div> <!-- end .recent-post -->
							@endforeach


							</div> <!-- end .recent-posts-widget -->

							<div class="blog-category-widget blog-widget">
								<h6>Categories</h6>
								<ul class="blog-categories list-unstyled">
                  @foreach ($categories as $category)
                    <li><a href="#0">{{$category->name}}</a></li>
                  @endforeach
								</ul>
							</div> <!-- end .blog-category-widget -->

							<div class="blog-tags-widget blog-widget">
								<h6>Tags</h6>
								<ul class="blog-tags flex no-column list-unstyled">
                  @foreach($tags as $tag)
									<li><a href="{{route('tag.blog.show',$tag->id)}}" class="button button-xs grey">{{$tag->name}}</a></li>
                @endforeach
								</ul>
							</div> <!-- end .blog-tags-widget -->

							<div class="blog-archives-widget blog-widget">
								<h6>Arhives</h6>
								<ul class="blog-archives list-unstyled">
									<li><a href="">October 2016<span>28 posts</span></a></li>
									<li><a href="">September 2016<span>35 posts</span></a></li>
									<li><a href="">August 2016<span>19 posts</span></a></li>
									<li><a href="">July 2016<span>23 posts</span></a></li>
									<li><a href="">June 2016<span>29 posts</span></a></li>
									<li><a href="">May 2016<span>16 posts</span></a></li>
									<li><a href="">April<span>14 posts</span></a></li>
								</ul>
							</div> <!-- end .blog-archives-widget -->

						</div> <!-- end .blog-sidebar -->
