
@extends('master')
@section('content')
<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>by colorlib.com</h2>
				   					<h1>Danh lam thắng cảnh</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		
		<div id="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="wrap-division">
						@foreach($diadanh as $d)
							<article class="animate-box">
								<div class="blog-img" style="background-image: url(images//flag/{{$d->hinhanh}});"></div>
								<div class="desc">
									<div class="meta">
										<p>
											<span>Feb 24, 2018 </span>
											<span>admin </span>
											<span><a href="#">2 Comments</a></span>
										</p>
									</div>
									<h2><a href="{{route('ctblog',$d->madiadanh)}}">{{$d->tendiadanh}}</a></h2>
									<p>{{$d->mota}}</p>
								</div>
							</article>
							@endforeach
						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									<li class="disabled"><a href="#">&laquo;</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">&raquo;</a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="sidebar-wrap">
							<div class="side animate-box">
								<h3 class="sidebar-heading">Recent Post</h3>
								<div class="blog-entry-side">
									<a href="blog.html" class="blog-post">
										<span class="img" style="background-image: url(images/blog-3.jpg);"></span>
										<div class="desc">
											<span class="date">Feb 24, 2018</span>
											<h3>Our Secret Island Boat Tour Is just for You</h3>
											<span class="cat">Tour</span>
										</div>
									</a>
								</div>
								<div class="blog-entry-side">
									<a href="blog.html" class="blog-post">
										<span class="img" style="background-image: url(images/blog-2.jpg);"></span>
										<div class="desc">
											<span class="date">Feb 24, 2018</span>
											<h3>How These 5 People Found The Path to Their Dream Trip</h3>
											<span class="cat">Hotel</span>
										</div>
									</a>
								</div>
								<div class="blog-entry-side">
									<a href="blog.html" class="blog-post">
										<span class="img" style="background-image: url(images/blog-3.jpg);"></span>
										<div class="desc">
											<span class="date">Feb 24, 2018</span>
											<h3>Our Secret Island Boat Tour Is just for You</h3>
											<span class="cat">Cruises</span>
										</div>
									</a>
								</div>
							</div>
							<div class="side animate-box">
								<div class="sidebar-heading">Categories</div>
								<ul class="category">
									<li><a href="#"><i class="icon-check"></i> Car rental<span>(2)</span></a></li>
									<li><a href="#"><i class="icon-check"></i> Flight<span>(2)</span></a></li>
									<li><a href="#"><i class="icon-check"></i> Activities<span>(3)</span></a></li>
									<li><a href="#"><i class="icon-check"></i> Hotel<span>(5)</span></a></li>
									<li><a href="#"><i class="icon-check"></i> Tour<span>(2)</span></a></li>
									<li><a href="#"><i class="icon-check"></i> Travel<span>(3)</span></a></li>
									<li><a href="#"><i class="icon-check"></i> Night<span>(2)</span></a></li>
									<li><a href="#"><i class="icon-check"></i> Cruises<span>(2)</span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			@endsection
