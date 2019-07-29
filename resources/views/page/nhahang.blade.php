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
				   					<h2>VINATOUR</h2>
				   					<h1>Tìm thông tin nhà hàng</h1>
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
					<div class="col-md-9">
						<div class="row">
							<div class="wrap-division">
								@foreach($nhahang as $nh)
								<div class="col-md-6 col-sm-6 animate-box">
									<div class="hotel-entry">
										<a href="{{route('ctnhahang',$nh->id)}}" class="hotel-img" style="background-image: url(admin/images/nhahang/{{$nh->hinhanh}});">
											<p class="price"><span>{{$nh->gia}}</span><small> /Bữa ăn</small></p>
										</a>
										<div class="desc">
											<p class="star"></p>
											<h3><a href="{{route('ctnhahang',$nh->id)}}">{{$nh->tennhahang}}</a></h3>
											@foreach($quocgia as $c)
											@foreach($tinh as $t)
											@if($nh->tinh==$t->id && $t->quocgia==$c->maquocgia)
											<span class="place">{{$t->tentinh}}, {{$c->tenquocgia}}</span>
											@endif
											@endforeach
											@endforeach
											<p>{{$nh->mota}}</p>
										</div>
									</div>
								</div>

								@endforeach
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
							{{$nhahang->links()}}
							</div>
						</div>
					</div>

					<!-- SIDEBAR-->
					<div class="col-md-3">
						<div class="sidebar-wrap">
							<div class="side search-wrap animate-box">
								<h3 class="sidebar-heading">Tìm kiếm nhanh</h3>
								<form method="post" class="colorlib-form">
				              	<div class="row">
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="name">Tên nhà hàng :</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" id="name" class="form-control " placeholder="Tên nhà hàng">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="localtion">Khu vực:</label>
				                    <div class="form-field">
				                       <i class="icon icon-arrow-down3"></i>
				                      <select name="localtion" id="localtion" class="form-control">
				                        <option value="#">Hồ Chí Minh</option>
				                        <option value="#">Vũng Tàu</option>
				                        <option value="#">Hà Nội</option>
				                        <option value="#">Đà Lạt</option>
				                      </select>
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="country">Quốc Gia</label>
				                    <div class="form-field">
				                      <i class="icon icon-arrow-down3"></i>
				                      <select name="country" id="country" class="form-control">
				                        <option value="#">Việt Nam</option>
				                        <option value="#">Trung Quốc</option>
				                        <option value="#">Hàn Quốc</option>
				                        <option value="#">Thái Lan</option>
				                        <option value="#">Singapore</option>
				                      </select>
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <input type="submit" name="submit" id="submit" value="Tìm kiếm" class="btn btn-primary btn-block">
				                </div>
				              </div>
				            </form>
							</div>
							<div class="side animate-box">
								<div class="row">
									<div class="col-md-12">
										<h3 class="sidebar-heading">Mức giá</h3>
										<form method="post" class="colorlib-form-2">
						              	<div class="row">
						                <div class="col-md-6">
						                  <div class="form-group">
						                    <label for="guests">TỪ:</label>
						                    <div class="form-field">
						                      <i class="icon icon-arrow-down3"></i>
						                      <select name="people" id="people" class="form-control">
						                        <option value="#">1</option>
						                        <option value="#">200</option>
						                        <option value="#">300</option>
						                        <option value="#">400</option>
						                        <option value="#">1000</option>
						                      </select>
						                    </div>
						                  </div>
						                </div>
						                <div class="col-md-6">
						                  <div class="form-group">
						                    <label for="guests">ĐẾN:</label>
						                    <div class="form-field">
						                      <i class="icon icon-arrow-down3"></i>
						                      <select name="people" id="people" class="form-control">
						                        <option value="#">2000</option>
						                        <option value="#">4000</option>
						                        <option value="#">6000</option>
						                        <option value="#">8000</option>
						                        <option value="#">10000</option>
						                      </select>
						                    </div>
						                  </div>
						                </div>
						              </div>
						            </form>
					            </div>
								</div>
							</div>
					
					
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
