@extends('master')
@section('content')
<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-5.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>by vinatour.tk</h2>
				   					<h1>Hồ sơ cá nhân</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-about" >
			<div class="container">
				<div class="row">
					<div class="about-flex" >
						<div class="col-one-forth aside-stretch animate-box">
							<div class="row" >
								<div class="col-md-12 about">
									<h2>Hồ sơ cá nhân</h2>

								
								</div>
							</div>
						</div>
						<div class="col-three-forth animate-box">
															<ul class="nav nav-pills" >
  <li class="nav-item active">
    <a class="nav-link active" data-toggle="pill" href="#info">Cập nhập thông tin</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="pill" href="#changepass">Đổi mật khẩu</a>
  </li>
  @if($isHDV==0)
  <li class="nav-item">
    <a class="nav-link" data-toggle="pill" href="#HDV">Yêu cầu làm HDV</a>
  </li>
  @endif
</ul>

<!-- Tab panes -->
 <div class="col-md-8">
<div class="tab-content">
	<!-- Hồ sơ cá nhân -->
  <div class="tab-pane container active" id="info" ><h2>THÔNG TIN CÁ NHÂN</h2>
  	<div class="card-body">
  		 <div class="alert alert-danger" style="display:none"></div>
                                  
<form method="POST" enctype="multipart/form-data">
	 @csrf
	<div class="form-group row">
		<label class="col-md-2 col-form-label ">Tên tài khoản :</label>
		<div class="col-md-4">  
			<input class="form-control" type="text" id="nameuser" name="nameuser" value="{{ Auth::user()->name }} ">
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2 col-form-label ">Địa chỉ email :</label>
		<div class="col-md-4">  
			<input class="form-control" type="email" id="emailuser" name="emailuser" required="email" value="{{ Auth::user()->email }} ">
		</div>
	</div>
	<div class="form-group row" >
		<button type="submit" id="ajaxLuu" class="btn btn-default" style="color: #337ab7; font-weight: bold;width: 150px">Lưu</button>
	</div>
	
	
</form>
</div>
</div>


<!-- Đổi mật khẩu -->
  <div class="tab-pane container fade" id="changepass"><h2>ĐỔI MẬT KHẨU</h2>
  	<div class="card-body">
  		 <div class="alert alert-danger" style="display:none"></div>
                                  
<form method="POST" enctype="multipart/form-data" id="formMK">
	 @csrf
	<div class="form-group row">
		<label class="col-md-2 col-form-label ">Mật khẩu cũ :</label>
		<div class="col-md-4">  
			<input class="form-control" type="password" id="oldpass" name="oldpass" >
		</div>
	</div>

	<div class="form-group row">
		<label class="col-md-2 col-form-label ">Mật khẩu mới :</label>
		<div class="col-md-4">  
			<input class="form-control" type="password" id="newpass" name="newpass" >
		</div>
	</div>
	<div class="form-group row">
		<label class="col-md-2 col-form-label ">Xác nhận lại mật khẩu :</label>
		<div class="col-md-4">  
			<input class="form-control" type="password" id="newpass_cf" name="newpass_cf" >
		</div>
	</div>
	<div class="form-group row" >
		<button type="submit" id="ajaxDMK" class="btn btn-default" style="color: #337ab7; font-weight: bold;width: 150px">Đổi mật khẩu</button>
	</div>
	
	
</form>
</div></div>
  
  <!-- Hướng dẫn viên -->
  <div class="tab-pane container fade" id="HDV"><h2>XIN CẤP QUYỀN HƯỚNG DẪN VIÊN</h2>
  	<div class="card-body"> 
@if($isSended)
       <div class="alert alert-warning" style="width: 500px"><b>YÊU CẦU CỦA BẠN ĐANG CHỜ XÉT DUYỆT !<b><br>
       Chúng tôi đã nhận được yêu cầu của bạn, chúng tôi sẽ xử lí trong thời gian sớm nhất và thông báo kết quả qua email của bạn !</div>
@else

      <div class="alert alert-danger" style="display:none;width: 500px"></div>
      <form method="POST" enctype="multipart/form-data" id="formHDV">
   @csrf
  <div class="form-group shadow-textarea">
  <label for="exampleFormControlTextarea6">Lý do</label>
  <textarea class="form-control z-depth-1" id="lydo" rows="3" placeholder="Ghi lý do bạn muốn trở thành hướng dẫn viên..."style="width: 500px"></textarea>
