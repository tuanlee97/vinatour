@extends('admin.ADtemplate.ADmaster')

        <!-- DataTables Example -->
        @section('ADcontent')
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
            Danh sách Tour</div>
          <div class="card-body">

               <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Thêm Tour</button>
     </div>
     <br/>
             <div class="table-responsive">
              <table class="table table-bordered" id="dataTableTour" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="10%">Mã Tour</th>
                    <th width="20%">Tên Tour</th>
                    <th width="10%">Điểm xuất phát</th>
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
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm thông tin Tour</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf

          <div class="row"><div class="col-md-8">
           <label>Tên Tour : </label>

             <input type="text" name="tentour" id="tentour" class="form-control" />
            </div>

            <div class="col-md-2">
              <label>Số ngày ( <code>tối đa:10</code> )</label>
              <input type="number" name="songay" value="1" min="0" max="10" step="1"/>

            </div>

            <div class="col-md-2">
              <label>Số đêm ( <code>tối đa:10</code> )</label>
              <input type="number" name="sodem" value="1" min="0" max="10" step="1"/>

            </div>

           </div>
  <br>
            <div class="row">
              <div class="col-md-4">
                  <label  class="control-label">Chọn loại tour : </label>
             <select class="form-control" id="loaitour" name="loaitour"  title="Chọn loại tour" style="margin-left:15px"><option value="">Chọn loại tour</option>
               @foreach($loaitour as $lt)
               <option value="{{$lt->maloai}}">{{$lt->tenloai}}</option>
               @endforeach
             </select>
          </div>
            <div class="col-md-3">
                <label>Xuất phát : </label>

             <select class="form-control" name="xuatphat" id="tentinh" title="Chọn điểm khởi hành">
                <option value="">Chọn điểm khởi hành</option>
                @foreach($tinh as $t)
               <option value="{{$t->tentinh}}">{{$t->tentinh}}</option>
               @endforeach
             </select>


          </div>
            <div class="col-md-4">
                <label>Điểm đến : </label></br>
              <select style="width:300px" name="diemden[]" class="js-example-basic-multiple" multiple="multiple" title="Chọn nơi đến">

              </select>

           </div>
</div></br>

      <div class="row">
        <div class="col-md-4">
            <label>Địa Danh : </label></br>
          <select style="width:350px" name="diadanh[]" class="js-example-basic-multiple" multiple="multiple" title="Chọn nơi đến">

          </select>

       </div>
       <div class="col-md-4">
           <label>Nhà hàng : </label></br>
         <select style="width:350px" name="nhahang[]" class="js-example-basic-multiple" multiple="multiple" title="Chọn nơi đến">

         </select>

      </div>
      <div class="col-md-4">
          <label>Khách Sạn : </label></br>
        <select style="width:350px" name="khachsan[]" class="js-example-basic-multiple" multiple="multiple" title="Chọn nơi đến">

        </select>

     </div>


        </div>
           <div class="form-group">
            <label class="control-label">Nội dung : </label>
            <div class="col-md-12">
            <textarea name="editor1" id="editor1"></textarea>

            </div>
           </div>

            <div class="form-group">
            <label class="control-label">Select Profile Image : </label>
            <div class="col-md-8">
             <input type="file" name="image" id="image" />
             <span id="store_image"></span>
            </div>
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Sửa" />
           </div>
         </form>
        </div>


        <div  class="form-group">



        </div>
     </div>
    </div>
</div>


@endsection
@section('ADscript')
<script>
$(document).ready(function() {
$('.js-example-basic-multiple').select2();

});
</script>
<script>

