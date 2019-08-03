@extends('master')
@section('content')
<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>VINATOUR</h2>
				   					<h1>Dịch vụ của chúng tôi</h1>
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
				<div id="colorlib-services">
			<div class="container">
				  @if(session('thongbao'))
                    <script type="text/javascript">
                    	  jQuery('.alert-danger').html('');
							jQuery('.alert-danger').show();
                         jQuery('.alert-danger').append('Bạn cần đăng nhập để xét duyệt quyền thực hiện chức năng này');
                    	 $('#loginModal').modal('show');
                    </script>
                        @endif 
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
			</div>
		</div>
@endsection
