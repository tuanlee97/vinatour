@extends('admin.ADtemplate.ADmaster')

        <!-- DataTables Example -->
        @section('ADcontent')
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
            Danh sách khách hàng</div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTableUser" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="10%">Mã KH</th>
                    <th width="10%">Tên đăng nhập</th>
                    <th width="20%">Email</th>
                    <th width="20%">Mật khẩu</th>
                    <th width="10%">Quyền</th>
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
     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Sửa thông tin khách hàng</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf

           <div class="form-group">
            <label class="control-label col-md-4">Tên đăng nhập : </label>
            <div class="col-md-8">
             <input type="text" name="user_name" id="user_name" class="form-control" />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">Email : </label>
            <div class="col-md-8">
             <input type="text" name="user_email" id="user_email" class="form-control" />
            </div>
           </div>
           <div class="form-group">
            <label class="control-label col-md-4">Quyền : </label>
            <div class="col-md-8">
                <select class="form-control" name="quyen" id="quyen" title="Quyền">
              
               <option value="0">0 - User bình thường</option>
               <option value="1">1 - Hướng dẫn viên</option>
             </select>
            </div>
           </div>

            <div class="form-group">

            <label class="control-label col-md-4">Đổi Mật khẩu : <input class="checkbox" type="checkbox" name="changepass" id="changepass">
             </label>
            <div class="col-md-8">
             <input type="password" name="user_pass" id="user_pass" class="form-control password" />
            </div>
           </div>

            <div  class="form-group cfpassword">
            <label class="control-label col-md-4">Xác nhận lại mật khẩu : </label>
            <div class="col-md-8">
           <input type="password" name="user_cfpass" id="user_cfpass" class="form-control " />
            </div>
           </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Sửa" />
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

 $('#dataTableUser').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('khachhang.index') }}",
  },
  columns:[
   { data: 'id'},
   { data: 'name'},
   { data: 'email'},
   { data: 'password'},
    { data: 'role'},
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
    url:"{{ route('khachhang.update') }}",
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

    
        setTimeout(function(){
     $('#formModal').modal('hide');
     $('#dataTableUser').DataTable().ajax.reload();
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
   url:"khachhang/"+id+"/edit",
   dataType:"json",
   success:function(html){
    $('#user_name').val(html.data.name);
    $('#user_email').val(html.data.email);
    $('#quyen').val(html.data.role);
    $('#user_pass').val("");
    $('#hidden_id').val(html.data.id);
     $('.cfpassword').hide();
     $('.checkbox').prop('checked', false);
     $(".password").prop('disabled',true);
     $("#changepass").click(function(){
                          if($(this).is(":checked"))
                        {
                            $(".password").removeAttr('disabled');
                            $('.cfpassword').show();
                        }
                        else
                        {
                            $(".password").attr('disabled','');
                             $('.cfpassword').hide();
                        }
                });
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
   url:"khachhang/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#dataTableUser').DataTable().ajax.reload();
    }, 1000);
   }
  })
 });

});
</script>
@endsection
