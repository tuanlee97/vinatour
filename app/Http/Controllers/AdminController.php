<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Notification;
use Validator;
use Illuminate\Support\Facades\Auth;

use Session;
class AdminController extends Controller
{
    

    public function postLoadNotification(Request $request){

        $unseen_notification= Notification::where('status',0)->get()->count();
            
        $all= Notification::join('users', 'notification.user_id', '=', 'users.id')
            ->select('notification.*', 'users.name')
            ->orderBy('updated_at', 'desc')
            ->get();
      
   
        $notification= '';
        if($all->count()==0)  $notification .= '<div class="text-truncate">Không có yêu cầu nào</div> ';
       
    else{

         foreach ($all as $value) {

            if($value->status ==0){
                $notification .= '<a class="dropdown-item d-flex align-items-center "  href="yeucau">';
                $notification .= ' <div class="dropdown-list-image mr-3">';
                $notification .= ' <img class="rounded-circle" src="" alt=""><div class="status-indicator bg-success"></div> </div>';
                $notification .= ' <div class="font-weight-bold">';
                $notification .= '<div class="text-truncate">'.$value->noidung.'</div>';
                $notification .= '<div class="small text-gray-500">'.$value->name.' · '.$value->updated_at.'</div></div> </a>';         
            }

            else{
                $notification .= '<a  class="dropdown-item d-flex align-items-center" href="yeucau">';
                $notification .= '  <div class="dropdown-list-image mr-3">';
                $notification .= ' <img class="rounded-circle" src="" alt=""> <div class="status-indicator"></div></div><div>';
                $notification .= ' <div class="text-truncate">'.$value->noidung.'</div>';
                $notification .= ' <div class="small text-gray-500">'.$value->name.' · '.$value->updated_at.'</div></div> </a>';         
                }

            }
    }
            
              return response()->json(['notification'=>$notification,'unseen_notification'=>$unseen_notification]);

        }

      



    

    public function gettrangchu(){

    	return view('admin.home');
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
  }
