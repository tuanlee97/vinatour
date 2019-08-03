<?php

namespace App\Http\Controllers;
use App\Models\Tinh;
use App\Models\QuocGia;
use App\Models\NhaHang;
use App\Models\DiaDanh;
use App\Models\KhachSan;
use Illuminate\Http\Request;
use Validator;
class TinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quocgia=quocgia::all();
        if(request()->ajax())
        {
            return datatables()->of(Tinh::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.tinh_manage',['quocgia'=>$quocgia]);
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

            'tentinh'    =>  'required',
            'country_name'    =>  'required'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
        // if($request->country_name== )
        $form_data = array(
            'quocgia'        =>  $request->country_name,
            'tentinh'             =>  $request->tentinh
        );

        Tinh::create($form_data);

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
            $data = Tinh::findOrFail($id);
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
        $rules = array(
                'tentinh'    =>  'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
             $form_data = array(
            'quocgia'        =>  $request->country_name,
            'tentinh'            =>   $request->tentinh
        );
        Tinh::whereId($request->hidden_id)->update($form_data);

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
      $result = 'LỖI : Tỉnh này có khai thác :'.'</br>';
      $diadanh = DiaDanh::where('tinh',$id)->first();
      if($diadanh) $result .= '- Địa Danh'.'</br>';
      $nhahang = NhaHang::where('tinh',$id)->first();
      if($nhahang) $result .= '- Nhà Hàng'.'</br>';
      $khachsan =KhachSan::where('tinh',$id)->first();
      if($khachsan) $result .= '- Khách Sạn '.'</br>';

      if($diadanh || $nhahang || $khachsan)
      return response()->json(['errors' => $result]);
      else {
        $data = Tinh::find($id);
        $data->delete();
      }





    }
}
