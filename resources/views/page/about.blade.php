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
				   					<h2>by colorlib.com</h2>
				   					<h1>About us</h1>
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
									<h2>About</h2>

									<ul>
										<li><a href="{{route('about')}}">Sứ Mệnh</a></li>
										<li><a href="{{route('lienhe')}}">Connect with us</a></li>
										<li><a href="{{route('about')}}">Faqs</a></li>
										<li><a href="#">Career</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-three-forth animate-box">
							<h2>Sứ Mệnh</h2>
							<div class="row">
								<div class="col-md-12">

									<p>Thỏa mãn giá trị đời sống tinh thần và nâng cao chất lượng cuộc sống của khách hàng là nền tảng những giá trị cốt lõi đối với VinaTour.  Những giá trị thiết thực này sẽ luôn là động lực định hướng  cho toàn bộ hoạt động đổi mới, sáng tạo và phát triển sản phẩm dịch vụ- du lịch với số lượng và chất lượng dịch vụ tốt nhất. VinaTour luôn đặt mục tiêu phấn đấu trở thành một công ty dịch vụ du lịch lữ hành có chất lượng và uy tín hàng đầu Việt Nam.</p>

									<p>Nhiệm vụ: đổi mới sáng tạo và phát triển sản phẩm dịch vụ du lịch có chất lượng tốt nhằm đáp ứng nhu cầu đa dạng và phong phú của khách hàng trong nước và quốc tế.</p>

									<p>Trách nhiệm: Đảm bảo những giá trị lợi ích của khách hàng cũng như thỏa mãn nhu cầu về an toàn trong ngành dịch vụ du lịch khi khách hàng sử dụng sản phẩm của VinaTour.</p>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- <div id="colorlib-testimony" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>Our Satisfied Guests says</h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2 animate-box">
						<div class="owl-carousel2">
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person1.jpg);"></span>
									<span class="user">Alysha Myers</span>
									<small>Miami Florida, USA</small>
									<blockquote>
										<p>" A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person2.jpg);"></span>
									<span class="user">James Fisher</span>
									<small>New York, USA</small>
									<blockquote>
										<p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person3.jpg);"></span>
									<span class="user">Jacob Webb</span>
									<small>Athens, Greece</small>
									<blockquote>
										<p>Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->

<hr>
	<div class="container">
    <h1 class="page-header ">Bình Luận</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form id="postForm">
                    	@csrf
                        <textarea class="form-control" name="post" id="post" placeholder="Hãy viết ra suy nghĩ của bạn!!"></textarea>
                        <button type="button" id="postBtn" class="btn btn-primary" style="margin-top:5px;"> Đăng</button>
                    </form>
                </div>
            </div>
            <div id="postList"></div>
        </div>
    </div>
</div>
 <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            showPost();

            $('#postBtn').click(function(){
                var post = $('#post').val();
                if(post==''){
                    alert('Xin hãy nhập bình luận vào!');
                    $('#post').focus();
                }

                else{
                    var postForm = $('#postForm').serialize();
                    $.ajax({
                        type: 'POST',
                        url: 'post',
                        data: postForm,
                        dataType: 'json',
                        success: function(){
                            showPost();
                            $('#postForm')[0].reset();
                        },
                    });
                }
            });

            $(document).on('click', '.comment', function(){
                var id = $(this).val();
                if($('#commentField_'+id).is(':visible')){
                    $('#commentField_'+id).slideUp();
                }
                else{
                    $('#commentField_'+id).slideDown();
                    getComment(id);
                }
            });

            $(document).on('click', '.submitComment', function(){
                var id = $(this).val();
                var post=$('commenttext').val();
                if($('#commenttext').val()==''){
                    alert('Please write a Comment First!');
                }
                else{
                    var commentForm = $('#commentForm_'+id).serialize();
                    $.ajax({
                        type: 'POST',
                        url: 'writecomment',
                        data: commentForm,
                        success: function(){
                            getComment(id);
                            $('#commentForm_'+id)[0].reset();
                        },
                    });
                }
                    
            });
         
        });

        function showPost(){
            $.ajax({
                url: 'show',
                success: function(data){
                    $('#postList').html(data); 
                },
            });
        }

        function getComment(id){
            $.ajax({
                url: 'getcomment',
                data: {id:id},
                success: function(data){
                    $('#comment_'+id).html(data); 
                }
            });
        }
    </script>

		@endsection
