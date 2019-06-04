@extends('admin.ADtemplate.ADmaster')

        <!-- DataTables Example -->
        @section('ADcontent')
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách Loại Tour</div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTableLT" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="10%">Mã loại tour</th>
                    <th width="20%">Tênloại tour</th>
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
            <label class="control-label col-md-4">Tên Loại tour : </label>
            <div class="col-md-8">
            <select name="tenloai" id="tenloai" title="Chọn Loại tour">
               @foreach($loaitour as $lt)
               <option value="{{$lt->maloai}}">{{$lt->tenloai}}</option>
               @endforeach
             </select>
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
   { data: 'maloai'},
   { data: 'tenloai'},
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });



 $('#sample_form').on('submit', function(event){
  event.preventDefault();


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
     if(data.success)
     {
      html = '<div class="alert alert-success">' + data.success + '</div>';
      $('#sample_form')[0].reset();
      
      $('#dataTableLT').DataTable().ajax.reload();
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
    $('#tenloai').val(html.data.name);
   
    $('#hidden_id').val(html.data.maloai);
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
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#dataTableLT').DataTable().ajax.reload();
    }, 1000);
   }
  })
 });

});
</script>
@endsection
