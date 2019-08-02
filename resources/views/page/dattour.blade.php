@extends('master')
@section('content')
<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-4.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>VINATOUR</h2>
				   					<h1>Tìm thông tin khách sạn</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
<div class="colorlib-wrap">
	<div class="container">
		
				<div class="row">
					<div class="col-md-9" style=" border-style: ridge;border-radius: 10px; padding: 50px">
						<div class="row">
							<div class="col-md-12">
								<div class="wrap-division">
									<div>
						 <h4 class="modal-title-thanhtoan"><B><u>THANH TOÁN</u><b></h4>

        <div class="progress-bar bg-danger rounded mb-2" role="progressbar" style="width: 30%;border-radius: 10px;" id="progressBar">
        	<b class="lead" id="progressText">Số lượng khách hàng</b>
        </div><br><br><br>
        <form id="checkout_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div id="1">
          
           <div class="form-group col-md-2" style="margin-right: 20px">
            <label >Người lớn </label>
           
             <input type="number" min="1" name="nguoilonsl" id="nguoilon" class="form-control" />
           </div>

           <div class="form-group col-md-2" style="margin-right: 20px">
            <label >Trẻ em : </label>
           
             <input type="number" min="0" name="treemsl" id="treem" class="form-control" />
           </div>
            <div class="form-group col-md-2">
            <label>Em bé : </label>
           
             <input type="number" min="0" name="embesl" id="embe" class="form-control" />
            
           </div>
           <div class="form-group" style="width:100%;height:250px;overflow-y: scroll;padding: 10px;margin:0;border: 1px solid #ccc;border-right: 2px solid #ccc;"><p>Điều khoản này là sự thoả thuận đồng ý của quý khách khi sử dụng dịch vụ thanh toán trên trang web <a href="http://www.vinatour.tk">www.vinatour.tk</a> của Công ty Dịch vụ Lữ hành Vinatour và những trang web của bên thứ ba. Việc quý khách đánh dấu vào ô “Đồng ý” và nhấp chuột vào thanh “Chấp nhận” nghĩa là quý khách đồng ý tất cả các điều khoản thỏa thuận trong các trang web này.</p>

<p>&nbsp;</p>

<p><strong>Giải thích từ ngữ</strong></p>

<p>&nbsp;</p>

<p>Điều khoản: là những điều quy định giữa  và quý khách</p>

<p>Bên thứ ba: là những đơn vị liên kết với Vinatour (OnePay, Vietcombank) nhằm hỗ trợ việc thanh toán qua mạng cho quý khách</p>

<p>Vé điện tử: là những thông tin và hành trình của quý khách cho chuyến đi được thể hiện trên một trang giấy mà quý khách có thể in ra được</p>

<p><strong>Về sở hữu bản quyền</strong></p>

<p>Trang web <a href="http://www.vinatour.tk">www.vinatour.tk</a> thuộc quyền sở hữu của Vinatour và được bảo vệ theo luật bản quyền, quý khách chỉ được sử dụng trang web này với mục đích xem thông tin và đăng ký thanh toán online cho cá nhân chứ không được sử dụng cho bất cứ mục đích thương mại nào khác.</p>

<p>Việc lấy nội dung để tham khảo, làm tài liệu cho nghiên cứu phải ghi rõ ràng nguồn lấy từ nội dung trang web Vinatour. Không được sử dụng các logo, các nhãn hiệu Vinatour dưới mọi hình thức nếu chưa có sự đồng ý của Vinatour bằng văn bản.</p>

<p><strong>Về thông tin khách hàng</strong></p>

<p>Khi đăng ký thanh toán qua mạng, quý khách sẽ được yêu cầu cung cấp một số thông tin cá nhân và thông tin tài khoản.</p>

