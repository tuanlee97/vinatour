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
<!--search -->

<div class="colorlib-wrap" id="search_tour">            
	<div class="container">
				<div class="row">
				 
					<div class="col-md-12">
						<div class="row">
							<div class="wrap-division">
								@foreach($tour as $chuongtrinh)
								<div class="col-md-6 col-sm-6 animate-box">
									<div class="tour" >
										<a href="{{route('chitiettour',$chuongtrinh->id)}}" class="tour-img" style="background-image: url(admin/images/tour/{{$chuongtrinh->hinhanh}});">
											<p class="price"><span>{{$chuongtrinh->songay}} Ngày</span> / {{$chuongtrinh->sodem}} Đêm</small></p>
										</a>
										<span class="desc">
											<label class="form-check-label" for="">
										      	<p class="star"><span>{{number_format($chuongtrinh->averageRating,1)}}</i>/5<i class="icon-star-full"></i></span></p>
										      </label>
											<a href="{{route('chitiettour',$chuongtrinh->id)}}"><h4 style="font-weight: bold;">{{$chuongtrinh->tentour}}</h4>
											<span class="city">Xuất phát: {{$chuongtrinh->diemxuatphat}}</span>
											
										</span>
									</div>
								</div>
								@endforeach

							</div>
						</div>
						
					</div>

				
				
				</div>
			</div>
			</div>
<!---->	
		



@endsection
