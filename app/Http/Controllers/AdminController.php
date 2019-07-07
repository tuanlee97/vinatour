<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Validator;
use Illuminate\Support\Facades\Auth;

use Session;
class AdminController extends Controller
{
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
    {
           if($request->changepass == "on"){
                 $rules = array(
                'admin_name'    =>  'required',
                'admin_email'    =>  'required',
                'admin_pass'    =>  'required',
                'admin_cfpass'    =>  'required|same:admin_pass'
                    );
                }
            else
            $rules = array(
                'admin_name'    =>  'required',
                'admin_email'    =>  'required',

            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
       if($request->admin_pass){
        $form_data = array(
            'name'         =>  $request->admin_name,
            'email'        =>  $request->admin_email,
            'password'     =>  bcrypt($request->admin_pass)
        );
                }
         else
        $form_data = array(
            'name'         =>  $request->admin_name,
            'email'        =>  $request->admin_email,

        );
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
