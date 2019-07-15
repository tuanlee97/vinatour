<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use Illuminate\Support\Facades\Hash;
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
    
}
