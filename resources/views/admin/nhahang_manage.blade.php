@extends('admin.ADtemplate.ADmaster')

        <!-- DataTables Example -->
        @section('ADcontent')
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
            Danh sách Nhà hàng</div>
          <div class="card-body">
               <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Thêm Nhà Hàng</button>
     </div>
     <br/>
             <div class="table-responsive">
              <table class="table table-bordered" id="dataTableNH" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="10%">Tỉnh</th>
                    <th width="20%">Tên nhà hàng</th>
                    <th width="10%">Giá</th>
                    <th width="20%">Nội Dung</th>
                    <th width="20%">Hình ảnh</th>
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
<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog  modal-dialog-scrollable" style="  max-width: 1200px; margin: 1.75rem auto;">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm thông tin Nhà Hàng</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf

           <div class="form-group">
            <label class="control-label col-md-4">Tên Nhà hàng : </label>
            <div class="col-md-8">
             <input type="text" name="tennhahang" id="tennhahang" class="form-control" />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">Giá : </label>
            <div class="col-md-8">
             <input type="text" name="gia" id="gia" class="form-control" />
            </div>
           </div>



            <div class="form-group">
            <label class="control-label col-md-4">Tên Tỉnh : </label>
            <div class="col-md-8">

             <select class="form-control col-md-3" name="tentinh" id="tentinh" title="Chọn Tỉnh">
               @foreach($quocgia as $qg)
               <optgroup label="{{$qg->tenquocgia}}">
                 @foreach($tinh as $t)
                   @if($t->quocgia == $qg->maquocgia)
                   <option value="{{$t->id}}">{{$t->tentinh}}</option>
                   @endif
                 @endforeach
               </optgroup>
               @endforeach
             </select>
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">Nội dung : </label>
            <div class="col-md-12">
            <textarea name="editor1" id="editor1"></textarea>
                <script>
                         CKEDITOR.replace( 'editor1', {

        filebrowserBrowseUrl: '{{ asset('admin/ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('admin/ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('admin/ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
    } );
                                CKEDITOR.config.entities_latin = false;
                                CKEDITOR.config.entities = false;
                                CKEDITOR.config.entities_latin = false;
                                CKEDITOR.config.entities_greek = false;
                                CKEDITOR.config.basicEntities = false;
                </script>
            </div>
           </div>

            <div class="form-group">
            <label class="control-label col-md-4">Select Profile Image : </label>
            <div class="col-md-8">
             <input type="file" name="image" id="image" />
             <span id="store_image"></span>
            </div></div>
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


@endsection
@section('ADscript')
<script>
$(document).ready(function(){


 $('#dataTableNH').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('nhahang.index') }}",
  },
  columns:[
   { data: 'tinh'},
   { data: 'tennhahang'},
   { data: 'gia'},
   { data: 'noidung'},
  {
    data: 'hinhanh',

    render: function(data, type, full, meta)
    {
     return "<img src={{ URL::to('/') }}/admin/images/nhahang/" + data + " width='300' class='img-thumbnail' />";
    }
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
      $('#tennhahang').val("");
    $('#gia').val("");
    $('#store_image').empty();
    $('#editor1').val('');

    $('#tentinh').val("");
       $('#image').val(""); /////
    CKEDITOR.instances['editor1'].setData('');///////
    $('#form_result').html("");///////
    $('#hidden_id').val("");

     $('#formModal').modal('show');
 });

 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {$('#editor1').val(CKEDITOR.instances['editor1'].getData());/////////
   $.ajax({
    url:"{{ route('nhahang.store') }}",
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
     $('#dataTableNH').DataTable().ajax.reload();

    }, 1000);
     }
     $('#form_result').html(html);

    }
   })
  }


   if($('#action').val() == "Edit")
  {$('#editor1').val(CKEDITOR.instances['editor1'].getData());/////////
   $.ajax({
    url:"{{ route('nhahang.update') }}",
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


       setTimeout(function(){

     $('#formModal').modal('hide');
     $('#dataTableNH').DataTable().ajax.reload();

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
   url:"nhahang/"+id+"/edit",
   dataType:"json",
   success:function(html){
       $('#sample_form')[0].reset();
    $('#tennhahang').val(html.data.tennhahang);
    $('#gia').val(html.data.gia);

        CKEDITOR.instances['editor1'].setData(html.data.noidung);//////////////
    $('#editor1').val(html.data.noidung);/////
    $('#tentinh').val(html.data.tinh);
    $('#store_image').html("<img src={{ URL::to('/') }}/admin/images/nhahang/" + html.data.hinhanh + " width='300' class='img-thumbnail' />");
    $('#store_image').append("<input type='hidden' name='hidden_image' id='hidden_image' value='"+html.data.hinhanh+"' />");
    $('#hidden_id').val(html.data.id);
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
   url:"nhahang/destroy/"+user_id,
   beforeSend:function(){
    $('#ok_button').text('Deleting...');
   },
   success:function(data)
   {
    setTimeout(function(){
     $('#confirmModal').modal('hide');
     $('#dataTableNH').DataTable().ajax.reload();
    }, 1000);
   }
  })
 });

});
</script>
@endsection
