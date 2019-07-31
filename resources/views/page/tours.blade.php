@extends('master')
@section('content')
<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/img_bg_3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>VINATOUR</h2>
				   					<h1>Danh sách tour</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-wrap">
					
                
	<div class="container">
				<div class="row">
				 <?php session()->forget(['success', 'errors']);	?>
                
					
					  @if(session('thongbao'))

                    <script type="text/javascript">

                    	  jQuery('.alert-danger').html('');
							jQuery('.alert-danger').show();
                      jQuery('.alert-danger').append('Bạn cần đăng nhập để xét duyệt quyền thực hiện chức năng này');
                    	 $('#loginModal').modal('show');
                    </script>
                        @endif  
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
						<div class="row">
							<div class="col-md-12 text-center">
								{{$tour->links()}} 
							</div>
						</div>
					</div>

					<!-- SIDEBAR-->
				
				</div>
			</div>
			</div>
@endsection