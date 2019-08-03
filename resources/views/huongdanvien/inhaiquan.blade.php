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
				   					<h2>VINATOUR</h2>
				   					<h1>IN GIẤY HẢI QUAN</h1>
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
									<h2>IN GIẤY HẢI QUAN</h2>

								
								</div>
							</div>
						</div>
						<div class="col-three-forth animate-box">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card"><span id="form_result"></span>
                <div class="card-header">{{ __('Vui lòng nhập thông tin chung cho chuyến đi') }}</div>

                <div class="card-body">
                   
          	          <div class="row">
          	          		 <div class="alert alert-danger" style="display:none"></div>
          	          	<form method="POST" enctype="multipart/form-data" id="formIHQ">
          	          		 @csrf
          	          		<div class="col-md-3">
          	          			<label>Số hiệu chuyến bay</label>
          	          			<input class="form-control" type="text" name="sohieu"id="sohieu">
          	          		</div>
          	          		<div class="col-md-2">
          	          			<label>Số ngày ở lại :</label>
          	          			<input class="form-control"type="text" name="songayolai" id="songayolai">
          	          		</div>
          	          			<div class="col-md-3">
          	          				<label>Địa chỉ nơi khách nghỉ :</label>
          	          			<input class="form-control"type="text" name="diachi" id="diachi">
          	          			</div>
          	          			<div class="col-md-2">
          	          				<label>SĐT :</label>
          	          			<input class="form-control"type="text" name="sdt" id="sdt">
          	          			</div>
          	          		<div class="col-md-2">
          	          			<br>
          	          				<button type="submit" id="ajaxTTC" class="btn btn-primary" style="height:50px ; font-weight: bold;width: 150px">Xác nhận</button>
          	          			</div>
       
          	          			</form>

          				 </div>
                </div>

            </div>
            <hr>
             <div align="left" id="hidediv" style="display: none;">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Thêm Khách</button>
     </div>
  
                 			   <div class="table-responsive" id="hidetable" style="display: none;" >
              <table class="table table-bordered" id="dataTableDSKH" width="100%" cellspacing="0">
                <thead style="text-align:center">
                  <tr>
                    <th>Chỉnh sửa</th>
                    <th >Fist Name</th>
                     <th>Last Name</th>
                     <th >Date of Birth</th>
                     <th >Country</th>
                     <th >City</th>
                    <th >Purpose</th>
                    <th >Opt1</th>
                    <th >Opt2</th>
                    <th >Opt3</th>
                    <th>In</th>
                  </tr>
                </thead>
                <tbody style="text-align:center">
                </tbody>
              </table>
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

  $('#ajaxTTC').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/thongtinchung') }}",
                  method: 'post',
                  data: {
                     sohieu: jQuery('#sohieu').val(),
                     songayolai: jQuery('#songayolai').val(),
                     diachi: jQuery('#diachi').val(),
                     sdt: jQuery('#sdt').val()

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
                                            Swal.fire({     
                            type: 'success',
                text: 'Đã cập nhập!',
                showConfirmButton: false,
                  timer: 1500
              }

                    )
 $('#hidediv').attr('style',"display: block;");                                           
$('#hidetable').attr('style',"display: block;");


$('#dataTableDSKH').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('danhsachin.index') }}",
  },
  columns:[ 

     {data: 'action',
      name: 'action',
      orderable: false},
   
  
   {data: 'firstname',},
   {data: 'lastname',},
   {data: 'birthday',},
   {data: 'country',},
   {data: 'city',},
   {data: 'purpose',},
   {data: 'option1',},
   {data: 'option2',},
   {data: 'option3',},
{data: 'print',
      name: 'print',
      orderable: false},
  ]
 });
                    }
                  }});
               });


 $('#create_record').click(function(){

     $('#sample_form')[0].reset();
     $('#checkbox').attr('checked',false);
     $('#store_image').empty();
       $('#country_name').val('');
   $('.modal-title').text("Thêm Hành Khách");
      $('#action_button').val("Thêm");
      $('#action').val("Add");
       $('#form_result').html('');
      $('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    
    url:"{{ route('danhsachin.store') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {

      html = '<div class="alert alert-success">' + data.success + '</div>';

      $('#dataTableDSKH').DataTable().ajax.reload();
  

     }
     $('#form_result').html(html);
      
           setTimeout(function(){

        $('#form_result').html('');
   }, 2000);
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('danhsachin.update') }}",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
     var html = '';
     if(data.errors)
     {
      html = '<div class="alert alert-danger">';
      for(var count = 0; count < data.errors.length; count++)
      {
       html += '<p>' + data.errors[count] + '</p>';
      }
      html += '</div>';
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';

      $('#store_image').html('');
      $('#form_result').html(html);
      $('#dataTableDSKH').DataTable().ajax.reload();
      setTimeout(function(){

        $('#formModal').modal('hide');
   }, 1000);
     }

   $('#form_result').html(html);
    }
   });
  }
 });

 $(document).on('click', '.edit', function(){
  var id = $(this).attr('id');
  $('#form_result').html('');
     $('#sample_form')[0].reset();
 
  $.ajax({
   url:"danhsachin/"+id+"/edit",
   dataType:"json",
   success:function(html){

    
    $('#first_name').val(html.data.firstname);
    $('#last_name').val(html.data.lastname);
    $('#birthday').val(html.data.birthday);
     $('#country_name').val(html.data.country);
      $('#city_name').val(html.data.city);
       $('#purpose').val(html.data.purpose);
       if(html.data.option1==1)  $('#opt1').attr('checked',true);
    else $('#opt1').attr('checked',false);
     if(html.data.option2==1)  $('#opt2').attr('checked',true);
    else $('#opt2').attr('checked',false);
     if(html.data.option3==1)  $('#opt3').attr('checked',true);
    else $('#opt3').attr('checked',false);
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("Sửa Hành Khách");
    $('#action_button').val("Sửa");
    $('#action').val("Edit");
    $('#formModal').modal('show');
   }
  })
 });

 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
   $('#ok_button').text('OK');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"danhsachin/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Đang xóa...');
   },
   success:function(data)
   {
     setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#dataTableDSKH').DataTable().ajax.reload();
   }, 600);

   }
  })
 });


 
});








</script>
		@endsection
