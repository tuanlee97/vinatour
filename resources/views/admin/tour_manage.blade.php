@extends('admin.ADtemplate.ADmaster')


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
                    <th >Mã Tour</th>
                    <th >Tên Tour</th>
                    <th >Điểm xuất phát</th>
                    <th>Loại Tour</th>
                    <th>Ngày khởi hành</th>
                    <th>Số chỗ</th>
                    <th >Hình ảnh</th>
                    <th>Thao tác</th>
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

          <div class="row"><div class="col-md-4">
           <label>Tên Tour : </label>
             <input type="text" name="tentour" id="tentour" placeholder="Nhập tên tour..." class="form-control" />
            </div>
            <div class="col-md-2">
           <label>Loại Tour : </label>
                

<select class="form-control" name="loaitour" id="loaitour" title="Chọn loại tour">
                 <option value="">-Chọn loại tour-</option>
              
               <optgroup label="Bình thường">
                  @foreach($loaitour as $lt)
                   @if($lt->type == 0)
                     <option value="{{$lt->id}}">{{$lt->tenloai}}</option>
                   @endif
                 @endforeach
               </optgroup>
                <optgroup label="Tự chọn">
                  @foreach($loaitour as $lt)
                   @if($lt->type == 1)
                     <option value="{{$lt->id}}">{{$lt->tenloai}}</option>
                   @endif
                 @endforeach
               </optgroup>
             </select>


            </div>
       <div class="col-md-2" id="customediv4">
           <label>Giá người lớn : </label>
             <input type="text" name="gianguoilon" id="gianguoilon" placeholder="Giá người lớn..." class="form-control" />
            </div>
 <div class="col-md-2" id="customediv5">
           <label>Giá trẻ em : </label>
             <input type="text" name="giatreem" id="giatreem" placeholder="Giá trẻ em..." class="form-control" />
            </div>
           <div class="col-md-2" id="customediv6">
           <label>Giá em bé : </label>
             <input type="text" name="giaembe" id="giaembe" placeholder="Giá em bé..." class="form-control" />
            </div>  
           </div>
  <br>
            <div class="row">
              <div class="col-md-3">
                  <label  class="control-label">Chọn khu vực : </label>
             <select class="form-control" id="khuvuc" name="khuvuc"  title="Chọn khu vực :" style="margin-left:15px">
               <option value="">---Chọn khu vực---</option>
               <option value="0">Nội địa</option>
               <option value="1">Quốc tế</option>
             </select>
          </div>

            <div class="col-md-3">
                <label>Xuất phát : </label>

             <select class="form-control" name="xuatphat" id="xuatphat" title="Chọn điểm xuất phát">
                 <option value="">---Chọn điểm xuất phát---</option>
               @foreach($quocgia as $qg)
               <optgroup label="{{$qg->tenquocgia}}">
                 @foreach($tinh as $t)
                   @if($t->quocgia == $qg->maquocgia)
                   <option value="{{$t->tentinh}}">{{$t->tentinh}}</option>
                   @endif
                 @endforeach
               </optgroup>
               @endforeach
             </select>


          </div>
            <div id="taget0" class="col-md-3" style="display: none;" >
                <label>Điểm đến : </label></br>
              <select style="width:250px" id="diemden" name="diemden[]" class="js-example-basic-multiple" multiple="multiple" title="Chọn nơi đến">

              </select>

           </div>
