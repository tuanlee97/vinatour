@extends('admin.ADtemplate.ADmaster')

        <!-- DataTables Example -->
        @section('ADcontent')
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
            Danh sách Loại Tour</div>
          <div class="card-body">
            <div align="right">
            <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Thêm loại tour</button>
          </div></br>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTableLT" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th >Tên loại tour</th>
                    <th>Số ngày</th>
                    <th>Số đêm</th>
                    <th >Thao tác</th>
                  </tr>
                </thead>

                <tbody>


                </tbody>
              </table>
            </div>
          </div>

        </div>
        @endsection




@section('ADmodal')
<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Record</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf

           <div class="form-group">
            <label class="control-label col-md-4">Tên Loại tour : </label>
            <div class="col-md-8">
             <input type="text" name="tenloai" id="tenloai"class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Số ngày : </label>
            <div class="col-md-8">
             <input type="text" name="songay" id="songay"class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Số đêm : </label>
            <div class="col-md-8">
             <input type="text" name="sodem" id="sodem"class="form-control" />
            </div>
           </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('ADscript')
<script>
$(document).ready(function(){

 $('#dataTableLT').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('loaitour.index') }}",
  },
  columns:[
   { data: 'tenloai'},
   { data: 'songay'},
   { data: 'sodem'},
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 $('#create_record').click(function(){

   $('.modal-title').text("Add New Record");
   $('#tenloai').val('');
   $('#songay').val('');
   $('#sodem').val('');
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
    url:"{{ route('loaitour.store') }}",
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
         if(data.ngay)
     {
      html = '<div class="alert alert-danger">'+ data.ngay + '</div>';
 
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      $('#dataTableLT').DataTable().ajax.reload();
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
    url:"{{ route('loaitour.update') }}",
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
      if(data.ngay)
     {
      html = '<div class="alert alert-danger">'+ data.ngay + '</div>';
 
     }
      if(data.ten)
     {
      html = '<div class="alert alert-danger">'+ data.ten + '</div>';
 
     }
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();

      $('#dataTableLT').DataTable().ajax.reload();
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
   url:"loaitour/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#tenloai').val(html.data.tenloai);
    $('#songay').val(html.data.songay);
    $('#sodem').val(html.data.sodem);
    $('#hidden_id').val(html.data.id);
      $('.modal-title').text("Edit New Record");
    $('#action_button').val("Sửa");
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
   url:"loaitour/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
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
      $('#dataTableLT').DataTable().ajax.reload();
   }, 1000);
     }
    else{
      setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#dataTableLT').DataTable().ajax.reload();
   }, 1000);
   }
   }
  })
 });

});
</script>
@endsection
