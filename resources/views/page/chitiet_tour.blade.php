@extends('master')
@section('content')
	<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>by colorlib.com</h2>
				   					<h1>Tour Overview</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-wrap">
<div class="colorlib-wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-12">
								<div class="wrap-division">
									<div class="col-md-12 col-md-offset-0 heading2 animate-box">
										<h2>{{$tour->tentour}}</h2>
									</div>
									<div class="row">
										<div class="col-md-12 animate-box">
											<div class="room-wrap">
												<div class="row">
												
													<?php echo ($tour->noidung); ?>
													
												
												</div>
											</div>
										</div>


									</div>
								</div>
							</div>
						</div>

					</div>

		<!-- 		 SIDEBAR-->
					<div class="col-md-3">
						<div class="sidebar-wrap">
							
					
							<div class="side animate-box">
								<div class="row">
									<div class="col-md-12">
										<h3 class="sidebar-heading">Review Rating</h3>
										<form method="post" class="colorlib-form-2">
										   <div class="form-check">
												<input type="checkbox" class="form-check-input" id="exampleCheck1">
												<label class="form-check-label" for="exampleCheck1">
													<p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
												</label>
										   </div>
										   <div class="form-check">
										      <input type="checkbox" class="form-check-input" id="exampleCheck1">
										      <label class="form-check-label" for="exampleCheck1">
										    	   <p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
										      </label>
										   </div>
										   <div class="form-check">
										      <input type="checkbox" class="form-check-input" id="exampleCheck1">
										      <label class="form-check-label" for="exampleCheck1">
										      	<p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
										     </label>
										   </div>
										   <div class="form-check">
										      <input type="checkbox" class="form-check-input" id="exampleCheck1">
										      <label class="form-check-label" for="exampleCheck1">
										      	<p class="rate"><span><i class="icon-star-full"></i><i class="icon-star-full"></i></span></p>
										     </label>
										   </div>
										   <div class="form-check">
										      <input type="checkbox" class="form-check-input" id="exampleCheck1">
										      <label class="form-check-label" for="exampleCheck1">
										      	<p class="rate"><span><i class="icon-star-full"></i></span></p>
										     </label>
										   </div>
										</form>
									</div>
								</div>
							</div>
						
						</div>
					</div> 
					<div class="col-md-12">
							<!-- START Bảng tính giá tour-->
						<div class="col-sm-12 col-md-12 thumbnail " id="tinhgiatour">
								<table class="table table-bordered">
					<thead>
				      <tr>

				       <th style="width: 10%">Ngày</th>
				       	<th style="width: 10%">Tỉnh</th>
				         <th style="width: 20%">Địa điểm</th>
				        <th style="width: 20%">Nhà hàng</th>
				        <th style="width: 20%">Khách sạn</th>
				        <th style="width: 20%">Thành tiền</th>
				      </tr>
				    </thead>
 <tbody><form method="POST" enctype="multipart/form-data"  action="{{url('dattour')}}">
				    	@csrf
				    		@for ($i = 1; $i <= $tour->songay ; $i++)
    								 

    								 			<tr>

    						<td style="font-weight: bold;">Ngày {{ $i }}</td>
    								 				
    								 				
						<td style="font-weight: bold;">
							<div>			@foreach($diemden as $dd)
									  	<div><a href="#">{{$dd->tentinh}}</a></div>
											@endforeach
							</div>
								
						</td>

						<td>
							
								@foreach($diemden as $dd)
								<div><b>{{$dd->tentinh}}</b></div>
								@foreach($thamquan as $tq)
									@if($tq->tinh==$dd->id)
								<div>

									<input type="checkbox" name="diadiem_ngay_{{$tq->id}}" value="{{$tq->gia}}" class="{{ $i }}" >
									  <span data-toggle="tooltip" data-html="true">
									  	<a href="{{route('ctdiadanh',$tq->id)}}" target="_thamquan" title="{{$tq->gia}} VND">{{$tq->tendiadanh}}</a>

									</span>

									</div>@endif
									@endforeach
								@endforeach
							</td>

							<td>
										@foreach($diemden as $dd)
								<div><b>{{$dd->tentinh}}</b></div>
									<div><small> Ăn sáng</small></div>
									@foreach($noianuong as $pl)
									@if($pl->tinh==$dd->id)
								<div>
								<input type="checkbox" name="nhahang_ngay_{{$pl->id}}" value="{{$pl->gia}}" class="{{ $i }}" >
								  <span data-toggle="tooltip" data-html="true">
								  	<a href="{{route('ctnhahang',$pl->id)}}" target="_nhahang" title="{{$pl->gia}} VND">{{$pl->tennhahang}}
								</a>

								</span>
								</div>
								@endif
								@endforeach
	


							<div><small> Ăn trưa</small></div>
								@foreach($noianuong as $pl)
									@if($pl->tinh==$dd->id)
								<div>
								<input type="checkbox" name="nhahang_ngay_{{$pl->id}}" value="{{$pl->gia}}" class="{{ $i }}" >
								  <span data-toggle="tooltip" data-html="true">
								  	<a href="{{route('ctnhahang',$pl->id)}}" target="_nhahang" title="{{$pl->gia}} VND">{{$pl->tennhahang}}
								</a>

								</span>
								</div>
								@endif
								@endforeach




							<div><small> Ăn tối</small></div>
					@foreach($noianuong as $pl)
									@if($pl->tinh==$dd->id)
								<div>
								<input type="checkbox" name="nhahang_ngay_{{$pl->id}}" value="{{$pl->gia}}" class="{{ $i }}" >
								  <span data-toggle="tooltip" data-html="true">
								  	<a href="{{route('ctnhahang',$pl->id)}}" target="_nhahang" title="{{$pl->gia}} VND">{{$pl->tennhahang}}
								</a>

								</span>
								</div>
								@endif
								@endforeach

								@endforeach
						</td>
						<td>
								@foreach($diemden as $dd)
								<div><b>{{$dd->tentinh}}</b></div>

									@foreach($noinghi as $pl)
									@if($pl->tinh==$dd->id)
								<div>
								<input type="checkbox" name="khachsan_ngay_{{$pl->id}}" value="{{$pl->gia}}" class="{{ $i }}" >
								  <span data-toggle="tooltip" data-html="true">
								  	<a href="{{route('ctkhachsan',$pl->id)}}" target="_khachsan" title="{{$pl->gia}} VND">{{$pl->tenkhachsan}}
								</a>

								</span>
								</div>
								@endif
								@endforeach
	@endforeach



									
						</td>
						<td width="100">
							<span style=" float: right;" id="tongdukienngay_{{ $i }}"> 0.0 VND</span>
										<input type="hidden" id="tongngay_{{ $i }}" class="c{{ $i }}">
						</td>


				</tr>

					
						@endfor


			

								<tr> <td colspan="6">
				<div class=" alert alert-info" role="alert">
					Tổng dự kiến tour đã chọn: &nbsp;
					<span style=" float: right;" id="tongdukien"> 0.0 VND</span>
				</div>
					<div class=" animate-box text-center">
											<p><button  type="submit" class="btn btn-primary">Đặt ngay!</button></p>
										</div>
			</td>

			</tr>
			</form>
		</tbody>
		</table>
	</div>
	<!-- END Bảng tính giá tour-->
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	//$(document).ready( function() {
    //$('input[type=date]').val(new Date().toDateInputValue());
   // $('#DateOfArrivalJPN').val('2018-1-2');
