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
				   					<h1>Tìm thông tin khách sạn</h1>
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
					  @if(session('thongbao'))
                    <script type="text/javascript">
                    	  jQuery('.alert-danger').html('');
							jQuery('.alert-danger').show();
                      jQuery('.alert-danger').append('Bạn cần đăng nhập để xét duyệt quyền thực hiện chức năng này');
                    	 $('#loginModal').modal('show');
                    </script>
                        @endif 
					<div class="col-md-9">
						<div class="row">
							<div class="wrap-division">
								@foreach($khachsan as $ks)
								<div class="col-md-6 col-sm-6 animate-box">
									<div class="hotel-entry">
										<a href="{{route('ctkhachsan',$ks->id)}}" class="hotel-img" style="background-image: url(admin/images/khachsan/{{$ks->hinhanh}});">
											<p class="price"><span>{{$ks->gia}}</span><small> /Đêm</small></p>
										</a>
										<div class="desc">
											<p class="star"></p>
											<h3><a href="{{route('ctkhachsan',$ks->id)}}">{{$ks->tenkhachsan}}</a></h3>
											@foreach($quocgia as $c)
											@foreach($tinh as $t)
											@if($ks->tinh==$t->id && $t->quocgia==$c->maquocgia)
											<span class="place">{{$t->tentinh}}, {{$c->tenquocgia}}</span>
											@endif
											@endforeach
											@endforeach
											
										</div>
									</div>
								</div>

								@endforeach
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								{{$khachsan->links()}}
							</div>
						</div>
					</div>

					<!-- SIDEBAR-->
					<div class="col-md-3">
						<div class="sidebar-wrap">
							<div class="side animate-box">
								<div class="row">
									<div class="col-md-12">
										<h3 class="sidebar-heading">Tìm kiếm</h3>
										<form action="{{route('khachsan.search2')}}" method="get" class="colorlib-form-2">
						              	<div class="row">
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="name">Tên khách sạn :</label>
				                    <div class="form-field">
				                      <i class="icon icon-calendar2"></i>
				                      <input type="text" id="searchks_name" name="searchks_name" class="form-control " placeholder="Tên khách sạn">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group">
           							 <label class="control-label col-md-12">Tên Tỉnh : </label>
           							 <div class="col-md-12">
             							<select class="form-control col-md-12" name="searchks_tinh" id="searchks_tinh" title="Chọn Tỉnh">
               							@foreach($quocgia as $qg)
               							<optgroup label="{{$qg->tenquocgia}}">
                							 @foreach($tinh as $t)
                  							 @if($t->quocgia == $qg->maquocgia)
                   							<option value="{{$t->tentinh}}">{{$t->tentinh}}</option>
                  							 @endif
                 							@endforeach
               							</optgroup>
              							@endforeach
           							 </select></div>
           							</div>
				                </div>
				              
				                
				              </div>
				              <div class="col-md-12">
				                  <input type="submit" name="submit" id="submit" value="Tìm kiếm" class="btn btn-primary btn-block">
				                </div>
						            </form>
					            </div>
								</div>
							</div>
							<div class="col-md-12">
										<h3 class="sidebar-heading">Mức giá</h3>
										<form action="{{route('khachsan.search3')}}" method="get" class="colorlib-form-2">
						              	<div class="row">
						                <div class="col-md-10">
						                  <div class="form-group">
						                    <label for="guests">TỪ:</label>
						                    <div class="form-field">
						                      <i class="icon icon-arrow-down3"></i>
						                      <select name="searchks_gia1" id="searchks_gia1" class="form-control">
						                      	<option value=""></option>
						                         <option value="0">0</option>
						                        <option value="200000">200.000</option>
						                        <option value="300000">300.000</option>
						                        <option value="400000">400.000</option>
						                        <option value="1000000">1.000.000</option>
						                      </select>
						                    </div>
						                  </div>
						                </div>
						                <div class="col-md-10">
						                  <div class="form-group">
						                    <label for="guests">ĐẾN:</label>
						                    <div class="form-field">
						                      <i class="icon icon-arrow-down3"></i>
						                      <select name="searchks_gia2" id="searchks_gia2" class="form-control">
						                      	<option value=""></option>
						                        <option value="2000000">2.000.000</option>
						                        <option value="4000000">4.000.000</option>
						                        <option value="6000000">6.000.000</option>
						                        <option value="8000000">8.000.000</option>
						                        <option value="10000000">10.000.000</option>
						                      </select>
						                    </div>
						                  </div>
						                </div>
						              </div>
						               <div class="col-md-12">
				                  <input type="submit" name="submit" id="submit" value="Tìm kiếm" class="btn btn-primary btn-block">
				                </div>
						            </form>
					            </div>
					
					
						</div>
					</div>
				</div>
			</div>
		</div>

<script >
			var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
		</script>
@endsection
