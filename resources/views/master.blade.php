<!DOCTYPE HTML>
<html>
	<head>
	<base href="{{asset('')}}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Vina Tour</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="_token" content="{{csrf_token()}}" />
  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
		<!--Modal -->
	<link href="css/login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/font-awesome.css">

	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/login-register.js" type="text/javascript"></script>
	   <!-- Script Modal -->
            <script src="js/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script>

         jQuery(document).ready(function(){
            // ĐĂNG NHẬP
            jQuery('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/dangnhap') }}",
                  method: 'post',
                  data: {
                     email: jQuery('#email').val(),
                     password: jQuery('#password').val(),

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
                          if(result.errorLogin)
                    {
                        jQuery('.alert-danger').html('');

                      jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('Email hoặc mật khẩu không đúng');
                    }

                   else{

                    jQuery('.alert-danger').hide();
                        jQuery('.alert-success').html('');
                        jQuery('.alert-success').show();
                            jQuery('.alert-success').append('Đăng nhập thành công. Đang chuyển trang...');
                         setTimeout(function(){
                        location.reload();
                                }, 600);

                   }

                    }
                  }});
               });
            //ĐĂNG KÝ
                        jQuery('#ajaxSubmitReg').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/dangky') }}",
                  method: 'post',
                  data: {
                  	 username: jQuery('#username').val(),
                     emailReg: jQuery('#emailReg').val(),
                     passwordReg: jQuery('#passwordReg').val(),
                     passwordReg_confirmation: jQuery('#passwordReg_confirmation').val()

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
                        jQuery('.alert-success').html('');
                        jQuery('.alert-success').show();
                            jQuery('.alert-success').append('Đăng ký thành công. Đang chuyển trang...');
                         setTimeout(function(){
                        location.reload();
                                }, 600);

                    }
                  }});
               });




            });
      </script>


          <!-- End Script -->



</head>
	<body>
		@include('header')
		@yield('content')
		@include('footer')
