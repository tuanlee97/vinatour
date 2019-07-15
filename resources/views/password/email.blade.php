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
				   					<h1>Lấy lại mật khẩu</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="about-flex">
						<div class="col-one-forth aside-stretch animate-box">
							<div class="row">
								<div class="col-md-12 about">
									<h2>Lấy lại mật khẩu</h2>

								
								</div>
							</div>
						</div>
						<div class="col-three-forth animate-box">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"><span id="form_result"></span>
                <div class="card-header">{{ __('Vui lòng nhập địa chỉ email để lấy lại mật khẩu') }}</div>

                <div class="card-body">
                   
                    <form id="sample_form" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="emailreset" type="email" class="form-control @error('email') is-invalid @enderror" name="emailreset" value="{{ old('emailreset') }}" required autocomplete="emailreset" autofocus/>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                          
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Gửi link khôi phục mật khẩu') }}
                                </button>
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
			</div>
		</div>

<script>
	$(document).ready(function(){
 $('#sample_form').on('submit', function(event){
  event.preventDefault();

  			
  
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ route('post.reset.password') }}",
                  method: 'post',
                  data: {
                  	 emailrs: $('#emailreset').val(),

                  },
 dataType:"json",
  processing: true,
                  success: function(data)    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
       html += '<p><strong>LỖI XÁC THỰC : </strong>' + data.errors + '</p>';
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success"><p><strong>THÀNH CÔNG : </strong>' + data.success + '</p></div>';
     }
     $('#form_result').html(html);
    }});
      



	});
});

</script>

		@endsection
