<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tinh;
use Validator;
use App\Models\KhachSan;

class KhachSanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           $tinh=Tinh::all();
        if(request()->ajax())
        {
          
            return datatables()->of(KhachSan::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->makhachsan.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->makhachsan.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.khachsan_manage',['tinh'=>$tinh]);
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
         $rules = array(
           
            'tenkhachsan'    =>  'required',
            'gia' => 'required',
            'noidung' => 'required',
            'image' => 'required|image|max:2048'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
         $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images/flag'), $new_name);

        $form_data = array(
            'tenkhachsan'        =>  $request->tenkhachsan,
            'gia'             =>  $request->gia,
            'noidung'        => $request->noidung,
            'tinh'          => $request->tentinh,
            'hinhanh'      => $new_name
        );

        KhachSan::create($form_data);

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
            $data = KhachSan::where('makhachsan', $id)->firstOrFail();
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
            $rules = array(
                'tenkhachsan'    =>  'required',
            'gia' => 'required',
            'noidung' => 'required',
            'hinhanh' => 'image|max:2048'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/flag'), $image_name);
        }
        else
        {
            $rules = array(
                 'tenkhachsan'    =>  'required',
            'gia' => 'required',
            'noidung' => 'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'tenkhachsan'        =>  $request->tenkhachsan,
            'gia'             =>  $request->gia,
            'noidung'        => $request->noidung,
            'tinh'          => $request->tentinh,
            'hinhanh'            =>   $image_name
        );
        KhachSan::where('makhachsan', $request->hidden_id)->update($form_data);
                 
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
         $data = KhachSan::where('makhachsan', $id);
        $data->delete();
    }
}
