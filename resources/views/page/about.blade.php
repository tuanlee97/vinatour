@extends('master')
@section('content')
<aside id="colorlib-hero">
      @if(session('thongbao'))
                    <script type="text/javascript">
                          jQuery('.alert-danger').html('');
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('Bạn cần đăng nhập để xét duyệt quyền thực hiện chức năng này');
                         $('#loginModal').modal('show');
                    </script>
                        @endif 
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-5.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>VINATOUR</h2>
				   					<h1>Xin tự giới thiệu</h1>
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
									<h2>VỀ CHÚNG TÔI</h2>

								
								</div>
							</div>
						</div>
						<div class="col-three-forth animate-box">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                            <h2>Sứ Mệnh</h2>
                            <div class="row animate-box" >
                                <div class="col-md-12">

                                    <p>Thỏa mãn giá trị đời sống tinh thần và nâng cao chất lượng cuộc sống của khách hàng là nền tảng những giá trị cốt lõi đối với VinaTour.  Những giá trị thiết thực này sẽ luôn là động lực định hướng  cho toàn bộ hoạt động đổi mới, sáng tạo và phát triển sản phẩm dịch vụ- du lịch với số lượng và chất lượng dịch vụ tốt nhất. VinaTour luôn đặt mục tiêu phấn đấu trở thành một công ty dịch vụ du lịch lữ hành có chất lượng và uy tín hàng đầu Việt Nam.</p>

                                    <p>Nhiệm vụ: Đổi mới sáng tạo và phát triển sản phẩm dịch vụ du lịch có chất lượng tốt nhằm đáp ứng nhu cầu đa dạng và phong phú của khách hàng trong nước và quốc tế.</p>

                                    <p>Trách nhiệm: Đảm bảo những giá trị lợi ích của khách hàng cũng như thỏa mãn nhu cầu về an toàn trong ngành dịch vụ du lịch khi khách hàng sử dụng sản phẩm của VinaTour.</p>

                                </div>
                            </div>
            <hr>
      
                    <h1 class="page-header ">Khách hàng nói gì về chúng tôi</h1>
         @if(Auth::guard('web')->check())
        <div class="col-md-9 animate-box">
            <div class="panel panel-default">
                <div class="panel-body animate-box">
                    <form id="postForm">
                        @csrf
                        <textarea class="form-control" name="post" id="post" placeholder="Hãy viết ra suy nghĩ của bạn!!"></textarea>
                        <button type="button" id="postBtn" class="btn btn-primary" style="margin-top:5px;"> Đăng</button>
                    </form>
                </div>
            </div> 
            @else <div class="alert alert-warning">
            Để thực hiện đánh giá , quý khách vui lòng <a id="dangnhapbinhluan"><i class="fa fa-sign-in"></i><b> Đăng nhập</b></a> !
        </div>
            @endif
              
            <div id="postList"></div>
        </div>





        </div>
    </div>
</div>
<!-------------------------------->



					
						</div>
					</div>
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
                             $('#postForm')[0].reset();
                            showPost();
                           
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
             $(document).on('click', '#xoaykien', function(){
                 var id = $(this).attr('value');
                                  $('#confirmModal-del').modal('show');
               
                         $('#ok_button-del').click(function(){
                          $.ajax({
                        type: 'POST',
                        url: 'xoa_ykien/'+id,
                        data: {id:id},
                        dataType: 'json',
                        success: function(kq){
                                       if(kq.success){
                                            Swal.fire({         
                                type: 'success',
                                text: 'Đã xóa phản hồi!',
                                showConfirmButton: false,
                                timer: 1000
                            })
                                 setTimeout(function(){
                                    showPost();
                                 $('#confirmModal-del').modal('hide');
                                                    }, 1000);
                                
                           }
                           
                        }
                    });
                                        });
              
                
            });
                $(document).on('click', '#xoaphanhoi', function(){
                 var id = $(this).attr('value');
              $('#confirmModal-del').modal('show');
               
                         $('#ok_button-del').click(function(){
                         $.ajax({
                        type: 'POST',
                        url: 'xoa_phanhoi/'+id,
                        data: {id:id},
                        dataType: 'json',
                        success: function(kq){
                             if(kq.success){
                                            Swal.fire({         
                                type: 'success',
                                text: 'Đã xóa phản hồi!',
                                showConfirmButton: false,
                                timer: 1000
                            })
                                 setTimeout(function(){
                                    showPost();
                                 $('#confirmModal-del').modal('hide');
                                                    }, 1000);
                                
                           }
                        }
                                     });
                                        });
            });



                  $(document).on('click', '#suaykien', function(){
                        var id = $(this).attr('value');
              
                      
                         $('#commentedit').empty();
                            $.ajax({
                        type: 'GET',
                        url: 'sua_ykien/'+id,
                      
                        dataType: 'json',
                        success: function(kq){
                              $('#action').val("YKien");
                            $('#commentedit').html(kq.item.post);
                             $('#hidden_id').val(kq.item.id);
                        },
                    });
                    $('#EditComment').modal('show');
                
                
            });
                  $(document).on('click', '#suaphanhoi', function(){
                        var id = $(this).attr('value');
              
                        
                         $('#commentedit').empty();
                            $.ajax({
                        type: 'GET',
                        url: 'sua_phanhoi/'+id,
                      
                        dataType: 'json',
                        success: function(kq){
                            $('#action').val("PhanHoi");
                            $('#commentedit').html(kq.item.comment);
                                $('#hidden_id').val(kq.item.id);
                        },
                    });
                    $('#EditComment').modal('show');
                
                
            });
                    $('#sample_form_edit').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'YKien')
  {
   $.ajax({
    url:'save_ykien',
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
   if(data.errors) Swal.fire({         
                                type: 'error',
                                text: 'Bạn chưa nhập nội dung!',
                                showConfirmButton: false,
                                timer: 1000
                            })
  
     if(data.success)
     {  
                        Swal.fire({
                                type: 'success',
                                text: 'Đã sửa ý kiến!',
                                showConfirmButton: false,
                                timer: 1000
                            })
     
        
      setTimeout(function(){
         $('#sample_form_edit')[0].reset();
        $('#EditComment').modal('hide');
        showPost();
   }, 1000);

     }
    }
   })
  }

  if($('#action').val() == "PhanHoi")
  {
 $.ajax({
    url:'save_phanhoi',
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
    
     if(data.errors) Swal.fire({         
                                type: 'error',
                                text: 'Bạn chưa nhập nội dung!',
                                showConfirmButton: false,
                                timer: 1000
                            })
  
     if(data.success)
     {
                        Swal.fire({
                                type: 'success',
                                text: 'Đã sửa phản hồi!',
                                showConfirmButton: false,
                                timer: 1000
                            })
     

      setTimeout(function(){
         $('#sample_form_edit')[0].reset();
         
        $('#EditComment').modal('hide');
        showPost();
   }, 1000);

     }
     
    }
   })
  }
 });

  $(document).on('click', '#dangnhapbinhluan', function(){
           
                    $('#loginModal').modal('show');
                
                
            });

            $(document).on('click', '.submitComment', function(){
                var id = $(this).val();
                var post=$('#commenttext'+id).val();
              
                if(post==''){

                    alert('Please write a Comment First!');
                }
                else{
                    var commentForm = $('#commentForm_'+id).serialize();
                    $.ajax({
                        type: 'POST',
                        url: 'writecomment',
                        data: commentForm,
                        success: function(){
                              $('#commentForm_'+id)[0].reset();
                            getComment(id);
                          
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
