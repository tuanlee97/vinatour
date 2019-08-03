	
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box fadeInUp animated-fast">
						<h2>Các Tour Vừa Xem</h2>

					</div>
			</div></div>
			



			<div class="tour-wrap">
				@foreach($tours as $chuongtrinh)
				<a href="{{route('chitiettour',$chuongtrinh->id)}}" class="tour-entry animate-box fadeInUp animated-fast">
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



