@extends('admin.ADtemplate.ADmaster')

        <!-- DataTables Example -->
        @section('ADcontent')
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách yêu cầu</h6>
          </div>
          <div class="card-body">
<div align="right">
              <td>
                <button type="button" name="edit" id="pheduyet" class="edit btn btn-primary btn-sm">Đánh dấu đã đọc</button>&nbsp;
                <button type="button" name="delete" id="xoa" class="delete btn btn-danger btn-sm">Xóa</button>&nbsp;
           
                </td>

            </div>
            <br>
            <div class="table-responsive">
              <table class="table table-bordered ykien" id="dataTableYKien" width="100%" cellspacing="0">
                <thead style="text-align:center">
                  <tr>
                    <th>ID</th>
                    <th>Khách Hàng</th>
                    <th>Nội dung</th>
                    <th>Trạng thái</th>
                  <th >Chọn tất cả<br><input  type="checkbox" id="checkall" class="checkall"/></th>
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
                <h2 class="modal-title">Đánh dấu đã đọc</h2>
            </div>
            <div class="modal-body">
                <h4 id="confirmtext" align="center" style="margin:0;">Bạn có muốn đánh dấu đã đọc những ý kiến này?</h4>
                <span id="result">

                </span>
            </div>
            <div class="modal-footer">
             <button type="button" name="pheduyet_button" id="pheduyet_button" class="btn btn-success">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
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

 $('#dataTableYKien').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('ykien.index') }}",
  },
  columns:[

   {
    data: 'id',

   },
   {
    data: 'username',

   },
      {
    data: 'post',

   },
   {
    data: 'status',
     render: function(data, type, full, meta)
    {
      
    if(data==0)
     return "Chưa xem";
   else return "Đã xem";
    }

   },
   {
    data: 'action',
    name: 'action',
    orderable: false
   }
  ]
 });
$('.checkall').change(function() {
    var checkboxes = $(this).closest('.ykien').find(':checkbox');
    checkboxes.prop('checked', $(this).is(':checked'));
});

var id;
 $(document).on('click', '#pheduyet', function(){

  id = [];
   $('#pheduyet_button').text('OK');
$('.status:checked').each(function(){
                id.push($(this).val());
            });
  $('#confirmModal0').modal('show');
 });

 $('#pheduyet_button').click(function(){

 if(id.length > 0)
            {
              
                $.ajax({
                    url:"{{ route('ykien.XuLy')}}",
                    method:"post",
                    data: {id:id},
                     beforeSend:function(){
    $('#pheduyet_button').text('Đang xử lý...');
   },
                    success:function(data)
                    {
                       
                        setTimeout(function(){
               $('#confirmModal0').modal('hide');
                 $('#dataTableYKien').DataTable().ajax.reload();
              }, 1000);
                    }
                });
            }
            else
            { $('#confirmModal0').modal('hide');
                alert("Bạn chưa chọn ý kiến cần xử lý");
            }



 });
 $(document).on('click', '#xoa', function(){

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
                    url:"{{ route('ykien.Xoa')}}",
                    method:"post",
                    data: {id:id},
                     beforeSend:function(){
    $('#ok_button').text('Đang xóa...');
   },
                    success:function(data)
                    {
                       
                        setTimeout(function(){
               $('#confirmModal').modal('hide');
                 $('#dataTableYKien').DataTable().ajax.reload();
              }, 1000);
                    }
                });
            }
            else
            { $('#confirmModal').modal('hide');
                alert("Bạn chưa chọn ý kiến cần xóa");
            }



 });



});

// var idupdate;

//  $(document).on('click', '.edit', function(){
//    idupdate = $(this).attr('id');
//  $('#confirmModal0').modal('show');
//  });


//   $('#pheduyet_button').click(function(){
//   $.ajax({
//   	url:"yeucau/update/"+idupdate,
//    beforeSend:function(){
//     $('#pheduyet_button').text('Phê duyệt');
//    },
//    success:function(data)
//    {
     
//       setTimeout(function(){
//      $('#confirmModal0').modal('hide');
//      $('#dataTableYKien').DataTable().ajax.reload();
//    }, 1000);
//  }

//    });
//   });




//  var user_id;

//  $(document).on('click', '.delete', function(){
//   user_id = $(this).attr('id');
//   $('#confirmModal').modal('show');
//  });

//  $('#ok_button').click(function(){
//   $.ajax({
//    url:"yeucau/destroy/"+user_id,
//    beforeSend:function(){
//     $('#ok_button').text('Delete');
//    },
//    success:function(data)
//    {
//      if(data.errors)
//      { var html = '';
//       html = '<div class="alert alert-danger">';
//       html += '<p>' + data.errors + '</p>';
//       html += '</div>';
//       $('#confirmtext').hide();
//       $('#result').html(html);
//       setTimeout(function(){
//       $('#confirmtext').show();
//       $('#result').empty();
//       $('#confirmModal').modal('hide');
//       $('#dataTableYKien').DataTable().ajax.reload();
//    }, 1000);
//      }
//     else{
//       setTimeout(function(){
//      $('#confirmModal').modal('hide');
//      $('#dataTableYeuCau').DataTable().ajax.reload();
//    }, 1000);
//  }

//    }
//   })
//  });

// });
</script>
@endsection