</div>
  <div class="form-group row">
    <p style="width: 900px" >Với quyền hướng dẫn viên , bạn sẽ được hệ thống cấp thêm chức năng khi thao tác trên website.<br>
    Nhấn vào nút Yêu cầu bên dưới để gửi yêu cầu cấp quyền. 
    Hệ thống sẽ xử lý yêu cầu của bạn trong thời gian sớm nhất.<br>
    Để được hỗ trợ nhanh nhất, vui lòng liên hệ hotline : 08081508.<p>
  </div>
	<div class="form-group row" >
		<button type="submit"  data-toggle="modal" data-target="#logoutModal" class="btn btn-default" style="color: #337ab7; font-weight: bold;width: 150px">Yêu Cầu</button>
	</div>
	
	</form>
@endif
</div>
</div>




</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
 <script>

         jQuery(document).ready(function(){
            //ho sơ ca nhan
            jQuery('#ajaxLuu').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/changeprofile') }}",
                  method: 'post',
                  data: {
                     email: jQuery('#emailuser').val(),
                     name: jQuery('#nameuser').val(),

                  },
                  success: function(result){
                    if(result.errors)
                    {
                        jQuery('.alert-danger').html('');

                        jQuery.each(result.errors, function(key, value){
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<li>' +value+'</li>');
                        });
                    }
                    else
                    {
                          if(result.trungemail)
                    {
                        jQuery('.alert-danger').html('');

                      jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('Email này đã có người đăng kí !');
                    }

                   else{

                    jQuery('.alert-danger').hide();
                        jQuery('.alert-success').html('');
                       
                        
                         	Swal.fire({  		
                         		type: 'success',
 					 			text: 'Đã cập nhập lại thông tin!',
 					 			showConfirmButton: false,
  timer: 1500
 					 		}

										)
                      
                               

                   }

                    }
                  }});
               });
            ////////Đổi mật khẩu


            jQuery('#ajaxDMK').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/changepass') }}",
                  method: 'post',
                  data: {
                     old: jQuery('#oldpass').val(),
                     new: jQuery('#newpass').val(),
                     new_cf: jQuery('#newpass_cf').val(),
                  },
                  success: function(result){
                  		if(result.wrong)
                    {
                        jQuery('.alert-danger').html('');

                      jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('Mật khẩu cũ không đúng !');
                    }





                   
                    else
                    {
                           if(result.errors)
                    {
                        jQuery('.alert-danger').html('');

                        jQuery.each(result.errors, function(key, value){
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<li>' +value+'</li>');
                        });
                    }

                   else{

                    jQuery('.alert-danger').hide();
                       $('#formMK')[0].reset();
                       
                        
                         	Swal.fire({  		
                         		type: 'success',
 					 			text: 'Đã cập nhập lại mật khẩu!',
 					 			showConfirmButton: false,
  								timer: 1500
 					 		}

										)
                      
                               

                   }

                    }
                  }});
               });
      ////////ĐĂng kí HDV


            jQuery('#ajaxHDV').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/dangkihdv') }}",
                  method: 'post',
                  data: {
                     lydo: jQuery('#lydo').val(),
                    
                  },
                  success: function(result){
            			  if(result.errors)
                    {
                        jQuery('.alert-danger').html('');

                        jQuery.each(result.errors, function(key, value){
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<li>' +value+'</li>');
                        });
                  }
                    else
                    {
                           
                           jQuery('.alert-danger').hide();
                       $('#formHDV')[0].reset();
                       
                        
                          Swal.fire({     
                            type: 'success',
                            title :'Đã gửi đề nghị',
                text: 'Chúng tôi đã nhận được yêu cầu của bạn, chúng tôi sẽ xử lí trong thời gian sớm nhất và thông báo kết quả qua email của bạn !',
                showConfirmButton: false,
                 
              })
                          //
                          setTimeout(function(){
                        location.reload();
                                }, 3000);

                    }
                  }

              });
            });

        });
          
      </script>

		@endsection
