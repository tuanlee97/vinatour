<!DOCTYPE html>
<html lang="en">

<head>
  <base href="{{asset('')}}admin/">
    <meta name="_token" content="{{csrf_token()}}" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>VinaTour Admin Page</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- jQuery & Bootstrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<link href="css/bootswatch-4.3.1.min.css" rel="stylesheet">
      <script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="trangchu">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">VinaTour Admin Page</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="trangchu">
        <i class="fa fa-home fa-fw"></i>
          <span>Trang Chủ</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Quản lí
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTour" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-paper-plane"></i>
          <span>Tour du lịch:</span>
        </a>
        <div id="collapseTour" class="collapse" aria-labelledby="headingTour" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="{{route('tour.index')}}">Tour</a>
          
          <a class="collapse-item" href="{{route('loaitour.index')}}">Loại Tour</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsevtdl" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-map"></i>
          <span>Vị trí địa lí:</span>
        </a>
        <div id="collapsevtdl" class="collapse" aria-labelledby="headingvtdl" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="{{route('quocgia.index')}}">Quốc gia</a>
            <a class="collapse-item" href="{{route('tinh.index')}}">Tỉnh</a>
            <a class="collapse-item" href="{{route('diadanh.index')}}">Địa danh</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseuser" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Người dùng:</span><span id ="unreadtotal2" ></span>
        </a>
        <div id="collapseuser" class="collapse" aria-labelledby="headinguser" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="{{route('khachhang.index')}}">Khách hàng</a>
            <a class="collapse-item" href="{{route('quantrivien.index')}}">Quản lí</a>
            
            
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseothers" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Dịch vụ :</span>
        </a>
        <div id="collapseothers" class="collapse" aria-labelledby="headingothers" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="{{route('nhahang.index')}}">Nhà hàng</a>
            <a class="collapse-item" href="{{route('khachsan.index')}}">Khách sạn</a>
          </div>
        </div>
      </li>
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseyc" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-reply-all"></i>
          <span>Yêu cầu và ý kiến : </span><span id ="unreadtotal" ></span>
        </a>
        <div id="collapseyc" class="collapse" aria-labelledby="headingothers" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="{{route('yeucau.index')}}">Yêu cầu <span id ="unread1" ></span></a>
            <a class="collapse-item" href="{{route('ykien.index')}}">Ý kiến khách hàng <span id ="unread2" ></span></a>
             <a class="collapse-item" href="{{route('comment_tour.index')}}">Bình luận <span id ="unread3" ></span></a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsexlt" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-list-alt"></i>
          <span>Xử lý đơn đặt tour : </span><span id ="unreadtotal" ></span>
        </a>
        <div id="collapsexlt" class="collapse" aria-labelledby="headingothers" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">

            <a class="collapse-item" href="{{route('donhang.index')}}">Đơn đặt tour chưa xử lý<span id ="unread4" ></span></a>
            <a class="collapse-item" href="{{route('donhang_done.index')}}">Đơn đã xử lý</a>
            <a class="collapse-item" href="{{route('tuchon.index')}}">Tự chọn Tour</a>
          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="commentsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
                <i class="fas fa-file-invoice-dollar fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter count4"></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                 Đơn đặt tour
                </h6>
          <div id="thongbao4" style="overflow-y:scroll; height:150px;">
                  <!--Thông báo ở đẩy-->
                  
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="donhang">Hiển thị tất cả</a>
              </div>
            </li>





            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="commentsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
                <i class="fas fa-comments fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter count3"></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                 Bình luận
                </h6>
          <div id="thongbao3" style="overflow-y:scroll; height:150px;">
                  <!--Thông báo ở đẩy-->
                  
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="comment_tour">Hiển thị tất cả</a>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter count2"></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                 Ý kiến khách hàng
                </h6>
          <div id="thongbao2" style="overflow-y:scroll; height:120px;">
                  <!--Thông báo ở đẩy-->
                  
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="ykien">Hiển thị tất cả</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter count"></span>
              </a>
              <!-- Dropdown - Messages -->
              <div  class=" dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown" >
                <h6 class="dropdown-header">
                  Thư yêu cầu
                </h6>
                  <div id="thongbao" style="overflow-y:scroll; height:120px;">
                  <!--Thông báo ở đẩy-->
                  
                </div>
                <a class="dropdown-item text-center small text-gray-500" href="yeucau">Hiển thị tất cả</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::guard('admin')->user()->hoten}}</span>
                <img class="img-profile rounded-circle" src="images/admin/{{Auth::guard('admin')->user()->hinhanh}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Hồ sơ cá nhân
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Đăng xuất
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

      @yield('ADcontent')

</div>
    <!-- /.container-fluid -->
<!-- End Page Content -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Vinatour.TK 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận đăng xuất</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Chọn nút "Đăng xuất" bên dưới nếu thực sự muốn kết thúc phiên làm việc này.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy bỏ</button>
          <a class="btn btn-primary" href="{{route('adlogout')}}">Đăng xuất</a>
        </div>
      </div>
    </div>
  </div>
  @yield('ADmodal')



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->

  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <!-- Page level custom scripts -->
<script src="js/select2.min.js"></script>

<script>
$(document).ready(function(){
 
 function load_unseen_notification()
 {     $('#unreadtotal').empty(); $('#unreadtotal2').empty();
 $('#unread1').empty();
 $('#unread2').empty();
 $('#unread3').empty();
  $('#unread4').empty();
      $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
  $.ajax({
   url:"{{ route('load') }}",
   method:"POST",
   dataType:"json",
   success:function(data)
   {
    if(data.unseen_notification > 0 || data.unseen_notification2 > 0 || data.unseen_notification3 > 0)
       $('#unreadtotal').append('<i class="fas fa-circle text-danger"></i>');
     if(data.unseen_notification4 > 0 )
       $('#unreadtotal2').append('<i class="fas fa-circle text-danger"></i>');
   ///Thư yêu cầu
    $('#thongbao').html(data.notification);
    if(data.unseen_notification > 0)
    {
     
      $('#unread1').append('<i class="fas fa-circle text-danger"></i>');
     $('.count').html(data.unseen_notification);
    }
    else $('.count').empty();

     ///Ý kiến 
    $('#thongbao2').html(data.notification2);
    if(data.unseen_notification2 > 0)
    {
     
      $('#unread2').append('<i class="fas fa-circle text-danger"></i>');
     $('.count2').html(data.unseen_notification2);
    }
    else $('.count2').empty();


 ///Bình luận tour
    $('#thongbao3').html(data.notification3);
    if(data.unseen_notification3 > 0)
    {
      
      $('#unread3').append('<i class="fas fa-circle text-danger"></i>');
     $('.count3').html(data.unseen_notification3);
    }
    else $('.count3').empty();
    ///Bill tour
    $('#thongbao4').html(data.notification4);
    if(data.unseen_notification4 > 0)
    {
      
      $('#unread4').append('<i class="fas fa-circle text-danger"></i>');
     $('.count4').html(data.unseen_notification4);
    }
    else $('.count4').empty();


   }
  });
 }
 
 load_unseen_notification();
 

 $(document).on('click', '#messagesDropdown', function(){
  $('.count').html('');
 
 });
 $(document).on('click', '#alertsDropdown', function(){
  $('.count2').html('');
 
 });
  $(document).on('click', '#commentsDropdown', function(){
  $('.count3').html('');
 
 });
  $(document).on('click', '#commentsDropdown', function(){
  $('.count4').html('');
 
 });
  setInterval(function(){ 
  load_unseen_notification();
 }, 5000);
});
</script>


  @yield('ADscript')

</body>

</html>