<p>Đối với thông tin cá nhân: Những thông tin này chỉ để phục vụ cho nhu cầu xác nhận sự mua dịch vụ của quý khách và sẽ hiển thị những nội dung cần thiết trên vé điện tử. Vinatour cũng sẽ sử dụng những thông tin liên lạc này để gửi đến quý khách những sự kiện, những tin tức khuyến mãi và những ưu đãi đặc biệt nếu quý khách đồng ý. Những thông tin này của quý khách sẽ được Vinatour bảo mật và không tiết lộ cho bên thứ ba biết ngoại trừ sự đồng ý của quý khách hoặc là phải tiết lộ theo sự tuân thủ luật pháp quy định.</p>

<p>Đối với thông tin tài khoản: Những thông tin này sẽ được Vinatour và bên thứ ba áp dụng những biện pháp bảo mật cao nhất do các hệ thống thanh toán nổi tiếng trên thế giới như Visa và MasterCard cung cấp nhằm đảm bảo sự an toàn tuyệt đối của thông tin tài khoản quý khách.</p>

<p><strong>Về trang web liên kết</strong></p>

<p>Các trang web của Vinatour có chứa những liên hệ kết nối với trang web của bên thứ ba. Việc liên kết trang web của bên thứ ba này nhằm chỉ cung cấp những sự tiện lợi cho quý khách chứ không phải là sự tán thành, chấp nhận những nội dung, thông tin sản phẩm của những trang web bên thứ ba. Vinatour sẽ không chiu trách nhiệm về bất cứ trách nhiệm pháp lý nào liên quan đến những thông tin gì trong các trang web bên thứ ba.</p>

<p><strong>Về hủy tour</strong></p>

<p>Trong trường hợp hủy tour, quý khách vui lòng gửi email thông báo hủy tour đến Vinatour. Vinatour sẽ trao đổi và xác nhận lại tất cả các thông tin của quý khách. Khi hoàn tất việc xác nhận thông tin, Vinatour sẽ hoàn tiền vào đúng tài khoản quý khách đã thanh toán sau khi trừ các khoản lệ phí hủy tour. Lệ phí hủy tour sẽ tùy thuộc vào từng tour tuyến quý khách đăng ký.</p>

<p><strong>Trách nhiệm của Vinatour</strong></p>

<p>Vinatour có nhiệm vụ bảo mật và lưu trữ an toàn các thông tin của quý khách với sự nghiêm túc cao nhất.</p>

<p>Giải quyết những thắc mắc, sai sót, vi phạm mà quý khách gặp phải trong quá trình thanh toán nếu do lỗi của Vinatour.</p>

<p>Đảm bảo thực hiện đầy đủ mọi dịch vụ theo đúng chương trình mà quý khách đăng ký. Tuy nhiên chúng tôi có toàn quyền thay đổi lộ trình hoặc hủy bỏ chuyến đi du lịch bất cứ lúc nào mà chúng tôi thấy cần thiết vì sự an toàn cho quý khách.</p>

<p>Mọi thay đổi nếu có sẽ được thông báo nhanh chóng cho quý khách ngay trước ngày khởi hành hoặc ngay sau khi phát hiện những phát sinh.</p>

<p><strong>Trường hợp miễm trách nhiệm đối với Vinatour</strong></p>

<p>Vinatour không chịu trách nhiệm về tất cả những thông tin mà quý khách cung cấp bởi chúng tôi không dễ dàng xác nhận chính xác quý khách nào đăng ký thông tin.</p>

<p>Vinatour không chịu trách nhiệm về việc thông tin của quý khách bị lấy cắp nếu như việc lấy cắp được thực hiện từ máy của quý khách do bị nhiễm virus máy tính hay do nguyên nhân nào khác.</p>

<p>Vinatour không chịu trách nhiệm đối với quý khách nếu xảy ra việc hệ thống máy tính của quý khách bị hư hại trong khi đang thanh toán hoặc bị can thiệp liên quan tới việc sử dụng một trang bên ngoài.</p>

