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
        <div class="col-md-9">
            <div class="card"><span id="form_result"></span>
                <div class="card-header">{{ __('Vui lòng nhập thông tin chung cho chuyến đi') }}</div>

                <div class="card-body">
                   
          	          <div class="row">
          	          		 <div class="alert alert-danger" style="display:none"></div>
          	          	<form method="POST" enctype="multipart/form-data" id="formIHQ">
          	          		 @csrf
          	          		<div class="col-md-3">
          	          			<label>Số hiệu chuyến bay</label>
          	          			<input class="form-control" type="text" name="sohieu">
          	          		</div>
          	          		<div class="col-md-2">
          	          			<label>Số ngày ở lại :</label>
          	          			<input class="form-control"type="text" name="songayolai">
          	          		</div>
          	          			<div class="col-md-3">
          	          				<label>Địa chỉ nơi khách nghỉ :</label>
          	          			<input class="form-control"type="text" name="diachi">
          	          			</div>
          	          			<div class="col-md-2">
          	          				<label>SĐT :</label>
          	          			<input class="form-control"type="text" name="">
          	          			</div>
          	          		<div class="col-md-2">
          	          			<br>
          	          				<button type="submit" id="ajaxTTC" class="btn btn-primary" style="height:50px ; font-weight: bold;width: 150px">Xác nhận</button>
          	          			</div>
       
          	          			</form>

          				 </div>
                </div>

            </div>
            <br>
                 			   <div class="table-responsive">
              <table class="table table-bordered" id="dataTableDSKH" width="100%" cellspacing="0">
                <thead style="text-align:center">
                  <tr>
                    <th >STT</th>
                    <th >Fist Name</th>
                     <th>Last Name</th>
                     <th >Date of Birth</th>
                     <th >Country Name</th>
                     <th >City Name</th>
                    <th >Purpose</th>
                    <th >Option1</th>
                    <th >Option2</th>
                    <th >Option3</th>
                    <th>Thao tác</th>
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

 $('#dataTableDSKH').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('quocgia.index') }}",
  },
  columns:[
   {
    data: 'image',
    name: 'image',
    render: function(data, type, full, meta){
     return "<img src={{ URL::to('/') }}/images/flag/" + data + " width='30' class='img-thumbnail' />";
    },

   },
   {
    data: 'tenquocgia',

   },
   {
    data: 'quocnoi',

   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 $('#create_record').click(function(){
     $('#sample_form')[0].reset();
     $('#checkbox').attr('checked',false);
     $('#store_image').empty();
       $('#country_name').val('');
   $('.modal-title').text("Add New Record");
      $('#action_button').val("Add");
      $('#action').val("Add");
       $('#form_result').html('');
      $('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    
    url:"{{ route('quocgia.store') }}",
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

      $('#dataTableCountry').DataTable().ajax.reload();
      setTimeout(function(){

        $('#formModal').modal('hide');
   }, 1000);

     }
     $('#form_result').html(html);
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('quocgia.update') }}",
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
      $('#dataTableCountry').DataTable().ajax.reload();
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
  $.ajax({
   url:"quocgia/"+id+"/edit",
   dataType:"json",
   success:function(html){
       $('#sample_form')[0].reset();
    $('#country_name').val(html.data.tenquocgia);
    $('#store_image').html("<img src={{ URL::to('/') }}/images/flag/" + html.data.image + " width='70' class='img-thumbnail' />");
    $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.image+"' />");
    $('#hidden_id').val(html.data.maquocgia);

    if(html.data.quocnoi==1)  $('#checkbox').attr('checked',true);
    else $('#checkbox').attr('checked',false);
    $('.modal-title').text("Edit New Record");
    $('#action_button').val("Edit");
    $('#action').val("Edit");
    $('#formModal').modal('show');
   }
  })
 });

 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"quocgia/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Delete');
   },
   success:function(data)
   {
     if(data.errors)
     { var html = '';
      html = '<div class="alert alert-danger">';
      html += '<p>' + data.errors + '</p>';
      html += '</div>';
      $('#confirmtext').hide();
      $('#result').html(html);
      setTimeout(function(){
      $('#confirmtext').show();
      $('#result').empty();
      $('#confirmModal').modal('hide');
      $('#dataTableCountry').DataTable().ajax.reload();
   }, 1000);
     }
    else{
      setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#dataTableCountry').DataTable().ajax.reload();
   }, 1000);
 }

   }
  })
 });

});
</script>
		@endsection
