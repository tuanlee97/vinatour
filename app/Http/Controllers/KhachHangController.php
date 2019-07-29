<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tour;
use App\Models\Tinh;
use App\Models\TuChon;
use App\Models\ChiTietTuChon;
use App\Models\Notification;
use Validator;
use Hash;
use Mail;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class KhachHangController extends Controller
{
     public function postsave_ykien(Request $request ){
 $validator = \Validator::make($request->all(), [
             'content'=>'required',       
       ],
         [
        'content.required'=>'Bạn chưa nhập nội dung',
          ]);

          if ($validator->fails()){
              return response()->json(['errors'=>'Bạn chưa nhập nội dung']);
            }
          else{
                 $form_data = array(
            'post'         =>  $request->content,
            
        );
                   Post::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
            }
      }
 
  public function postsave_phanhoi(Request $request){
    $validator = \Validator::make($request->all(), [
             'content'=>'required',       
       ],
         [
        'content.required'=>'Bạn chưa nhập nội dung',
          ]);

          if ($validator->fails()){
              return response()->json(['errors'=>'Bạn chưa nhập nội dung']);
            }
          else{
                 $form_data = array(
            'comment'         =>  $request->content,
            
        );
                   Comment::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
            }
      }
 
     public function getsua_phanhoi($id){
            $item = Comment::find($id);
     return response()->json(['item'=>$item]);
    
 }
  public function getsua_ykien($id){
    $item = Post::find($id);
     return response()->json(['item'=>$item]);
 }
 public function postxoa_ykien($id){
    $item = Post::find($id);
    $item->delete();
     return response()->json(['success'=>' successfully']);
 }
  public function postxoa_phanhoi($id){
     $item = Comment::find($id);
    $item->delete();
     return response()->json(['success'=>'successfully ']);
  }


    public function postdangkihdv(Request $request){

            $user = Auth::user();
       
     $validator = \Validator::make($request->all(), [
     'lydo' => 'required|min:20',
      'cv' => 'required',
   ],
    [
     'lydo.required'=>'Bạn chưa nhập lý do',
     'lydo.min'=>'Lý do phải có ít nhất 20 kí tự',
     'cv.required'=>'Bạn chưa gửi CV',

      ]);

      if ($validator->fails()){
          return response()->json(['errors'=>$validator->errors()->all()]);
        }

    
      else{
                 $file = $request->file('cv');

        $new_name = rand() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('admin/download/'), $new_name);
                $form_data = array(
            'user_id'         =>  $user->id,
            'noidung'        =>  $request->lydo,
            'file_name'             =>  $new_name,
            'status'        => 0
                );


             Notification::create($form_data);
            
             return response()->json(['success'=>'Data is successfully added']);
        }
}

public function postchangeprofile(Request $request){
  
        $user = Auth::user();
        $otheruser = User::where('email','<>',$user->email)->get();
     $validator = \Validator::make($request->all(), [
     'name' => 'required|min:5',
     'email'=>'required|email',
   ],
    [
     'name.required'=>'Bạn chưa nhập tên',
     'name.min'=>'Tên người dùng phải có ít nhất 5 kí tự',
     'email.required'=>'Bạn chưa nhập email',
     'email.email' => 'Email không đúng định dạng',

      ]);

      if ($validator->fails()){
          return response()->json(['errors'=>$validator->errors()->all()]);
        }

    
      else{
                foreach ($otheruser as  $khachhang) {
                   if($request->email==$khachhang->email)
             
                    return response()->json(['trungemail'=>'Email này đã có người đăng kí !']);
                   
                    
                }



                $form_data = array(
            'name'         =>  $request->name,
            'email'        =>  $request->email,
            
                );


             User::whereId($user->id)->update($form_data);
            
             return response()->json(['success'=>'Data is successfully added']);
        }
}
public function postchangepass(Request $request){
   
        $user = Auth::user();
         
        if((Hash::check($request->old,$user->password))==false)
         //So sanh mat khau    
         return response()->json(['wrong'=>'Mật khẩu cũ không đúng !']);
     $validator = \Validator::make($request->all(), [
     'old' => 'required',
     'new'=>'required|min:6',
     'new_cf'=>'required|same:new'
   ],
    [
     'old.required'=>'Vui lòng nhập mật khẩu cũ',
     'new.required'=>'Vui lòng nhập mật khẩu mới',
     'new_cf.required'=>'Vui lòng xác nhận lại mật khẩu mới',
     'new.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
     'new_cf.same'=>'Xác nhận lại mật khẩu không chính xác',
    
      ]);

      if ($validator->fails()){
          return response()->json(['errors'=>$validator->errors()->all()]);
        }

    
      else{
        

            $form_data = array(
            'password'         =>  bcrypt($request->new)
                );


             User::whereId($user->id)->update($form_data);
            
             return response()->json(['success'=>'Data is successfully added']);
        }
}

  public function postRegister(Request $request){
     $validator = \Validator::make($request->all(), [
     'username' => 'required|min:5',
     'emailReg'=>'required|email|unique:users,email',
     'passwordReg'=>'required|min:6|max:20',
     'passwordReg_confirmation'=>'required|same:passwordReg',
   ],
    [
     'username.required'=>'Bạn chưa nhập tên',
     'username.min'=>'Tên người dùng phải có ít nhất 5 kí tự',
     'emailReg.required'=>'Bạn chưa nhập email',
     'emailReg.unique'=>'Email đã tồn tại',
     'emailReg.email' => 'Email không đúng định dạng',
     'passwordReg.required'=>'Bạn chưa nhập mật khẩu',
     'passwordReg.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
     'passwordReg.max'=>'Mật khẩu phải chỉ tối đa 20 kí tự',
     'passwordReg_confirmation.required'=>'Vui lòng nhập lại mật khẩu',
     'passwordReg_confirmation.same'=>'Mật khẩu không trùng khớp',

      ]);

      if ($validator->fails()){
          return response()->json(['errors'=>$validator->errors()->all()]);
        }
      else{
             $khachhang = new User;
             $khachhang->name = $request->username;
             $khachhang->email = $request->emailReg;
             $khachhang->password = bcrypt($request->passwordReg);
             $khachhang->role = 0;
             
             $khachhang->save();
             return response()->json(['success'=>'Data is successfully added']);
        }
  }


