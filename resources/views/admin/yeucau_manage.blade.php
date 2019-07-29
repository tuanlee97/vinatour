@extends('admin.ADtemplate.ADmaster')

        <!-- DataTables Example -->
        @section('ADcontent')
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách yêu cầu</h6>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTableYeuCau" width="100%" cellspacing="0">
                <thead style="text-align:center">
                  <tr>
                    <th>ID</th>
                    <th>ID Khách Hàng</th>
                    <th>Lý do</th>
                
                    <th>Thao tác</th>
                  </tr>
                </thead>
                <tbody style="text-align:center">
                </tbody>
              </table>
            </div>
          </div>

        </div>
        @endsection




@section('ADmodal')
<div id="confirmModal0" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 id="confirmtext" align="center" style="margin:0;">Bạn có muốn cấp quyền hướng dẫn viên cho người dùng này ?</h4>
                <span id="result">

                </span>
            </div>
            <div class="modal-footer">
             <button type="button" name="pheduyet_button" id="pheduyet_button" class="btn btn-success">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 id="confirmtext" align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
                <span id="result">

                </span>
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

 $('#dataTableYeuCau').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('yeucau.index') }}",
  },
  columns:[

   {
    data: 'id',

   },
   {
    data: 'user_id',

   },
      {
    data: 'noidung',

   },

   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });


var idupdate;

 $(document).on('click', '.edit', function(){
   idupdate = $(this).attr('id');
 $('#confirmModal0').modal('show');
 });


  $('#pheduyet_button').click(function(){
  $.ajax({
  	url:"yeucau/update/"+idupdate,
   beforeSend:function(){
    $('#pheduyet_button').text('Phê duyệt');
   },
   success:function(data)
   {
     
      setTimeout(function(){
     $('#confirmModal0').modal('hide');
     $('#dataTableYeuCau').DataTable().ajax.reload();
   }, 1000);
 }

   });
  });




 var user_id;

 $(document).on('click', '.delete', function(){
  user_id = $(this).attr('id');
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){
  $.ajax({
   url:"yeucau/destroy/"+user_id,
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
      $('#dataTableYeuCau').DataTable().ajax.reload();
   }, 1000);
     }
    else{
      setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#dataTableYeuCau').DataTable().ajax.reload();
   }, 1000);
 }

   }
  })
 });

});
</script>
@endsection
