<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Post;
use App\Models\BinhLuan;
use App\Models\Notification;
use App\Models\DonDatTour;
use Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
class AdminController extends Controller
{
    

    public function postLoadNotification(Request $request){

        $unseen_notification= Notification::where('status',0)->get()->count();// Yêu cầu hướng dẫn viên
        $unseen_notification2= Post::where('status',0)->get()->count(); // Ý kiến đánh giá của khách
        $unseen_notification3= BinhLuan::where('status',0)->get()->count();  //Bình luận về tour du lịch
        $unseen_notification4= DonDatTour::where('status',0)//Đơn đặt tour du lịch

                                          ->orWhere('seen',0)
                                          ->get()->count();  

// Yêu cầu hướng dẫn viên
        $all= Notification::join('users', 'notification.user_id', '=', 'users.id')
            ->select('notification.*', 'users.name')
            ->orderBy('created_at', 'desc')
            ->get(); 

        $notification= '';
        if($all->count()==0)  $notification .= '<div class="text-truncate">Không có yêu cầu nào</div> ';
       
    else{

         foreach ($all as $value) {

            if($value->status ==0){
                $notification .= '<a class="dropdown-item d-flex align-items-center "  href="yeucau">';
                $notification .= ' <div class="dropdown-list-image mr-3">';
                $notification .= ' <div class="icon-circle bg-primary"><i class="far fa-envelope text-white"></i></div> </div>'; 
                $notification .= ' <div class="font-weight-bold">';
                $notification .= '<div class="text-truncate">'.$value->noidung.'</div>';
                $notification .= '<div class="small text-gray-500">'.$value->name.' · '.$value->created_at.'</div></div> </a>';         
            }

            else{
                $notification .= '<a  class="dropdown-item d-flex align-items-center" href="yeucau">';
                $notification .= '  <div class="dropdown-list-image mr-3">';
                $notification .= ' <div class="icon-circle bg-secondary"><i class="far fa-envelope-open text-white"></i></div> </div>';
                $notification .= ' <div><div class="text-truncate">'.$value->noidung.'</div>';
                $notification .= ' <div class="small text-gray-500">'.$value->name.' · '.$value->created_at.'</div></div> </a>';         
                }

            }
    }



// Ý kiến đánh giá của khách
        $all2= Post::join('users', 'posts.userid', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->orderBy('created_at', 'desc')
            ->get();

                    $notification2= '';
        if($all2->count()==0)  $notification2 .= '<div class="text-truncate">Không có ý kiến nào</div> ';
       
    else{

         foreach ($all2 as $value) {

            if($value->status ==0){
                $notification2 .= '<a class="dropdown-item d-flex align-items-center "  href="ykien">';
                $notification2 .= ' <div class="dropdown-list-image mr-3">';
                $notification2 .= ' <div class="icon-circle bg-primary"><i class="fas fa-check-circle text-white"></i></div> </div>'; 
                $notification2 .= ' <div class="font-weight-bold">';
                $notification2 .= '<div class="text-truncate">'.$value->post.'</div>';
                $notification2 .= '<div class="small text-gray-500">'.$value->name.' · '.$value->created_at.'</div></div> </a>';         
            }

            else{
                $notification2 .= '<a  class="dropdown-item d-flex align-items-center" href="ykien">';
                $notification2 .= '  <div class="dropdown-list-image mr-3">';
                $notification2 .= ' <div class="icon-circle bg-secondary"><i class="far fa-check-circle text-white"></i></div> </div>';
                $notification2 .= '<div> <div class="text-truncate">'.$value->post.'</div>';
                $notification2 .= ' <div class="small text-gray-500">'.$value->name.' · '.$value->created_at.'</div></div> </a>';         
                }

            }
    }

//Bình luận về tour du lịch
        $all3= BinhLuan::join('users', 'binhluan.user_id', '=', 'users.id')
                        ->join('tour', 'binhluan.tour_id', '=', 'tour.id')
            ->select('binhluan.*', 'users.name', 'tour.tentour')
            ->orderBy('created_at', 'desc')
            ->get();

   
        $notification3= '';
        if($all3->count()==0)  $notification3 .= '<div class="text-truncate">Không có bình luận nào</div> ';
       
    else{

         foreach ($all3 as $value) {

            if($value->status ==0){
                $notification3 .= '<a class="dropdown-item d-flex align-items-center "  href="comment_tour">';
                $notification3 .= ' <div class="dropdown-list-image mr-3">';
                $notification3 .= ' <div class="icon-circle bg-primary"><i class="fas fa-comment-dots text-white"></i></div> </div>'; 
                $notification3 .= ' <div class="font-weight-bold">';
                $notification3 .= '<div class="text-truncate" style="color : blue ;">'.$value->tentour.'</div>';
                $notification3 .= '<div class="font-truncate">'.$value->body.'</div>';
                $notification3 .= '<div class="small text-gray-500">'.$value->name.' · '.$value->created_at.'</div></div> </a>';         
            }

            else{
                $notification3 .= '<a  class="dropdown-item d-flex align-items-center" href="comment_tour">';
                $notification3 .= '  <div class="dropdown-list-image mr-3">';
                $notification3 .= ' <div class="icon-circle bg-secondary"><i class="fas fa-comment-dots text-white"></i></div> </div>';
                 $notification3 .= '<div><div class="text-truncate" style="font-weight: bold;">'.$value->tentour.'</div>';
                $notification3 .= ' <div class="font-truncate">'.$value->body.'</div>';
                $notification3 .= ' <div class="small text-gray-500">'.$value->name.' · '.$value->created_at.'</div></div> </a>';         
                }

            }
    }
    //Đơn đặt tour du lịch
        $all4= DonDatTour::join('users', 'dondattour.user_id', '=', 'users.id')
                        ->join('tour', 'dondattour.tour_id', '=', 'tour.id')
            ->select('dondattour.*', 'users.name', 'tour.tentour')
            ->orderBy('created_at', 'desc')
            ->get();

   
        $notification4= '';
        if($all4->count()==0)  $notification4 .= '<div class="text-truncate">Không có đơn đặt tour nào</div> ';
       
    else{

         foreach ($all4 as $value) {

            if($value->seen ==0){


              if($value->status ==0){
                $notification4 .= '<a class="dropdown-item d-flex align-items-center "  href="donhang">';
                $notification4 .= ' <div class="dropdown-list-image mr-3">';
                $notification4 .= ' <div class="icon-circle bg-primary"><i class="fas fa-file-invoice text-white"></i></div> </div>'; 
                $notification4 .= ' <div class="font-weight-bold">';
                $notification4 .= '<div class="text-truncate" style="color : blue ;">'.$value->tentour.'</div>';
                $notification4 .= '<div class="font-truncate">'.$value->tongtien.' VNĐ</div>';
                $notification4 .= '<div class="small text-gray-500">'.$value->name.' · '.$value->created_at.'</div></div> </a>';
                }

                if($value->status ==1){
                $notification4 .= '<a class="dropdown-item d-flex align-items-center " id="sold" title="'.$value->id.'">';
                $notification4 .= ' <div class="dropdown-list-image mr-3">';
                $notification4 .= ' <div class="icon-circle bg-success"><i class="fas fa-donate text-white"></i></div> </div>'; 
                $notification4 .= ' <div class="font-weight-bold">';
                $notification4 .= '<div class="text-truncate" style="color : #1cc88a!important ;">'.$value->tentour.'</div>';
                $notification4 .= '<div class="font-truncate" style="color : #1cc88a!important ;">'.$value->tongtien.' VNĐ</div>';
                $notification4 .= '<div class="small text-gray-500" style="color : #1cc88a!important ;">'.$value->name.' · '.$value->created_at.'</div></div> </a>';
                }


            }

            else{
              if($value->thanhtoan=='Thanh toán tại công ty'){
                $notification4 .= '<a  class="dropdown-item d-flex align-items-center" href="donhang">';
                $notification4 .= '  <div class="dropdown-list-image mr-3">';
                $notification4 .= ' <div class="icon-circle bg-secondary"><i class="fas fa-file-invoice text-white"></i></div> </div>';
                 $notification4 .= '<div><div class="text-truncate" style="font-weight: bold;">'.$value->tentour.'</div>';
                $notification4 .= ' <div class="font-truncate">'.$value->tongtien.' VNĐ </div>';
                $notification4 .= ' <div class="small text-gray-500">'.$value->name.' · '.$value->created_at.'</div></div> </a>';
                }
                else
                   {
                $notification4 .= '<a  class="dropdown-item d-flex align-items-center">';
                $notification4 .= '  <div class="dropdown-list-image mr-3">';
                $notification4 .= ' <div class="icon-circle bg-secondary"><i class="fas fa-donate text-white"></i></div> </div>';
                 $notification4 .= '<div><div class="text-truncate" style="font-weight: bold;">'.$value->tentour.'</div>';
                $notification4 .= ' <div class="font-truncate">'.$value->tongtien.' VNĐ </div>';
                $notification4 .= ' <div class="small text-gray-500">'.$value->name.' · '.$value->created_at.'</div></div> </a>';
                }      
                }

            }
    }
            
              return response()->json(['notification'=>$notification,'unseen_notification'=>$unseen_notification,'notification2'=>$notification2,'unseen_notification2'=>$unseen_notification2,'notification3'=>$notification3,'unseen_notification3'=>$unseen_notification3,'notification4'=>$notification4,'unseen_notification4'=>$unseen_notification4]);

        }

      
 /*<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Doanh thu tháng <?php 
                    $date = getdate(); echo $date['mon'];
                     ?>
                    </div>

                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                       $tongthang = 0;
                       $dem = 0 ;
                       $date = getdate();
                     
                        if($date['mon'] < 10)
                          $month = '0'.$date['mon'];
                        else $month = $date['mon'];
                       
                       foreach ($doanhthu as $dt){
                      if($dt->status==1) 
                    $dem += 1;
                      if($dt->status==1 && $month==$dt->created_at->format('m'))
                           $tongthang += $dt->tongtien;
                       }
                       echo ($dem);
                 
                     ?> VNĐ </div>
                  </div>

*/
    

    public function gettrangchu(){
      $year = getdate();
       $doanhthu= DonDatTour::whereYear('created_at',$year['year'])
       ->where('status',1)
       ->get();

        
    	return view('admin.trangchu',compact('doanhthu'));
    }
    public function getloginAdmin(){

    	return view('admin.login');
    }
    public function getlogoutAdmin(){

          Auth::guard('admin')->logout();
          return redirect('admin/dangnhap')->with('success','Đăng xuất thành công ! Tạm biệt ');
    }
    public function postloginAdmin(Request $request){
    $validator = \Validator::make($request->all(), [
             'email'=>'required|email',
         'password'=>'required|min:6|max:20',
       ],
         [
        'email.required'=>'Bạn chưa nhập Email',
        'email.email' => 'Email không đúng định dạng',
        'password.required'=>'Bạn chưa nhập mật khẩu',
        'password.min'=>'Mật khẩu không được nhỏ hơn 6 kí tự',
        'password.max'=>'Mật khẩu không được lớn hơn 20 kí tự'

          ]);

          if ($validator->fails()){
              return response()->json(['errors'=>$validator->errors()->all()]);
            }
          else{
                $login=['email'=>$request->email,'password'=>$request->password];
                  if(Auth::guard('admin')->attempt($login))
                    return response()->json(['success'=>'Đăng nhập thành công']);
                  else{
                    $errors = 'Email hoặc mật khẩu không đúng';
                    return response()->json(['errorLogin'=>$errors]);
            }
      }
    }
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Admin::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.admin_manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Admin::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id="")
    {       $image_name = $request->hidden_image;
        $image = $request->file('image');






           if($request->changepass == "on"){
                        if($image!=''){
                                $rules = array(
                            'admin_name'    =>  'required',
                            'admin_email'    =>  'required',
                            'hinhanh' => 'image|max:2048',
                            'admin_pass'    =>  'required',
                            'admin_cfpass'    =>  'required|same:admin_pass'
                                );}
                        else
                            $rules = array(
                            'admin_name'    =>  'required',
                            'admin_email'    =>  'required',
                            'admin_pass'    =>  'required',
                            'admin_cfpass'    =>  'required|same:admin_pass'
                                );}
            else{
                         if($image!=''){
                        $rules = array(
                        'admin_name'    =>  'required',
                        'admin_email'    =>  'required',
                        'hinhanh' => 'image|max:2048');}
                        else
                            $rules = array(
                            'admin_name'    =>  'required',
                            'admin_email'    =>  'required',
                            
                                );
            }
            
     
            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
       if($request->admin_pass){
                if($image!=''){
                        $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/images/admin'), $image_name);
                    $form_data = array(
                        'hoten'         =>  $request->admin_name,
                        'email'        =>  $request->admin_email,
                        'password'     =>  bcrypt($request->admin_pass),
                        'hinhanh'   =>  $image_name
                    );}
                    else{
                        $form_data = array(
                        'hoten'         =>  $request->admin_name,
                        'email'        =>  $request->admin_email,
                        'password'     =>  bcrypt($request->admin_pass)
                    );
                    }
                            }
         else{
                 if($image!=''){  $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/images/admin'), $image_name);
            $form_data = array(
            'hoten'         =>  $request->admin_name,
            'email'        =>  $request->admin_email,
            'hinhanh'    => $image_name

        );}
                    else{
                        $form_data = array(
                        'hoten'         =>  $request->admin_name,
                        'email'        =>  $request->admin_email,
                        
                    );
                    }
         }
        
        Admin::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Admin::find($id);
        $data->delete();
    }
public function getDataChart($year)
{
  
  $data=DB::table('dondattour')
->select(DB::raw('MONTH(created_at) as month'), DB::raw('sum(tongtien) as cost'))
->whereYear('created_at',$year)
 ->where('status',1) ->groupBy('month')
->get();


  return response()->json(['data'=>$data]);
}

public function getPieChart()
{
  
  $tour=DB::table('tour')
->select(DB::raw('count(*) as sl_tour'))
->first();
  $nhahang=DB::table('nhahang')
->select(DB::raw('count(*) as sl_nhahang'))
->first();
  $khachsan=DB::table('khachsan')
->select(DB::raw('count(*) as sl_khachsan'))
->first();
  $diadanh=DB::table('diadanh')
->select(DB::raw('count(*) as sl_diadanh'))
->first();

  return response()->json(['tour'=>$tour,'diadanh'=>$diadanh,'nhahang'=>$nhahang,'khachsan'=>$khachsan]);
}




  }
