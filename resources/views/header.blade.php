<!--Model sửa Comment-->

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
<!-- Modal In Hải Quan-->
<div id="formModal" class="modal fade" role="dialog">
 <div class="modal-dialog modal-dialog-scrollable">
  <div class="modal-content">
   <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
          <h4 class="modal-title">Thêm Hành Khách</h4>
        </div>
        <div class="modal-body">
         <span id="form_result"></span>
         <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
          @csrf
             <div class="row" >
           <div class="col-md-5" >
            <label>Tên : </label>
   
             <input type="text" name="first_name" id="first_name" class="form-control"  />
       
           </div >
         <div class="col-md-5" >
            <label>Họ : </label>
   
             <input type="text" name="last_name" id="last_name" class="form-control" />
       
           </div></div><br>
             <div class="row">
               <div class="col-md-8" >
            <label>Ngày sinh : </label>
                <input class="form-control" name ="birthday"type="date"  id="birthday">
  
            </div></div><br>
             <div class="row" >
           <div class="col-md-5" >
            <label>Quốc Tịch : </label>
   
             <input type="text" name="country_name" id="country_name" class="form-control"  />
       
           </div >
         <div class="col-md-5" >
            <label>Thành Phố : </label>
   
             <input type="text" name="city_name" id="city_name" class="form-control" />
       
           </div></div><br>


              <div class="row">
               <div class="col-md-8" >
            <label>Mục đích : </label>
         
             <select class="form-control" name="purpose" id="purpose" title="Chọn mục đích">
              
               <option value="1">1 - Khách du lịch</option>
               <option value="2">2 - Công việc</option>
               <option value="3">3 - Thăm hỏi</option>
               <option value="0">Khác</option>
             </select>
            </div></div><br>
                    <div class="row" >
           <div class="col-md-12" >
            <label>Có tiền sử bị trục xuất hoặc từ chối nhập cảnh ?&emsp;</label>
   
           <input type="checkbox" name="option1" id="opt1"  />
           
           </div ></div>
                   <div class="row" >
           <div class="col-md-12" >
            <label>Có tiền sử bị kết án tội phạm ?&emsp;</label>
   
           <input type="checkbox" name="option2" id="opt2"  />
           
           </div ></div>
                   <div class="row" >
           <div class="col-md-12" >
            <label>Có sở hữu những chất cấm, vũ khí, thuốc nổ?&emsp;</label>
   
           <input type="checkbox" name="option3" id="opt3"  />
           
           </div ></div>
       
      
           <br />
           <div class="form-group" align="center">
            <input type="hidden" name="action" id="action" />
            <input type="hidden" name="hidden_id" id="hidden_id" />
            <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Thêm" />
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
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
                <h2 class="modal-title">Xác nhận xóa ?</h2>
            </div>
            <div class="modal-body">
                <h4 id="confirmtext" align="center" style="margin:0;">Bạn chắc chắn muốn xóa hành khách này ?</h4>
                <span id="result">

                </span>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>
<div id="confirmModal-del" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
                <h2 class="modal-title">Xác nhận xóa ?</h2>
            </div>
            <div class="modal-body">
                <h4 id="confirmtext" align="center" style="margin:0;">Bạn chắc chắn muốn xóa không ?</h4>
                <span id="result">

                </span>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button-del" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>
<!--  Modal Xin làm  HDV -->
  <div class="modal fade" id="hdvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận đề nghị</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> X </span>
          </button>
        </div>
        <div class="modal-body">Bạn chắc chắn muốn cấp quyền hướng dẫn viên ?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
           <button class="btn btn-primary" id="ajaxHDV" type="button" data-dismiss="modal">Chắc chắn</button>
        </div>
      </div>
    </div>
  </div>
