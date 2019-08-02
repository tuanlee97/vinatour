<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Validator;
use Hash;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
	public function getFormResetPassword(){
		return view('password.email');
	}
	public function sendlinkreset(Request $request){

		$email = $request->emailrs;
		$checkUser = User::where('email',$email)->first();
		if(!$checkUser)
		{
			 return response()->json(['errors' => 'Email không tồn tại.']);
		}
		$code = Hash::make(time().$email);
		$url = route('get.link.reset.password',['code'=>$code,'email'=>$email]);
		$get = ['get'=>$url];
		Mail::send('password.reset',$get,function($message) use ($email){
			$message->to($email,'Lấy lại mật khẩu')->subject('Lấy lại mật khẩu');
		});
			return response()->json(['success' => 'Link lấy lại mật khẩu đã được gửi vào email của bạn !']);
	}
	public function resetPassword(){
	

				return view('password.change-pw');


	}
    public function postresetPassword(Request $request){
    	$user = Auth::user();
		$validator = \Validator::make($request->all(),[
			'emailup'=>'required|email',
			'passup'=>'required|min:6|max:20',
			'passconfup'=>'required|same:passup',
		],
		[
			'emailup.required'=>'Bạn chưa nhập email',
			'passup.required'=>'Bạn chưa nhập mật khẩu',
     		'passup.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
     		'passup.max'=>'Mật khẩu phải chỉ tối đa 20 kí tự',
     		'passconfup.required'=>'Vui lòng nhập lại mật khẩu',
     		'passconfup.same'=>'Mật khẩu không trùng khớp',
		]);
 if ($validator->fails() ){
          return response()->json(['errors'=>$validator->errors()->all()]);
        }

		
        else{
        			$email = $request->emailup;
					$checkUser = User::where('email',$email)->first();
					
        		if(!$checkUser)  return response()->json(['errorsemail' => 'Email không tồn tại']);


        		else{


        			$form_data = array(
            'password'         =>  bcrypt($request->passup),
                );
        	 User::whereId($checkUser->id)->update($form_data);
        	 return response()->json(['success' => 'Đổi mật khẩu thành công']);
        		}
        	 
        }

				


	}
}
