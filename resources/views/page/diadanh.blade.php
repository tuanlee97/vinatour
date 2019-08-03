
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
				   					<h2>VINATOUR</h2>
				   			
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
				  @if(session('thongbao'))
                    <script type="text/javascript">
                    	  jQuery('.alert-danger').html('');
							jQuery('.alert-danger').show();
                       jQuery('.alert-danger').append('Bạn cần đăng nhập để xét duyệt quyền thực hiện chức năng này');
                    	 $('#loginModal').modal('show');
                    </script>
                        @endif 
				<div class="row">
					<div class="col-md-8">
						<div class="wrap-division">
						@foreach($diadanh as $d)
							<article class="animate-box">
								<div  class="blog-img" style="background-image: url(admin/images/diadanh/{{$d->hinhanh}});"></div>
								<div class="desc">
									<div class="meta">
										<p>
											<span>{{$d->created_at->format('M d, Y ')}}</span>
											<span>admin </span>
											<span></span>
										</p>
									</div>
									<h2><a style="font-weight: bold; color: #007dc9c4;" href="{{route('ctdiadanh',$d->id)}}">{{$d->tendiadanh}}</a></h2>
									
								</div>
							</article>
							<br>
							@endforeach
						</div>
						<div class="row">
							<div class="col-md-12">
							{{$diadanh->links()}} 
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="sidebar-wrap">
							<div class="side animate-box">
								<h3 class="sidebar-heading">Bài viết mới :</h3>
								<div class="blog-entry-side">
									@foreach($diadanh1 as $d1)
									<a href="blog.html" class="blog-post">
										<span class="img" style="background-image: url(admin/images/diadanh/{{$d1->hinhanh}});"></span>
										<div class="desc">
											<span class="date">{{$d1->created_at->format('M d, Y ')}}</span>
											<h3>{{$d1->tendiadanh}}</h3>
											<span class="cat"></span>
										</div>
									</a>
									<hr>
									@endforeach
								</div>
								
							</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
			@endsection