public function postlogin(Request $request){
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
              if(Auth::attempt($login))
                return response()->json(['success'=>'Đăng nhập thành công']);
              else{
                $errors = 'Email hoặc mật khẩu không đúng';
                return response()->json(['errorLogin'=>$errors]);
        }
  }
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(User::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.khachhang_manage');
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
public function postDattour(Request $request)
    {   $tour = Tour::find($request->tour_id_);
        $rules;
        for ($i=1; $i<=$tour->songay ; $i++){
            $rules[]=array(
                    $request['tinh_ngay_'.$i],
                    $request['diadanh_ngay_'.$i.'_'],
                    $request['nhahang_ngay_'.$i.'_'],
                    $request['khachsan_ngay_'.$i.'_'],
                    
            );
            foreach ($rules as  $value) {
               foreach ($value as $v) {
                  if($v==null) return response()->json(['errors'=>'Error']);
               }
            }
        }
      $tuchon = new TuChon;
             $tuchon->tour_id = $request->tour_id_;
             $tuchon->user_id = Auth::user()->id;
             $tuchon->tongtien = $request->tongtien_;
             $tuchon->status = 0;
             $tuchon->save();
           
    
  for ($i=1; $i<=$tour->songay ; $i++) { 

     $chitiettuchon = new ChiTietTuChon;
 
             $chitiettuchon->tuchon_id = $tuchon->id;
             $chitiettuchon->lichtrinhngay =$i;
             $chitiettuchon->tinh = $request['tinh_ngay_'.$i];
             $chitiettuchon->diadanh = $request['diadanh_ngay_'.$i.'_'];
             $chitiettuchon->nhahang = $request['nhahang_ngay_'.$i.'_'];
             $chitiettuchon->khachsan = $request['khachsan_ngay_'.$i.'_'];
             $chitiettuchon->tongtienngay = $request['tongdukienngay_'.$i.'_'];
             $chitiettuchon->save();

  }    
            $email = Auth::user()->email;      
        
           $arr_chitiet = ChiTietTuChon::where('tuchon_id',$tuchon->id)->get();
        
           
            Mail::send('thongtintuchon.sendmail',['tuchon'=>$tuchon,'arr_chitiet'=>$arr_chitiet],function($message) use ($email){
            $message->to($email,'Thông tin tour bạn đã chọn')->subject('Thông tin tour bạn đã chọn');
        });
        return response()->json(['success'=>'Data is successfully added']);
             
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
            $data = User::findOrFail($id);
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
    {
           if($request->changepass == "on"){
                 $rules = array(
                'user_name'    =>  'required',
                'user_email'    =>  'required',
                'quyen'    =>  'required',
                'user_pass'    =>  'required',
                'user_cfpass'    =>  'required|same:user_pass'
                    );
                }
            else
            $rules = array(
                'user_name'    =>  'required',
                'user_email'    =>  'required',
                    'quyen'    =>  'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
       if($request->user_pass){
        $form_data = array(
            'name'         =>  $request->user_name,
            'email'        =>  $request->user_email,
            'password'     =>  bcrypt($request->user_pass),
            'role'    =>  $request->quyen,
        );
                }
         else
        $form_data = array(
            'name'         =>  $request->user_name,
            'email'        =>  $request->user_email,
             'role'    =>  $request->quyen,

        );

                $check = Notification::where('user_id',$request->hidden_id)->first();
                if($request->quyen==0 && $check!=null )
                     $check->delete();
                 
        User::whereId($request->hidden_id)->update($form_data);

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
        $data = User::find($id);
        $data->delete();
    }
      public function getmuatour(){
  return view('page.checkout');
 }
}