<!--Modal -->
             <div class="modal fade login" id="loginModal">
        <div class="modal-dialog login animated">
            <div class="modal-content">
               <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Đăng nhập </h4>
                  </div>
                  <div class="modal-body">
                      <div class="box">
                           <div class="content">

                              <div class="form loginBox">
                                 <div class="social">

                                  <a id="google_login" class="circle google" href="{{url('/redirectGG')}}">
                                      <i class="fa fa-google-plus fa-fw"></i>
                                  </a>
                                  <a id="facebook_login" class="circle facebook" href="{{url('/redirectFB')}}">
                                      <i class="fa fa-facebook fa-fw"></i>
                                  </a>
                              </div>
                              <div class="division">
                                  <div class="line l"></div>
                                    <span>hoặc</span>
                                  <div class="line r"></div>
                              </div>
                                  <div class="alert alert-danger" style="display:none"></div>
                                   <div class="alert alert-success" style="display:none"></div>
                                  <form method="POST" enctype="multipart/form-data"  action="{{url('dangnhap')}}">
                                      @csrf
                              <fieldset>
                                  <input id="email" class="form-control" type="email" placeholder="Email" name="email">
                                  <input id="password" class="form-control" type="password" placeholder="Mật khẩu" name="password"><br>
                                  <button  class="btn btn-default btn-login"  id="ajaxSubmit">Đăng nhập</button></fieldset>
                                  </form>
                              </div>
                           </div>
                      </div>
                      <div class="box">
                          <div class="content registerBox" style="display:none;">

                           <div class="form">
                              <div class="alert alert-danger" style="display:none"></div>
                                   <div class="alert alert-success" style="display:none"></div>
                              <form method="POST" enctype="multipart/form-data"  action="{{url('dangky')}}">
                                    @csrf
                              <fieldset>
                              <input id="username" class="form-control" type="text" placeholder="Tên đăng nhập" name="username">
                              <input id="passwordReg" class="form-control" type="password" placeholder="Mật khẩu" name="passwordReg">
                              <input id="passwordReg_confirmation" class="form-control" type="password" placeholder="Nhập lại mật khẩu" name="passwordReg_confirmation">
                              <input id="emailReg" class="form-control" type="email" placeholder="Email" name="emailReg"><br>
                              <button  class="btn btn-default btn-login"  id="ajaxSubmitReg">Đăng ký</button></fieldset>
                              </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <div class="forgot login-footer">
                         
                               <a href="{{route('get.reset.password')}}">Quên mật khẩu ?</a>
                          <br>
                          <span>Bạn chưa có tài khoản ?
                               <a href="javascript: showRegisterForm();">ĐĂNG KÍ NGAY</a>
                          </span>

                      </div>
                      <div class="forgot register-footer" style="display:none">
                           <span>Bạn đã có tài khoản ?</span>
                           <a href="javascript: showLoginForm();">ĐĂNG NHẬP NGAY</a>
                      </div>
                  </div>
            </div>
        </div>
    </div>
                <!--END Modal -->
<div class="colorlib-loader"></div>

<div id="page">

  <nav class="colorlib-nav" role="navigation">

    <!--Login/Logout-->

    <div>

            <div class="col-xs-6 col-md-4 col-md-offset-8">
                  <!-- Right Side Of Navbar -->
                  <ul style="float: right; margin-right: 30px">
                      <!-- Authentication Links -->

                           @guest
                          <li class="nav-item">
                              <button class="btn btn-primary btn-rounded" href="#"data-toggle="modal" data-target="#loginModal"><img src="images/login.png">Đăng nhập</button>
                          </li>
                           @endguest
                  </ul>
              </div>
          </div><br>

              <!-- Cart -->
             
             <!--endcart-->
          <!--END Login/Logout-->
    <div class="top-menu">
     
      <div class="container-fluid">
        <div class="row" id="myDIV">

          <div class="col-xs-1">
            <div id="colorlib-logo"><a href="{{route('index')}}">VinaTour</a></div>
          </div>
          <div class="col-xs-11 text-right menu-1">
            <ul>
              <li ><a  href="{{route('index')}}"><b>Trang Chủ</b></a></li>
              <li  class="has-dropdown">
                <a href="{{route('tours')}}"><b>Tours</b><span class="caret"></span></a>
                <ul class="dropdown">
                  <li><a href="{{route('quocnoi', 0)}}"><b>- Trong nước</b></a></li>
                                      <li><a href="{{route('quocte', 1)}}"><b>- Ngoài nước</b></a></li>
                </ul>
              </li>
                <li  class="has-dropdown">
                <a href="{{route('tours_tk')}}"><b>Tour Tham Khảo</b><span class="caret"></span></a>
                <ul class="dropdown">
                  <li><a href="{{route('quocnoi_tk', 0)}}"><b>- Trong nước</b></a></li>
                                      <li><a href="{{route('quocte_tk', 1)}}"><b>- Ngoài nước</b></a></li>
                </ul>
              </li>
              <li ><a href="{{route('hotels')}}"><b>Khách Sạn</b></a></li>
                              <li id="nhahang"><a href="{{route('nhahang')}}"><b>Nhà Hàng</b></a></li>
                              <li id="diadanh"><a href="{{route('diadanh')}}"><b>Địa Danh</b></a></li>
              <li ><a href="{{route('services')}}"><b>Dịch vụ</b></a></li>
              
              <li  ><a href="{{route('about')}}"><b>Giới thiệu</b></a></li>

                              @if(Auth::guard('web')->check())
                              <li class="has-dropdown">
                                  <a><img src="images/login.png"><b>{{ Auth::user()->name }}</b><span class="caret"></span></a>
                                  <ul class="dropdown">

                                      <li>
                                        <a class="dropdown-item" href="{{route('profile')}}">
                                            <i class="fa fa-info"></i>&nbsp;<b>Tài khoản</b>
                                        </a>
                                      </li><hr>           
                @if(Auth::user()->role == 1|| Auth::user()->role == 3)
                                        <li>
                                          <a class="dropdown-item" href="{{route('inhaiquan')}}">
                                            <i class="fa fa-print"></i>&nbsp;<b>In hải quan</b>
                                            </a>
                                        </li><hr>      
                                         @endif

                                      <li>  <a   class="dropdown-item " href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i><b>
                                      {{ __('Đăng xuất') }}</b>
                                  </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form></li>
                                  </ul>

                              </li>@endif
            </ul>
          </div>
        </div>

      </div>
    </div>
  </nav>


  
