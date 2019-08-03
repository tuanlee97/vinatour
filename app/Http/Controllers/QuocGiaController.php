<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuocGia;
use App\Models\Tinh;
use Validator;
class QuocGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(QuocGia::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->maquocgia.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->maquocgia.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.quocgia_manage');
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
        dd($request);
        $error = Validator::make($request->all(), 	[
          'country_name'    =>  'required|unique:quocgia,tenquocgia',
          'image'    =>  'required|image|max:2048',
          'checkbox' => 'unique:quocgia,quocnoi'
    	],
    	[
    			'country_name.required'=>'Bạn chưa nhập tên quốc gia',
          'country_name.unique'=>'Đã tồn tại quốc gia này',
    			'checkbox.unique'=>'Đã tồn tại quốc gia quốc nội',
          'image.required'=>'Bạn chưa nhập hình ảnh',
          'image.image'=>'Không phải kiểu dữ liệu hình ảnh',


    	]);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images/flag'), $new_name);
        if($request->checkbox == "on"){
          $form_data = array(
              'tenquocgia'        =>  $request->country_name,
              'image'             =>  $new_name,
              'quocnoi'            => 1
          );


        }else {
          $form_data = array(
              'tenquocgia'        =>  $request->country_name,
              'image'             =>  $new_name,
              'quocnoi'            => 0
            );

        }


        QuocGia::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
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
            $data = QuocGia::where('maquocgia', $id)->firstOrFail();
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

        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {

            $error = Validator::make($request->all(),  	[
              'country_name'    =>  'required',
              'image'    =>  'required|image|max:2048',
              'checkbox' => 'unique:quocgia,quocnoi'
        	],
        	[
        			'country_name.required'=>'Bạn chưa nhập tên quốc gia',
        			'checkbox.unique'=>'Đã tồn tại quốc gia quốc nội',
              'image.required'=>'Bạn chưa nhập hình ảnh',
              'image.image'=>'Không phải kiểu dữ liệu hình ảnh',


        	]);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/flag'), $image_name);
        }
        else
        {


            $error = Validator::make($request->all(), 	[
              'country_name'    =>  'required',
              'checkbox' => 'unique:quocgia,quocnoi'
        	],
        	[
        			'country_name.required'=>'Bạn chưa nhập tên quốc gia',
        			'checkbox.unique'=>'Đã tồn tại quốc gia quốc nội',
            


        	]);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        if($request->checkbox == "on"){
          $form_data = array(
            'tenquocgia'        =>  $request->country_name,
            'image'            =>   $image_name,
              'quocnoi'            => 1
          );


        }else {
          $form_data = array(
            'tenquocgia'        =>  $request->country_name,
            'image'            =>   $image_name,
              'quocnoi'            => 0
            );

        }


        QuocGia::where('maquocgia', $request->hidden_id)->update($form_data);

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
        $tinhofqg = Tinh::where('quocgia',$id)->first();

        if($tinhofqg!=null)
        return response()->json(['errors' => 'LỖI : Quốc gia này có tỉnh đang được khai thác du lịch']);
        else {
          $data = QuocGia::where('maquocgia', $id);
           $data->delete();
        }

    }
}
