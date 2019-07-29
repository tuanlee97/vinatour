@extends('admin.ADtemplate.ADmaster')

        <!-- DataTables Example -->
     
     @section('ADcontent')
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách Tự chọn</h6>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table table-bordered" id="dataTableTuChon" width="100%" cellspacing="0">
                <thead style="text-align:center">
                  <tr>
                    <th>ID</th>
                    <th >ID Tour</th>
                    <th >ID Khách Hàng</th>
                    <th>Tổng tiền</th>
                    <th >Thao tác</th>
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
    <div class="modal-dialog" style="  max-width: 1200px; margin: 1.75rem auto;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Thông tin chi tiết</h2>
            </div>
            <div class="modal-body">
                
                
 <table width="100%" align="center" cellpadding="0" cellspacing="0" border="1" class="">
                                        <thead>
                          <tr>
                           <th >Ngày</th>
                            <th >Tỉnh</th>
                             <th>Địa danh</th>
                            <th >Nhà hàng</th>
                            <th >Khách sạn</th>
                            <th>Tổng ngày</th>
                          </tr>
                        </thead>
                                       <tbody id="thongtin"> 
                                          
                                        
                                       
                                 
                                       </tbody>
                                    </table>
                </span>
            </div>
            <div class="modal-footer">
             
                <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h2 class="modal-title">Xóa</h2>
            </div>
            <div class="modal-body">
                <h4 id="confirmtext" align="center" style="margin:0;">Bạn có chắc muốn xóa?</h4>
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
<script >
  $(document).ready(function(){

 $('#dataTableTuChon').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('tuchon.index') }}",
  },
  columns:[
  {
    data: 'id',

   },
   {
    data: 'tour_id',

   },
   {
    data: 'user_id',

   },
      {
    data: 'tongtien',

   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });


 $(document).on('click', '.details', function(){
   var id_details = $(this).attr('id');
   $('#thongtin').empty();
  $.ajax({
   url:"tuchon/"+id_details+"/details",
   dataType:"json",
   success:function(html){
    console.log(html);
    var $thongtin = '';
  $.each(html.data,function(key,value){
    $thongtin+='<tr><td>'+value.lichtrinhngay+'</td><td>'+value.tinh+'</td><td>'+value.diadanh+'</td><td>'+value.nhahang+'</td><td>'+value.khachsan+'</td><td>'+value.tongtienngay+'</td></tr>';
    
    });
   $thongtin+=' <tr> <td colspan="6"> <div >Tổng dự kiến tour đã chọn: &nbsp; <span style=" float: right;">'+html.tongtien.tongtien+'</span></div>  </td>  </tr>';
$('#thongtin').append($thongtin);
    $('#confirmModal0').modal('show');
   }
  })
 });
 $(document).on('click','.delete',function(){
  var id_tuchon = $(this).attr('id');
  $('#ok_button').text('OK');
  $('#confirmModal').modal('show');

  $('#ok_button').click(function(){
  $.ajax({
   url:"tuchon/destroy/"+id_tuchon,
   beforeSend:function(){
    $('#ok_button').text('Đang xóa...');
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
      $('#dataTableTuChon').DataTable().ajax.reload();
   }, 1000);
     }
    else{
      setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#dataTableTuChon').DataTable().ajax.reload();
   }, 1000);
 }

   }
  })
 });
   });
 });
</script>
@endsection