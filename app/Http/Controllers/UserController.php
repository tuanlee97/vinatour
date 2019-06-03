<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
class UserController extends Controller
{	
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
}
