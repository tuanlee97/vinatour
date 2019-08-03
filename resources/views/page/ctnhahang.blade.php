@extends('master')
@section('content')
<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>by colorlib.com</h2>
				   					<h1>Thông tin Nhà Hàng</h1>
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
				  @if(session('thongbao'))
                    <script type="text/javascript">
                    	  jQuery('.alert-danger').html('');
							jQuery('.alert-danger').show();
                          jQuery('.alert-danger').append('Bạn cần đăng nhập để xét duyệt quyền thực hiện chức năng này');
                    	 $('#loginModal').modal('show');
                    </script>
                        @endif 
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<div class="wrap-division">
									<div class="col-md-12 col-md-offset-0 heading2 animate-box">

										<h2>{{$nhahang->tennhahang}}</h2>
									</div>
									<div class="row">
										<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
													<div class="col-md-6 col-sm-6">
														<div class="room-img" style="background-image: url(images/flag/{{$nhahang->hinhanh}});"></div>

													</div>

												</div>
											</div>
										</div>

										<div>

												
											<?php echo ($nhahang->noidung); ?></div>
									</div>
								</div>
							</div>
						</div><div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=323774901635384&autoLogAppEvents=1"></script>
<div class="fb-comments" data-href="https://vinatour.tk/ctnhahang/{{$nhahang->id}}" data-width="" data-numposts="5"></div>
					</div>

					<!-- SIDEBAR-->
				>
				</div>
			</div>
		</div>


		@endsection