<p>Vinatour không chịu trách nhiệm về việc mất dữ liệu thông tin của quý khách do sự cố khách quan như: thiên tai, hạn hán, hỏa hoạn, chiến tranh,…</p>

<p><strong>Trách nhiệm của khách hàng</strong></p>

<p>Quý khách cam kết hoàn toàn chịu trách nhiệm về các thông tin cá nhân, thông tin thẻ tín dụng đã được khai báo là trung thực, chính xác. Nếu có sai sót, giả mạo hay tranh chấp phát sinh thì Vinatour có quyền hủy tour đã mua của quý khách.</p>

<p>Quý khách có nhiệm vụ kiểm tra thông tin tài khoản để kịp thời để báo cho Vinatour nếu có những sự cố. Thời hạn trong vòng 30 ngày tính từ ngày thanh toán, Vinatour sẽ không nhận giải quyết bất cứ kiếu nại nào từ việc thanh toán.</p>

<p>Quý khách không sử dụng các nội dung của trang web do Vinatour quản lý cho mục đích thương mại nếu như chưa có sự đồng ý.</p>

<p>Quý khách cần tự áp dụng cài đặt các biện pháp phòng ngừa để bảo đảm rằng bất cứ lựa chọn nào của quý khách khi sử dụng các trang web của Vinatour không bị virus hoặc bất cứ mối đe dọa nào khác từ ngoài có thể can thiệp hoặc gây hư hại cho hệ thống máy tính của quý khách.</p></div>
<div class="form-group col-md-12">
  <label>
   <input type="checkbox" id="agreement" name="agreement" >Tôi đã đọc và đồng ý
   </label>
   <b class="form-text text-danger" id="dieukhoan"></b>

</div>
<div class="form-group col-md-12">

   <button type="button" class="btn btn-primary" id="next-1">Tiếp tục</button>
</div>
</div>

			
          <div id="2" style="display: none">
            <h4 class="lead" id="progresstext">Thông tin liên hệ</h4>
            <div class="row">
            <div class="form-group col-md-4  "  style="margin-right: 20px">
            <label>Tên</label>
    
             <input type="text" name="tenLH" id="tenLH" class="form-control" />
           
           </div>

           <div class="form-group col-md-4"  style="margin-right: 20px">
            <label >Email</label>
         
             <input type="email" name="email" id="email" class="form-control" />
          
           </div>
            </div>

             <div class="row">
           <div class="form-group col-md-4 "  style="margin-right: 20px">
            <label>Số điện thoại</label>
          
             <input type="text" name="sdt" id="sdt" class="form-control" />
            
           </div>


           <div class="form-group col-md-4"  style="margin-right: 20px">
            <label>Địa chỉ</label>
         
             <input type="text" name="diachiLH" id="diachiLH" class="form-control" />
      
           </div>
         </div>

          <div class="row">
           <div class="form-group col-md-4"  style="margin-right: 20px">
            <label>Quốc gia</label>
         
             <input type="text" name="QGLH" id="QGLH" class="form-control" />
           
           </div>

           <div class="form-group col-md-4"  style="margin-right: 20px">
            <label >Thành phố</label>
           
             <input type="text" name="TPLH" id="TPLH" class="form-control" />
           
           </div>
</div>
<div id= thongtin>

</div>
<div class="form-group col-md-12">
  <button type="button" class="btn btn-danger" id="pre-1">Quay lại</button>
   <button type="button" class="btn btn-primary" id="next-2">Tiếp tục</button>
</div>
          
        </div>

          <div id="3" style="display: none">
            
              

               <div class="form-group col-md-12 text-center"> <button type="submit" class="btn btn-warning">Thanh toán tại công ty</button>
                <button type="button" class="btn btn-success" id="next-3">Thanh toán trực tuyến với <span  style="color: red ; font-size: 14px;font-weight: bold;" title="Thanh toán VNPAY">VN</span><span  style="color: blue ; font-size: 14px;font-weight: bold;" title="Thanh toán VNPAY">PAY</span></button>
              
              </div>
