@extends('admin.ADtemplate.ADmaster')

        <!-- DataTables Example -->
        @section('ADcontent')
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
            Danh sách Tỉnh</div>
          <div class="card-body">
               <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Thêm Tỉnh</button>
     </div>
     <br/>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTableTinh" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="10%">Quốc gia</th>
                    <th width="70%">Tên tỉnh</th>
                    <th width="20%">Thao tác</th>

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
            <label class="control-label col-md-4">Tên Quốc Gia : </label>
            <div class="col-md-8">

             <select name="country_name" id="country_name" title="Chọn quốc gia">
               @foreach($quocgia as $qg)
               <option value="{{$qg->maquocgia}}">{{$qg->tenquocgia}}</option>
               @endforeach
             </select>
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Tên Tỉnh : </label>
            <div class="col-md-8">
             <input type="text" name="tentinh" id="tentinh" class="form-control" />

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

 $('#dataTableTinh').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('tinh.index') }}",
  },
  columns:[
   {
     data: 'quocgia',

   },
   {
    data: 'tentinh',

   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });

 $('#create_record').click(function(){
  $('.modal-title').text("Add New Record");
     $('#action_button').val("Add");
     $('#action').val("Add");
     $('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
   $.ajax({
    url:"{{ route('tinh.store') }}",
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
       setTimeout(function(){
     $('#formModal').modal('hide');
     $('#dataTableTinh').DataTable().ajax.reload();
    }, 1000);
     }
     $('#form_result').html(html);
    }
   })
  }

  if($('#action').val() == "Edit")
  {
   $.ajax({
    url:"{{ route('tinh.update') }}",
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
       setTimeout(function(){
     $('#formModal').modal('hide');
     $('#dataTableTinh').DataTable().ajax.reload();
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
   url:"tinh/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#country_name').val(html.data.quocgia);
    $('#tentinh').val(html.data.tentinh);
    $('#hidden_id').val(html.data.matinh);
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
   url:"tinh/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#dataTableTinh').DataTable().ajax.reload();
    }, 1000);
   }
  })
 });

});
</script>
@endsection
