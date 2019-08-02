

127.0.0.1 vinatour.test
127.0.0.1 localhost
::1 localhost

## Apache chạy ở port 80 mặc định. Hãy điền cổng mà apache bạn cấu hình
<!-- <VirtualHost *:80> -->
    ## Khai báo mail quản trị của bạn (Tùy chọn)
    ServerAdmin vinatourcorp@gmail.com
    ## Thư mục gốc của dự án website của bạn (Bắt buộc)
    DocumentRoot "D:/xampp/htdocs/tourtravel/public/"
    ## Khai báo domain ảo của bạn (Bắt buộc)
    ServerName vinatour.test
    ## Khai báo một tên phụ cho domain ảo (Tùy chọn)
    ServerAlias www.vinatour.test
    ##Khai báo tập tin log các lỗi từ domain (Tùy chọn)
    ErrorLog "logs/vinatour.test.log"
    CustomLog "logs/vinatour.test.log" common
<!-- </VirtualHost> -->




<div id="formModal-thanhtoan" class="modal fade" role="dialog">
 <div class="modal-dialog modal-dialog-scrollable" style="max-width: 1200px; margin: 1.75rem auto;">
  <div class="modal-content">
   <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thanh toán</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
        <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <div id="1">
          <b class="lead" id="progresstext">Số lượng khách hàng</b>
           <div class="form-group">
            <label class="control-label col-md-4">Người lớn </label>
           
             <input type="number" min="1" name="nguoilon" id="nguoilon" class="form-control" />
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">Trẻ em : </label>
           
             <input type="number" min="0" name="treem" id="treem" class="form-control" />
            
           </div>
            <div class="form-group">
            <label class="control-label col-md-4">Em bé : </label>
           
             <input type="number" min="0" name="embe" id="embe" class="form-control" />
            
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
<div class="form-group">
  <label>
   <input type="checkbox" id="agreement" name="agreement" required="required" >Tôi đã đọc và đồng ý
   </label>
   <b class="form-text text-danger" id="dieukhoan"></b>
</div>
<div class="form-group">
  <button class="btn btn-primary" id="next-1">Tiếp tục</button>
</div>
</div>


          </div>
          <div id="2" style="display: none">
            <H4 class="lead" id="progresstext">Thông tin liên hệ</H4>
            <div class="row">
            <div class="form-group ">
            <label class="control-label col-md-4">Tên</label>
            <div class="col-md-8">
             <input type="text" name="tenLH" id="tenLH" class="form-control" />
             <b class="form-text text-danger" id="dieukhoan"></b>
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">Email</label>
            <div class="col-md-8">
             <input type="email" name="email" id="email" class="form-control" />
            </div>
           </div>
            </div>

             <div class="row">
           <div class="form-group ">
            <label class="control-label col-md-4">Số điện thoại</label>
            <div class="col-md-8">
             <input type="tel" name="sdt" id="sdt" class="form-control" />
            </div>
           </div>


           <div class="form-group">
            <label class="control-label col-md-4">Địa chỉ</label>
            <div class="col-md-8">
             <input type="text" name="diachiLH" id="diachiLH" class="form-control" />
            </div>
           </div>
         </div>

          <div class="row">
           <div class="form-group">
            <label class="control-label col-md-4">Quốc gia</label>
            <div class="col-md-8">
             <input type="text" name="QGLH" id="QGLH" class="form-control" />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">Thành phố</label>
            <div class="col-md-8">
             <input type="text" name="TPLH" id="TPLH" class="form-control" />
            </div>
           </div>
</div>

<h4 class="lead" id="progresstext">Thông tin khách hàng</h4>
            <div class="row">
            <div class="form-group ">
            <label class="control-label col-md-4">Tên</label>
            <div class="col-md-8">
             <input type="text" name="tenKH" id="tenKH" class="form-control" />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">Giới tính</label>
            <div class="col-md-8">
             <select class="form-control col-md-5" name="gioitinh" id="gioitinh" title="Giới tính">
              <option value="0">Nam</option>
              <option value="1">Nữ</option>
            </select>
            </div>
           </div>
            </div>

             <div class="row">
           <div class="form-group ">
            <label class="control-label col-md-4">Số điện thoại</label>
            <div class="col-md-8">
             <input type="tel" name="sdtKH" id="sdtKH" class="form-control" />
            </div>
           </div>


           <div class="form-group">
            <label class="control-label col-md-4">Địa chỉ</label>
            <div class="col-md-8">
             <input type="text" name="diachiKH" id="diachiKH" class="form-control" />
            </div>
           </div>
         </div>

          <div class="row">
           <div class="form-group">
            <label class="control-label col-md-4">Quốc gia</label>
            <div class="col-md-8">
             <input type="text" name="QGkH" id="QGkH" class="form-control" />
            </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-4">Passport</label>
            <div class="col-md-8">
             <input type="text" name="passport" id="passport" class="form-control" />
            </div>
           </div>

<div class="form-group">
  <button class="btn btn-danger" id="pre-1">Quay lại</button>
   <button class="btn btn-primary" id="next-2">Tiếp tục</button>
</div>
          </div>
        </div>

          <div id="3" style="display: none">
            <form>
              <div class="form-group">
               <label class="control-label col-md-4">Mã Tour</label> 
               <input type="text" name="matour">
              </div>

               <div class="form-group">
               <label class="control-label col-md-4">Điểm đến</label> 
               <input type="text" name="diemden">
              </div>

               <div class="form-group">
               <label class="control-label col-md-4">Tên</label> 
               <input type="text" name="ten">
              </div>

               <div class="form-group">
               <label class="control-label col-md-4">Địa chỉ</label> 
               <input type="text" name="diachi">
              </div>

               <div class="form-group">
               <label class="control-label col-md-4">Số điện thoại</label> 
               <input type="text" name="sdt">
              </div>

               <div class="form-group">
               <label class="control-label col-md-4">Email</label> 
               <input type="email" name="email">
              </div>

               <div class="form-group">
               <label class="control-label col-md-4">Ngày xuất phát</label> 
               <input type="text" name="ngayxuatphat">
              </div>

               <div class="form-group">
               <label class="control-label col-md-4">Giá người lớn</label> 
               <input type="text" name="gianguoilom">
              </div>

               <div class="form-group">
               <label class="control-label col-md-4">Tổng tiền</label> 
               <input type="text" name="tongtien">
              </div>

               <div class="form-group">
               <label class="control-label col-md-4">Chọn phương thức thanh toán</label> 
               <input type="radio" name="thanhtoan" value="0">Thanh toán tại công ty
                <input type="radio" name="thanhtoan" value="1">Thanh toán online
              </div>
<div class="form-group">
    <button class="btn btn-danger" id="pre-2">Quay lại</button>
 
</div>
            </form>
          </div>
         </form> 
        </div>
     </div>
    </div>
</div>
<div id="EditComment" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-edit-title">Chỉnh sửa</h4>
        </div>
        <div class="modal-body">
          <span id="form_result"></span>
         <form method="post" id="sample_form_edit" class="form-horizontal" enctype="multipart/form-data">
          @csrf

           <div class="form-group">
            
            <div class="col-md-8">
             <textarea class="form-control z-depth-1" name ="content"id="commentedit" rows="3" style="width: 565px"></textarea>
            </div>
           </div>

           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Lưu thay đổi" />
           </div>
         </form>
        </div>
     </div>
    </div>
</div>