</div></br>

      <div  class="row" >
        <div id="taget1" class="col-md-4" style="display: none;">
            <label>Địa Danh : </label></br>
          <select style="width:350px"id="diadanh"  name="diadanh[]" class="js-example-basic-multiple" multiple="multiple" title="Chọn nơi đến">

          </select>

       </div>
       <div id="taget2" class="col-md-4" style="display: none;">
           <label>Nhà hàng : </label></br>
         <select style="width:350px"id="nhahang"  name="nhahang[]" class="js-example-basic-multiple" multiple="multiple" title="Chọn nơi đến">

         </select>

      </div>
      <div id="taget3" class="col-md-4" style="display: none;">
          <label>Khách Sạn : </label></br>
        <select style="width:350px"id="khachsan"  name="khachsan[]" class="js-example-basic-multiple" multiple="multiple" title="Chọn nơi đến">

        </select>

     </div>


        </div>
           <div class="form-group">
            <label class="control-label">Nội dung : </label>
            <div class="col-md-12">
            <textarea name="editor1" id="editor1"></textarea>

            </div>
           </div>
     <div class="row"><div class="col-md-2" id="customediv1">
           <label>Khuyến mãi ( % ) : </label>
             <input  type="text" name="khuyenmai" id="khuyenmai"   class="form-control " />
            </div>
            <div class="col-md-2" id="customediv2">
           <label>Số lượng </label>
                  <input type="text" name="soluong" id="soluong"   class="form-control" />
            </div>
       <div class="col-md-2" id="customediv3">
           <label>Ngày khởi hành : </label>
                <input class="form-control" name ="ngaykhoihanh"type="date"  id="ngaykhoihanh">
            </div>
 
           </div><hr>
            <div class="form-group">
            <label class="control-label">Chọn hình ảnh : </label>
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
   { data: 'loaitour_id'},
   { data: 'ngaykhoihanh',
      render: function(data, type, full, meta)
    {
      
    if(data==null)
     return "Không tồn tại   ( Tour tự chọn )";
   else return data;
    }
     
  },
   { data: 'soluong',
      render: function(data, type, full, meta)
    {
      
    if(data==null)
     return "Không tồn tại   ( Tour tự chọn )";
   else return data;
    }

  },
  {
    data: 'hinhanh',

    render: function(data, type, full, meta)
    {
     return "<img src={{ URL::to('/') }}/admin/images/tour/" + data + " width='300' class='img-thumbnail' />";
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
  $('#sample_form')[0].reset();
       $('#customediv1').attr('style',"display: block;");
         $('#customediv2').attr('style',"display: block;");
         $('#customediv3').attr('style',"display: block;");
        $('#customediv4').attr('style',"display: block;");
         $('#customediv5').attr('style',"display: block;");
         $('#customediv6').attr('style',"display: block;");
    $('select[name="diemden[]"]').empty();
    $('select[name="diadanh[]"]').empty();
    $('select[name="khachsan[]"]').empty();
    $('select[name="nhahang[]"]').empty();
    for (var i = 0; i < 4; i++) {
      var idtaget = '#taget'+i;
      $(idtaget).attr('style',"display: none;");
    }
  $('.modal-title').text("Add New Record");
  $('#action_button').val("Add");
  $('#action').val("Add");
  $('#tentour').val("");
  $('#loaitour').val("");
  $('#gianguoilon').val("");
  $('#giaembe').val("");
  $('#giatreem').val("");
  $('#xuatphat').val("");
  $('#store_image').val("");
  $('#editor1').val('');
    $('#image').val(""); /////
    CKEDITOR.instances['editor1'].setData('');///////
    $('#form_result').html("");///////
    $('#hidden_id').val("");

     $('#formModal').modal('show');
 });




 $('#sample_form').on('submit', function(event){
  event.preventDefault();
  if($('#action').val() == 'Add')
  {
    $('#editor1').val(CKEDITOR.instances['editor1'].getData());/////////
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
    url:"{{ route('tour.update') }}",
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
     $('#dataTableTour').DataTable().ajax.reload();
    }, 1000);
     }
     $('#form_result').html(html);
    }
   });
  }
 });
 $(document).on('click', '.edit', function(){
  $('#sample_form')[0].reset();
  var nl='';
  var te = '';
  var eb = '';
  var sl ='';
  var km = '';
  var date = '';
  var id = $(this).attr('id');
  $('#form_result').html('');
  $.ajax({
   url:"tour/"+id+"/edit",
   dataType:"json",
   success:function(html){

      nl=html.data.gianguoilon;
   te = html.data.giatreem;
   eb = html.data.giaembe;
   sl =html.data.soluong;
   km = html.data.khuyenmai;
   date = html.data.ngaykhoihanh;
      $('#sample_form')[0].reset();

 $.ajax({
    url: 'getCustome/'+html.data.loaitour_id,
    type: 'GET',
    dataType : 'json',
    success: function(ketqua){
      console.log(ketqua);
      if(ketqua.type==1){
         $('#customediv1').attr('style',"display: none;");
         $('#customediv2').attr('style',"display: none;");
         $('#customediv3').attr('style',"display: none;");
          $('#customediv4').attr('style',"display: none;");
         $('#customediv5').attr('style',"display: none;");
         $('#customediv6').attr('style',"display: none;");
      }
      else {
         $('#customediv1').attr('style',"display: block;");
         $('#customediv2').attr('style',"display: block;");
         $('#customediv3').attr('style',"display: block;");
        $('#customediv4').attr('style',"display: block;");
         $('#customediv5').attr('style',"display: block;");
         $('#customediv6').attr('style',"display: block;");
      }

    }});





      $('#tentour').val(html.data.tentour);
     
      $('#khuvuc').val(html.data.in_out);
      $('#gianguoilon').val(html.data.gianguoilon);
       $('#giaembe').val(html.data.giaembe);
        $('#giatreem').val(html.data.giatreem);
      $('#loaitour').val(html.data.loaitour_id);
      $('#xuatphat').val(html.data.diemxuatphat);
      console.log(html);
           $('#soluong').val(html.data.soluong);
      $('#ngaykhoihanh').val(html.data.ngaykhoihanh);
      $('#khuyenmai').val(html.data.khuyenmai);
    for (var i = 0; i < 4; i++) {
      var idtaget = '#taget'+i;
      $(idtaget).attr('style',"display: block;");
    }
    $('select[name="diemden[]"]').empty();
    $('select[name="diadanh[]"]').empty();
    $('select[name="khachsan[]"]').empty();
    $('select[name="nhahang[]"]').empty();
    $.each(html.dichden,function(key,value){
$('#diemden').append('<option selected="selected" value="'+value.id+'">'+value.tentinh+'</option>');
    });
    $.each(html.thamquan,function(key,value){
  $('#diadanh').append('<option selected="selected" value="'+value.id+'">'+value.tendiadanh+'</option>');
    });
    $.each(html.noianuong,function(key,value){
  $('#nhahang').append('<option selected="selected" value="'+value.id+'">'+value.tennhahang+'</option>');
    });
    $.each(html.noinghi,function(key,value){
  $('#khachsan').append('<option selected="selected" value="'+value.id+'">'+value.tenkhachsan+'</option>');
    });
        CKEDITOR.instances['editor1'].setData(html.data.noidung);//////////////
    $('#editor1').val(html.data.noidung);/////
   
    $('#store_image').html("<img src={{ URL::to('/') }}/admin/images/tour/" + html.data.hinhanh + " width='300' class='img-thumbnail' />");
    $('#store_image').append("<input type='hidden' name='hidden_image' value='"+html.data.hinhanh+"' />");
    $('#hidden_id').val(html.data.id);
    $('.modal-title').text("Edit New Record");
    $('#action_button').val("Edit");
    $('#action').val("Edit");

      $('select[name="loaitour"]').on('change',function(){
      var isCustome = $('#loaitour').val();
 $.ajax({
    url: 'getCustome/'+isCustome,
    type: 'GET',
    dataType : 'json',
    success: function(ketqua){
      console.log(ketqua);
      if(ketqua.type==1){
         $('#gianguoilon').val('');
          $('#giaembe').val('');
       $('#giatreem').val('');
        $('#soluong').val('');
       $('#ngaykhoihanh').val('');
      $('#khuyenmai').val('');
         $('#customediv1').attr('style',"display: none;");

         $('#customediv2').attr('style',"display: none;");
         $('#customediv3').attr('style',"display: none;");
          $('#customediv4').attr('style',"display: none;");
         $('#customediv5').attr('style',"display: none;");
         $('#customediv6').attr('style',"display: none;");
  

      }
      else {
         $('#customediv1').attr('style',"display: block;");
         $('#customediv2').attr('style',"display: block;");
         $('#customediv3').attr('style',"display: block;");
        $('#customediv4').attr('style',"display: block;");
         $('#customediv5').attr('style',"display: block;");
         $('#customediv6').attr('style',"display: block;");
              $('#gianguoilon').val(nl);
          $('#giaembe').val(eb);
       $('#giatreem').val(te);
        $('#soluong').val(sl);
       $('#ngaykhoihanh').val(date);
      $('#khuyenmai').val(km);
      }

    }});


      

 });





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
    url:"tour/destroy/"+user_id,
    beforeSend:function(){
     $('#ok_button').text('Deleting...');
    },
    success:function(data)
    {
     setTimeout(function(){
      $('#confirmModal').modal('hide');
      $('#dataTableTour').DataTable().ajax.reload();
     }, 1000);
    }
   })
  });




 $('select[name="khuvuc"]').on('change',function(){
   for (var i = 0; i < 4; i++) {
     var idtaget = '#taget'+i;
     $(idtaget).attr('style',"display: block;");
   }

   $('select[name="diadanh[]"]').empty();
   $('select[name="khachsan[]"]').empty();
   $('select[name="nhahang[]"]').empty();
   var khuvuc = this.value;

   if(khuvuc){
     $.ajax({
       url: 'getStates/'+khuvuc,
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


  $('select[name="loaitour"]').on('change',function(){
      var isCustome = $('#loaitour').val();
 $.ajax({
    url: 'getCustome/'+isCustome,
    type: 'GET',
    dataType : 'json',
    success: function(ketqua){
      console.log(ketqua);
      if(ketqua.type==1){
         $('#customediv1').attr('style',"display: none;");
         $('#customediv2').attr('style',"display: none;");
         $('#customediv3').attr('style',"display: none;");
          $('#customediv4').attr('style',"display: none;");
         $('#customediv5').attr('style',"display: none;");
         $('#customediv6').attr('style',"display: none;");
      }
      else {
         $('#customediv1').attr('style',"display: block;");
         $('#customediv2').attr('style',"display: block;");
         $('#customediv3').attr('style',"display: block;");
        $('#customediv4').attr('style',"display: block;");
         $('#customediv5').attr('style',"display: block;");
         $('#customediv6').attr('style',"display: block;");
      }

    }});


      

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