$(document).ready(function(){

 $('#dataTableTour').DataTable({
  processing: true,
  serverSide: true,
  ajax:{
   url: "{{ route('tour.index') }}",
  },
  columns:[
   { data: 'id'},
   { data: 'tentour'},
   { data: 'diemxuatphat'},
   { data: 'noidung'},
  {
    data: 'hinhanh',

    render: function(data, type, full, meta)
    {
     return "<img src={{ URL::to('/') }}/images/" + data + " width='200' class='img-thumbnail' />";
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
    $('#store_image').val("");
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
    url:"{{ route('tour.store') }}",
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
     $('#dataTableTour').DataTable().ajax.reload();
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

      $('#store_image').html('');
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
    $('#tennhahang').val(html.data.tennhahang);
    $('#gia').val(html.data.gia);

        CKEDITOR.instances['editor1'].setData(html.data.noidung);//////////////
    $('#editor1').val(html.data.noidung);/////
    $('#tentinh').val(html.data.tinh);
    $('#store_image').html("<img src={{ URL::to('/') }}/images/" + html.data.hinhanh + " width='200' class='img-thumbnail' />");
    $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.hinhanh+"' />");
    $('#hidden_id').val(html.data.manhahang);
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

 $('select[name="loaitour"]').on('change',function(){
   $('select[name="diadanh[]"]').empty();
   $('select[name="khachsan[]"]').empty();
   $('select[name="nhahang[]"]').empty();
   var kieutour = $(this).val();
   if(kieutour){
     $.ajax({
       url: 'getStates/'+kieutour,
       type: 'GET',
       dataType : 'json',
       success: function(data){
       $('select[name="diemden[]"]').empty();
       $.each(data,function(key,value){

       $('select[name="diemden[]"]').append('<option value="'+key+'">'+value+'</option>');

       });
       }
     });
   } else {
     $('select[name="diemden[]"]').empty();
   }
 });
$('select[name="diemden[]"]').on('change',function(){

  $('select[name="diadanh[]"]').empty();
  $('select[name="khachsan[]"]').empty();
  $('select[name="nhahang[]"]').empty();
   var selected_diemden_id =  $(this).val();
$.each(selected_diemden_id,function(key,value){
  $.ajax({
    url: 'getDiemden/'+value,
    type: 'GET',
    dataType : 'json',
    success: function(data2){
    $.each(data2,function(matinh,tentinh){
//Dia Danh ComboBox
//OptGourp Begin
  var option1 = '';
              ///Option
              $.ajax({
                url: 'getDiadanh/'+value,
                type: 'GET',
                dataType : 'json',
                success: function(data){
                $.each(data,function(madiadanh,tendiadanh){
                  option1 += '<option value="'+madiadanh+'">'+tendiadanh+'</option>';
                });
                $('select[name="diadanh[]"]').append('<optgroup disable label="'+tentinh+'">'+option1+'</optgroup>');
                }
              });
//OptGroup End

//NhaHang ComboBox
//OptGourp Begin
  var option2 = '';
              ///Option
              $.ajax({
                url: 'getNhahang/'+value,
                type: 'GET',
                dataType : 'json',
                success: function(data){

                $.each(data,function(manhahang,tennhahang){
                  option2 += '<option value="'+manhahang+'">'+tennhahang+'</option>';
                });
                $('select[name="nhahang[]"]').append('<optgroup disable label="'+tentinh+'">'+option2+'</optgroup>');
                }
              });
//OptGroup End

//KhachSan ComboBox
//OptGourp Begin
  var option3 = '';
              ///Option
              $.ajax({
                url: 'getKhachsan/'+value,
                type: 'GET',
                dataType : 'json',
                success: function(data){
                $.each(data,function(makhachsan,tenkhachsan){
                  option3 += '<option value="'+makhachsan+'">'+tenkhachsan+'</option>';
                });
                $('select[name="khachsan[]"]').append('<optgroup disable label="'+tentinh+'">'+option3+'</optgroup>');
                }
              });
//OptGroup End
    });

    }
  });
});
});
});


</script>


<script src="js/bootstrap-input-spinner.js"></script>
<script>
    $("input[type='number']").inputSpinner()
</script>
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
@endsection
