@extends('admin.ADtemplate.ADmaster')

        <!-- DataTables Example -->
        @section('ADcontent')
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Tổng quan</h1>
         
        </div>

        <!-- Content Row -->
        <div class="row">

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Doanh thu tháng <?php 
                    $date = getdate(); echo $date['mon'];
                     ?>
                    </div>

                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                       $tongthang = 0;
           
                       $date = getdate();
                     
                        if($date['mon'] < 10)
                          $month = '0'.$date['mon'];
                        else $month = $date['mon'];
                       
                       foreach ($doanhthu as $dt){
                   
                      if($dt->status==1 && $month==$dt->created_at->format('m'))
                           $tongthang += $dt->tongtien;
                       }
                       echo number_format($tongthang);
                 
                     ?> VNĐ </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Tổng doanh thu</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                       $tongdoanhthu = 0;
                       foreach ($doanhthu as $dt)
                           $tongdoanhthu += $dt->tongtien;
                       echo number_format($tongdoanhthu);
                     ?> VNĐ</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số đơn đặt tour đã nhận</div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$doanhthu->count()}}</div>
                      </div>
                 
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Pending Requests Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Số đơn đặt tour đã xử lí</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                       $xuli = 0;
                       foreach ($doanhthu as $dt)
                       	if($dt->status==1)
                           $xuli ++;
                       echo ($xuli);
                     ?></div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Content Row -->

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Lược đồ thống kê doanh thu</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
               
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Thống kê số lượng </h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Tour
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Nhà hàng
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Khách sạn
                    </span>
                     <span class="mr-2">
                      <i class="fas fa-circle text-warning"></i> Địa danh
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>



        <!-- Content Row -->
       
        @endsection