//}
//);​
$(document).ready( function()
{
 
$("#tinhgiatour input").click(function(){
	c=this.className;
	tongngay =0;
$.each($("#tinhgiatour input[class="+c+"]:checked"), function(k, v){
	//alert(v.value);
	tongngay += parseInt(v.value);
})
$("#tinhgiatour #tongdukienngay_"+c).html(numberWithCommas(tongngay) +" VND");

//--------------------------------------

	tong =0;
$.each($("#tinhgiatour input:checked"), function(k, v){
	//alert(v.value);
	tong += parseInt(v.value);
})

$("#tongdukien").html(numberWithCommas(tong) +" VND");
});


//============ Khach lẻ ====
$("#tinhgiatour2 input").click(function(){
	c=this.className;
	tongngay =0;
$.each($("#tinhgiatour2 input[class="+c+"]:checked"), function(k, v){
	//alert(v.value);
	tongngay += parseInt(v.value);
})
$("#tinhgiatour2 #tongdukienngay_"+c).html(numberWithCommas(tongngay) +" VND");

//--------------------------------------

tong2 =0;
$.each($("#tinhgiatour2 input:checked"), function(k, v){
	//alert(v.value);
	tong2 += parseInt(v.value);
})

$("#tongdukien2").html(numberWithCommas(tong2) +" VND");
});

});

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
</script>
@endsection