<div class="form-group">
	<input type="hidden" id="tongtien" name="tongtien" >
	<input type="hidden" name="tour_id" id="tour_id" value="{{$tour->id}}">
    <button type="button" class="btn btn-danger" id="pre-2">Quay lại</button>
    
</div>
            
          </div>
   <div id="4" style="display: none">
                 <div class="container">
            <div class="header clearfix">
                <h3 class="text-muted">VNPAY - THÔNG TIN ĐƠN ĐẶT TOUR</h3>
            </div>
           
      
                      
					    <div class="row">
            <div class="form-group col-md-4  " style="margin-right: 20px">
            <label for="language">Loại hàng hóa </label>
                        <select name="order_type" id="order_type" class="form-control">
                
                            <option value="billpayment">Thanh toán hóa đơn</option>
                         
                            <option value="other">Khác - Xem thêm tại VNPAY</option>
                        </select>
           
           </div>
           <div class="form-group col-md-4  " style="margin-right: 20px">
             <label for="amount">Số tiền</label>
                        <input class="form-control" id="amount" name="amount" type="number" value="12" disabled="disabled" >
           
           </div>
         
            </div>
    
					    <div class="row">
            

           <div class="form-group col-md-8" >
            <label for="order_desc">Nội dung thanh toán</label>
                        <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Nội dung thanh toán...</textarea>
          
           </div>
            </div>
            			    <div class="row">
            <div class="form-group col-md-4  " style="margin-right: 20px">
            <label for="bank_code">Ngân hàng</label>
                        <select name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
           
           </div>

           <div class="form-group col-md-4" style="margin-right: 20px">
            <label for="language">Ngôn ngữ</label>
                        <select name="language" id="language" class="form-control">
                            <option value="vn">Tiếng Việt</option>
                            <option value="en">English</option>
                        </select>
          
           </div>
            </div>       
                    
             

             
            
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; VNPAY 2019</p>
            </footer>
        </div> 
<div class="form-group col-md-12">
  <button type="button" class="btn btn-danger" id="pre-3">Quay lại</button>
   <button type="button" class="btn btn-primary" id="thanhtoanvnpay">Tiến hành thanh toán</button>
</div>
          
        </div>
<!---->





         </form> 
								</div>
							</div>
						</div>
					</div>
