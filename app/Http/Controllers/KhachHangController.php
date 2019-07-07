<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;
class KhachHangController extends Controller
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
                'user_pass'    =>  'required',
                'user_cfpass'    =>  'required|same:user_pass'
                    );
                }
            else
            $rules = array(
                'user_name'    =>  'required',
                'user_email'    =>  'required',

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
            'password'     =>  bcrypt($request->user_pass)
        );
                }
         else
        $form_data = array(
            'name'         =>  $request->user_name,
            'email'        =>  $request->user_email,

        );
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
}
