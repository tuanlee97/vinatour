@extends('master')
@section('content')
		<aside id="colorlib-hero">
			  @if(session('thongbao'))
                    <script type="text/javascript">
                    	  jQuery('.alert-danger').html('');
							jQuery('.alert-danger').show();
                         jQuery('.alert-danger').append('Bạn cần đăng nhập để xét duyệt quyền thực hiện chức năng này');
                    	 $('#loginModal').modal('show');
                    </script>
                        @endif 

                          
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>VINATOUR</h1>
				   					<h2>Một chuyến đi làm bạn hài lòng là sứ mệnh của chúng tôi</h2>
				   					
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Đi một ngày đàng</h1>
				   					<h1>Học một sàng khôn</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_5.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluids">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>Hãy tận hưởng chuyến đi của mình</h2>
				   					<h1>Còn lại để chúng tôi lo</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/img_bg_4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Tin tức</h1>
				   					<h1>Luôn được cập nhập trên hệ thống</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		</div>

		<div id="colorlib-services">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-3 animate-box text-center aside-stretch">
						<div class="services">
							<span class="icon">
								<i class="flaticon-around"></i>
							</span>
							<h3>Tham khảo giá tour</h3>
							<p>Hãy chọn những điểm đến của bạn, chúng tôi sẽ cho bạn biết những giá cả nơi bạn đến, nơi bạn ở và nơi bạn ăn uống</p>
						</div>
					</div>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<i class="flaticon-boat"></i>
							</span>
							<h3>Thông tin</h3>
							<p>Các thông tin, tin tức về nhà hàng, khách sạn, địa danh của nơi bạn muốn đến đều có thể thể tham khảo trên trang web của chúng tôi</p>
						</div>
					</div>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<i class="flaticon-car"></i>
							</span>
							<h3>Chọn chuyến đi của bạn</h3>
							<p>Hãy tự chọn, tham khảo lịch trình của mình tại website của chúng tôi và sau đó liên hệ chúng tôi để được đặt tour theo ý bạn</p>
						</div>
					</div>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<span class="icon">
								<i class="flaticon-postcard"></i>
							</span>
							<h3>Hỗ trợ</h3>
							<p>Bất cứ thắc mắc nào hãy liện hệ chúng tôi bất cứ khi nào bạn muốn qua hệ thống hoặc liên lạc trực tiếp chúng tôi qua hotline: +84 395 563 446</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="colorlib-tour colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Các Chương Trình Tour Hấp Dẫn</h2>

					</div>
				</div>
			</div>



			<div class="tour-wrap">
				@foreach($tour as $chuongtrinh)
				<a href="{{route('chitiettour',$chuongtrinh->id)}}" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(admin/images/tour/{{$chuongtrinh->hinhanh}});">
					</div>
					<span class="desc">
						<p class="star"></p>
						<h2>{{$chuongtrinh->tentour}}</h2>
						<span class="city">Xuất phát: {{$chuongtrinh->diemxuatphat}}</span>
						<span class="price"></span>
					
					</span>
				</a>

		@endforeach

			</div>
		</div>



		<div id="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Danh lam thắng cảnh</h2>
						
					</div>
				</div>
				<div class="blog-flex">
					<div class="f-entry-img" style="background-image: url(images/blog-3.jpg);">
					</div>
					<div class="blog-entry aside-stretch-right">
						<div class="row">
							@foreach($diadanh as $dd)
							<!--Item-->
							<div class="col-md-12 animate-box">
								<a href="{{route('ctdiadanh',$dd->id)}}" class="blog-post">
									<span class="img" style="background-image: url(admin/images/diadanh/{{$dd->hinhanh}});"></span>
									<div class="desc">
										<span class="date">{{$dd->updated_at}}</span>
										<h3>{{$dd->tendiadanh}}</h3>
										<span class="cat ">Xem thêm </span>
									</div>

								</a>
							</div>
					@endforeach
						</div>
						<a href="{{route('diadanh')}}" class="btn btn-primary" >Xem nhiều hơn</a>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-intro" class="intro-img" style="background-image: url(images/cover-img-1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 animate-box">
						<div class="intro-desc">
							<div class="text-salebox">
								<div class="text-lefts">
									<div class="sale-box">
										<div class="sale-box-top">
											<h2 class="number">V</h2>
											<span class="sup-1">ina</span>
											<span class="sup-2">tour</span>
										</div>
										<h5 class="text-sale">The Best choice</h5>
									</div>
								</div>
								<div class="text-rights">
									<h3 class="title">Nhanh chân thì còn chậm chân thì hết!</h3>
									<p></p>
									<p><a href="{{route('tours')}}" class="btn btn-primary">Tìm tour ngay</a> <a href="{{route('about')}}" class="btn btn-primary btn-outline">Giới thiệu về công ty</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6 animate-box">
						<div class="video-wrap">
							<div class="video colorlib-video" style="background-image: url(images/img_bg_2.jpg);">
								<a href="https://vimeo.com/222244073" class="popup-vimeo"><i class="icon-video"></i></a>
								<div class="video-overlay"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-hotel">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Các khách sạn nên chọn cho kỳ nghỉ của bạn</h2>
						<p>Với sứ mệnh vui lòng khách đến vừa lòng khách đi chung tôi xin đưa ra một số khách sạn được đánh giá cao để được phục vụ thật tốt cho các bạn </p>
					</div>
				</div>

			<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel">
							@foreach($khachsan as $ks)
							@if($ks->gia <= 500000)
							<div class="item">
								<div class="hotel-entry">
									<a href="hotels.html" class="hotel-img" style="background-image: url(admin/images/khachsan/{{$ks->hinhanh}});">
										<p class="price"><span>{{$ks->gia}}</span><small> /night</small></p>
									</a>
									<div class="desc">
										<p class="star"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span> 545 Reviews</p>
										<h3><a href="{{route('ctkhachsan',$ks->id)}}">{{$ks->tenkhachsan}}</a></h3>

										@foreach($quocgia as $c)
											@foreach($tinh as $t)
											@if($ks->tinh==$t->id && $t->quocgia==$c->maquocgia)
											<span class="place">{{$t->tentinh}} - {{ $c->tenquocgia}}</span>
											@endif
											@endforeach
											@endforeach
										<p>{{$ks->mota}}</p>
									</div>
								</div>
							</div>
							@endif
							@endforeach
						</div>
					</div>
				</div>

			</div>
		</div>

		<div id="colorlib-testimony" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Khách hàng nói gì về chúng tôi</h2>
						<p></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 animate-box">
						<div class="owl-carousel2">
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person1.jpg);"></span>
									<span class="user">Hot girl quận Cam</span>
									<small>Quận  Cam, Sài Gòn</small>
									<blockquote>
										<p>" Dịch vụ tuyệt vời. Tôi đã có những giây phút thư giãn trong tour vừa rồi."</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person2.jpg);"></span>
									<span class="user">Lê Văn Đạt</span>
									<small>Quận Quýt, Sài Gòn</small>
									<blockquote>
										<p>"Công ty chuyên nghiệp, chu đáo. Tôi sẽ tiếp tục là khách hàng trong chuyến đi kế tiếp."</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person3.jpg);"></span>
									<span class="user">Chị Đẹp</span>
									<small>Quận 8, Sài Gòn</small>
									<blockquote>
										<p>"Chương trình tour hấp dẫn , hoạt động tổ chức sôi nổi. Tôi thực sự thích nó."</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



@endsection