</div>
					<!-- SIDEBAR-->
					<div class="col-md-3">
						<div class="sidebar-wrap">
							<div class="side search-wrap animate-box">
								<h3 class="sidebar-heading">{{$tour->tentour}}</h3>
								<img src="admin/images/tour/{{$tour->hinhanh}}" width="225" height="225" alt="image">
								<form method="post" class="colorlib-form">
				              	<div class="row">
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="name">  <i class="fa fa-barcode"></i> Mã tour : {{$tour->id}}</label>
				                    
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group">
				                    <label for="name">  <i class="fa fa-calendar"></i> Thời gian : {{$tour->songay}} ngày {{$tour->sodem}} đêm</label>
				                    
				                  </div>
				                </div>
				                <div class="col-md-12">
				         <div class="form-group">
				         			<input type="hidden" id="tiennl" value ="{{$tour->gianguoilon}}">
				                    <label for="name" >  <i class="fa fa-user"></i> Giá người lớn : {{$tour->gianguoilon}} VND  </label>
    								<span id="slnguoilon" style="color: #ffdd00 ; font-size: 14px;font-weight: bold;" title="1">X 1</span>
				                  </div>
				                </div>
				                       <div id="divtreem" class="col-md-12" style="display: none">
				              <div class="form-group" >
				              	<input type="hidden" id="tiente" value ="{{$tour->giatreem}}">
				                    <label for="name">  <i class="fa fa-male"></i> Giá trẻ em : {{$tour->giatreem}} VND </label>
				                    	<span id="sltreem" style="color: #ffdd00 ; font-size: 14px;font-weight: bold;" title="0"></span>
				                    
				                  </div>
				                </div>
				                       <div id="divembe" class="col-md-12" style="display: none">
				              <div class="form-group">
				              	<input type="hidden" id="tieneb" value ="{{$tour->giaembe}}">
				                
				                    <label for="name"  >  <i class="fa fa-gittip"></i> Giá em bé : {{$tour->giaembe}} VND </label>
				                    	<span id="slembe" style="color: #ffdd00 ; font-size: 14px;font-weight: bold;" title="0"></span>
				                  </div>
				                </div>
				                <div class="col-md-12">
				                  <div class="form-group" >
				                    <label id="sumgiatien" for="name" style="color: #ffdd00 ; font-size: 18px;font-weight: bold;">   </label>
				                    
				                  </div>
				                </div>
				              </div>
				            </form>
							</div>
				
					
					
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
$(document).ready( function()
{


 

$("#nguoilon").on('change', function () {
    $("#slnguoilon").html(' X ' + this.value);
    $("#slnguoilon").attr('title',this.value);   

           
});

$("#treem").on('change', function () {
	if(this.value != 0)
	$("#divtreem").attr('style',"display: block;");
	 else $("#divtreem").attr('style',"display: none;");           
    $("#sltreem").html(' X ' + this.value); 
     $("#sltreem").attr('title',this.value);  
        
});

$("#embe").on('change', function () {
	if(this.value != 0)
	$("#divembe").attr('style',"display: block;");
	 else $("#divembe").attr('style',"display: none;");           
    $("#slembe").html(' X ' + this.value); 
     $("#slembe").attr('title',this.value);   
            
});
    var sumgiatien =$('#tiennl').val() * $("#slnguoilon").attr('title') ; 
    $("#tongtien").attr('value',sumgiatien); 
     $("#amount").attr('value',sumgiatien); 
     
   $("#sumgiatien").html('<i class="fa fa-money"></i> TỔNG : ' + sumgiatien+' VND');
$("input[type='number']").on('change', function () {
 sumgiatien =0;
 	sumgiatien = $('#tiennl').val() * $("#slnguoilon").attr('title') ;
 if($("#sltreem").attr('title') > 0    &&  $("#slembe").attr('title') == 0  ){
 	sumgiatien =0;
 	sumgiatien = $('#tiennl').val() * $("#slnguoilon").attr('title') ;
 	sumgiatien += $('#tiente').val() * $("#sltreem").attr('title') ;
 	 }

  if($("#sltreem").attr('title') == 0    &&  $("#slembe").attr('title') < 0  ){
 	sumgiatien =0;
 	sumgiatien = $('#tiennl').val() * $("#slnguoilon").attr('title') ;
 	sumgiatien += $('#tieneb').val() * $("#slembe").attr('title') ;
 	 }
 	  if($("#sltreem").attr('title') > 0    &&  $("#slembe").attr('title') > 0  ){
 	sumgiatien =0;
 	sumgiatien = $('#tiennl').val() * $("#slnguoilon").attr('title') ;
 	sumgiatien += $('#tiente').val() * $("#sltreem").attr('title') ;
 	sumgiatien += $('#tieneb').val() * $("#slembe").attr('title') ;

 	 }

 $("#sumgiatien").html('<i class="fa fa-money"></i> TỔNG : ' + sumgiatien+' VND');
$("#tongtien").attr('value',sumgiatien);
$("#amount").attr('value',sumgiatien);  
});
 
$('#dieukhoan').empty();
$('#nguoilon').val("1");
$('#treem').val("");
$('#embe').val("");
$('#agreement').removeAttr("checked");
$('#tenLH').val("");
$('#email').val("");
$('#sdt').val("");
$('#diachiLH').val("");
$('#QGLH').val("");
$('#TPLH').val("");
$('#tenKH').val("");
$('#gioitinh').val("");
$('#sdtKH').val("");
$('#diachiKH').val("");
$('#QGkH').val("");
$('#passport').val("");
$('#1').show();
 $('#2').hide();
 $('#3').hide();
 $('#4').hide();

   $('#next-1').click(function(){
	   var soluong_adult = parseInt($("#nguoilon").val() )  ;
	   if($("#treem").val()!='')
	   var soluong_child=parseInt($("#treem").val() );
	if($("#embe").val()!='')
	var soluong_baby=parseInt($("#embe").val() );

	   
  
  if(document.getElementById('agreement').checked)
{
  $('#2').show();
   $('#1').hide();
   $('#progressBar').css("width",'60%');
   $('#progressText').html("Thông tin liên hệ");
   var html_show ='';
   for (var i = 1; i <= soluong_adult; i++) {
   		html_show +='<h4 class="lead" id="progresstext"><b>Thông tin người lớn #'+i+'</b> </h4><div class="row"><div class="form-group col-md-4 "  style="margin-right: 20px"><label >Tên</label><input type="text" name="nguoilon['+i+'][name]" id="tenKH'+i+'" class="form-control" /></div><div class="form-group col-md-4"  style="margin-right: 20px"><label >Giới tính</label><select class="form-control" name="nguoilon['+i+'][sex]" id="gioitinh'+i+'" title="Giới tính"><option value="Nam">Nam</option><option value="Nữ">Nữ</option></select></div></div><div class="row"><div class="form-group col-md-4 "  style="margin-right: 20px"><label >Số điện thoại</label><input type="text" name="nguoilon['+i+'][phone]" id="sdtKH'+i+'" class="form-control" /></div><div class="form-group col-md-4"  style="margin-right: 20px"><label >Địa chỉ</label><input type="text" name="nguoilon['+i+'][address]" id="diachiKH'+i+'" class="form-control" /></div></div><div class="row"><div class="form-group col-md-4"  style="margin-right: 20px"><label >Quốc gia</label><input type="text" name="nguoilon['+i+'][country]" id="QGkH'+i+'" class="form-control" /></div><div class="form-group col-md-4" ><label >Passport/CMND</label><input type="text" name="nguoilon['+i+'][passport]" id="passport'+i+'" class="form-control" /></div></div><hr>';
   	
   }

      for (var i = 1; i <= soluong_child; i++) {
   		html_show +='<h4 class="lead" id="progresstext"><b>Thông tin trẻ em #'+i+'</b> </h4><div class="row"><div class="form-group col-md-4 "  style="margin-right: 20px"><label >Tên</label><input type="text" name="treem['+i+'][name]" id="tenKH'+i+'" class="form-control" /></div><div class="form-group col-md-4"  style="margin-right: 20px"><label >Giới tính</label><select class="form-control" name="treem['+i+'][sex]" id="gioitinh'+i+'" title="Giới tính"><option value="Nam">Nam</option><option value="Nữ">Nữ</option></select></div></div><div class="row"><div class="form-group col-md-4 "  style="margin-right: 20px"><label >Số điện thoại</label><input type="text" name="treem['+i+'][phone]" id="sdtKH'+i+'" class="form-control" /></div><div class="form-group col-md-4"  style="margin-right: 20px"><label >Địa chỉ</label><input type="text" name="treem['+i+'][address]" id="diachiKH'+i+'" class="form-control" /></div></div><div class="row"><div class="form-group col-md-4"  style="margin-right: 20px"><label >Quốc gia</label><input type="text" name="treem['+i+'][country]" id="QGkH'+i+'" class="form-control" /></div><div class="form-group col-md-4" ><label >Passport/CMND</label><input type="text" name="treem['+i+'][passport]" id="passport'+i+'" class="form-control" /></div></div><hr>';
   	
   }
      for (var i = 1; i <= soluong_baby; i++) {
   		html_show +='<h4 class="lead" id="progresstext"><b>Thông tin em bé #'+i+'</b> </h4><div class="row"><div class="form-group col-md-4 "  style="margin-right: 20px"><label >Tên</label><input type="text" name="embe['+i+'][name]" id="tenKH'+i+'" class="form-control" /></div><div class="form-group col-md-4"  style="margin-right: 20px"><label >Giới tính</label><select class="form-control" name="embe['+i+'][sex]" id="gioitinh'+i+'" title="Giới tính"><option value="Nam">Nam</option><option value="Nữ">Nữ</option></select></div></div><div class="row"><div class="form-group col-md-4 "  style="margin-right: 20px"><label >Số điện thoại</label><input type="text" name="embe['+i+'][phone]" id="sdtKH'+i+'" class="form-control" /></div><div class="form-group col-md-4"  style="margin-right: 20px"><label >Địa chỉ</label><input type="text" name="embe['+i+'][address]" id="diachiKH'+i+'" class="form-control" /></div></div><div class="row"><div class="form-group col-md-4"  style="margin-right: 20px"><label >Quốc gia</label><input type="text" name="embe['+i+'][country]" id="QGkH'+i+'" class="form-control" /></div><div class="form-group col-md-4" ><label >Passport/CMND</label><input type="text" name="embe['+i+'][passport]" id="passport'+i+'" class="form-control" /></div></div><hr>';
   	
   }
   $('#thongtin').append(html_show);
}
else{
   
      $('#dieukhoan').html('(*)Xin hãy chấp nhận điều khoản rồi tiếp tục');
  	return false;
}
     });

});
 

     $('#next-2').click(function(){
     	 $('#progressBar').css("width",'100%');
   $('#progressText').html("Hình thức thanh toán");
      $('#3').show();
      $('#2').hide();
     });

      $('#pre-1').click(function(){
      	   $('#progressBar').css("width",'30%');
   $('#progressText').html("Số lượng khách hàng");

$('#thongtin').empty();
      $('#1').show();
      $('#2').hide();
     });

       $('#pre-2').click(function(){
       	   $('#progressBar').css("width",'60%');
   $('#progressText').html("Thông tin liên hệ");

      $('#2').show();
      $('#3').hide();
     });
 $('#next-3').click(function(){
       	   
   $('#progressText').html("Thanh toán VN PAY");

      $('#4').show();
      $('#3').hide();
     });
