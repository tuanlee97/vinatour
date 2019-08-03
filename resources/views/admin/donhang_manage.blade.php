@extends('admin.ADtemplate.ADmaster')

        <!-- DataTables Example -->
        @section('ADcontent')
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
            Danh sách Đơn đặt tour</div>
          <div class="card-body">
               <div align="right">
      <button type="button" name="xuly" id="xuly" class="btn btn-success btn-sm">Xử Lý</button>
     </div>
     <br/>
             <div class="table-responsive " style="text-align: center;">
              <table class="table table-bordered donhang" id="dataTableDonHang" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th >Mã Tour</th>
                    <th>Mã khách hàng</th>
                    <th>Số Người Lớn</th>
                    <th>Số trẻ em</th>
                    <th>Số em bé</th>
                    <th>Tổng tiền</th>
                    <th>Tình trạng</th>
                    <th>Thanh toán</th>
               
                   <th >Chọn tất cả<input style="float: right;" type="checkbox" id="checkall" class="checkall"/></th>
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
                           <th >Tên</th>
                            <th >Giới tính</th>
                             <th>SĐT</th>
                            <th >Địa chỉ</th>
                            <th >Quốc gia</th>
                            <th>Passport/CMND</th>
                            <th >Loại</th>
                            <th>Giá tiền</th>
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
                <h2 class="modal-title">Xử lí</h2>
            </div>
            <div class="modal-body">
                <h4 id="confirmtext" align="center" style="margin:0;">Bạn có chắc muốn xử lý những đơn này?</h4>
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

 $('#dataTableDonHang').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('donhang.index') }}",
  },

  columns:[
   { data: 'tentour'

 },
   { data: 'username'},
   { data: 'songuoilon'},
   { data: 'sotreem',
   render:function(data,type,full,meta){
    if(data == 0 || data==null)
    return "";
  else return data;
}

 },
   { data: 'soembe',
   render:function(data,type,full,meta){
    if(data == 0 || data==null)
    return "";
  else return data;
}
 },
   { data: 'tongtien'},
   { data:'status',
render:function(data,type,full,meta){
    return ' <span style="color:red;font-weight:bold">Chưa xử lý</span>';
}},
   { data: 'thanhtoan',

    render: function(data, type, full, meta)
    {
      if(data=='Thanh toán VNPAY')
     return "<img src={{ URL::to('/') }}/admin/images/vnpay.png width='70' class='img-thumbnail' />";
   else return data;
    }



 },
   
   {
    data: 'action',
    name: 'status1',
    orderable: false,
    searcheable:false
   }
  ]
 });

$('.checkall').change(function() {
    var checkboxes = $(this).closest('.donhang').find(':checkbox');
    checkboxes.prop('checked', $(this).is(':checked'));
});

var id;
 $(document).on('click', '#xuly', function(){
  id = [];
   $('#ok_button').text('OK');
$('.status:checked').each(function(){
                id.push($(this).val());
            });
  $('#confirmModal').modal('show');
 });

 $('#ok_button').click(function(){

 if(id.length > 0)
            {
              
                $.ajax({
                    url:"{{ route('donhang.XuLy')}}",
                    method:"post",
                    data: {id:id},
                     beforeSend:function(){
    $('#ok_button').text('Đang xử lý...');
   },
                    success:function(data)
                    {
                       
                        setTimeout(function(){
               $('#confirmModal').modal('hide');
                 $('#dataTableDonHang').DataTable().ajax.reload();
              }, 1000);
                    }
                });
            }
            else
            { $('#confirmModal').modal('hide');
                alert("Bạn chưa chọn đơn đặt tour cần xử lý");
            }



 });


 $(document).on('click', '.details', function(){
   var id_details = $(this).attr('id');
   $('#thongtin').empty();
  $.ajax({
   url:"donhang/"+id_details+"/details",
   dataType:"json",
   success:function(html){
    console.log(html);
    var $thongtin = '';
  $.each(html.data,function(key,value){
    $thongtin+='<tr><td>'+value.ten+'</td><td>'+value.gioitinh+'</td><td>'+value.sdt+'</td><td>'+value.diachi+'</td><td>'+value.quocgia+'</td><td>'+value.passport+'</td><td>'+value.loai+'</td><td>'+value.giatien+'</td></tr>';
    
    });
   $thongtin+=' <tr> <td colspan="8"> <div >Tổng tiền: &nbsp; <span style=" float: right;">'+html.donhang.tongtien+'</span></div>  </td>  </tr>';
$('#thongtin').append($thongtin);
    $('#confirmModal0').modal('show');
   }
  })
 });
});
</script>

@endsection