$('#pre-3').click(function(){
       	   $('#progressBar').css("width",'100%');
   $('#progressText').html("Hình thức thanh toán");
      $('#3').show();
      $('#4').hide();
     });
 $('#checkout_form').on('submit', function(event){
  event.preventDefault();
  
   $.ajax({
    url:"{{ route('postCheckout') }}",
    method:"POST",
    data: new FormData(this),
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
    	if(data.success){
            Swal.fire({     
                 type: 'success',
                 title : 'Đơn đặt tour của bạn đã được nhận !',
                text: 'Thông tin về đơn hàng đã được gửi đến email của bạn !',
                showConfirmButton: false,
                  timer: 3000
              })
              setTimeout(function(){
                        window.location.href = '{{URL::to("tours")}}'
                        
                                }, 3500);   

    	}

    }
   });
  
  
 });
 $('#thanhtoanvnpay').on('click', function(event){
  event.preventDefault();
  $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

   myForm = document.getElementById('checkout_form');
	formData = new FormData(myForm);
   $.ajax({
    url:"{{ route('postCheckoutVNPAY') }}",
    method:"POST",
    data:formData,
    contentType: false,
    cache:false,
    processData: false,
    dataType:"json",
    success:function(data)
    {
    	if(data.success)
    		console.log(data.success);
    		window.location.href = data.success;
    }
   });
  
  
 });
</script>
@endsection
