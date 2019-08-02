<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiTour;
use App\Models\Tour;
use Validator;

class LoaiTourController extends Controller
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

            return datatables()->of(LoaiTour::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.loaitour_manage');
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
public function getCustome($id)
        {

            $data = LoaiTour::find($id);
            return json_encode($data);
        }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
      $error = Validator::make($request->all(), [
           'tenloai'    =>  'required|unique:loaitour,tenloai',
            'songay'    =>  'required',
            'sodem'    =>  'required',
        ],
        [
                'tenloai.required'=>'Bạn chưa nhập tên loại',
       'tenloai.unique'=>'Tên đã tồn tại',
          'songay.required'=>'Bạn chưa nhập số ngày',
          'sodem.required'=>'Bạn chưa nhập số đêm',
        


        ]);

      if($error->fails())
      {
          return response()->json(['errors' => $error->errors()->all()]);
      }
      if( $request->songay < 1 ) return response()->json(['ngay' => 'Số ngày thấp nhất là 1']);
    if( $request->sodem < 0 ) return response()->json(['ngay' => 'Số đêm thấp nhất là 0']);
else{
       if($request->checkbox == "on"){      
     $form_data = array(
          'tenloai'        =>  $request->tenloai,
          'songay'    =>  $request->songay,
            'sodem'    =>  $request->sodem,
            'type' => 1,
      );
}
else{
     $form_data = array(
          'tenloai'        =>  $request->tenloai,
          'songay'    =>  $request->songay,
            'sodem'    =>  $request->sodem,
            'type' => 0,
      );

}
      LoaiTour::create($form_data);

      return response()->json(['success' => 'Data Added successfully.']);
}

     
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
            $data = LoaiTour::findOrFail($id);
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
    {   $other = LoaiTour::where('id','<>',$request->hidden_id)->get();
    foreach ($other as $key => $value) {
       if($request->tenloai == $value->tenloai )
        return response()->json(['ten' => 'Tên đã tồn tại']);
    }
        
      

            $error = Validator::make($request->all(), [
           'tenloai'    =>  'required',
            'songay'    =>  'required',
            'sodem'    =>  'required',
        ],
        [
                'tenloai.required'=>'Bạn chưa nhập tên loại',
       
          'songay.required'=>'Bạn chưa nhập số ngày',
          'sodem.required'=>'Bạn chưa nhập số đêm',
      


        ]);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
             if( $request->songay < 1 ) return response()->json(['ngay' => 'Số ngày thấp nhất là 1']);
    if( $request->sodem < 0 ) return response()->json(['ngay' => 'Số đêm thấp nhất là 0']);

else{

     if($request->checkbox == "on"){      
     $form_data = array(
          'tenloai'        =>  $request->tenloai,
          'songay'    =>  $request->songay,
            'sodem'    =>  $request->sodem,
            'type' => 1,
      );
}
else{
     $form_data = array(
          'tenloai'        =>  $request->tenloai,
          'songay'    =>  $request->songay,
            'sodem'    =>  $request->sodem,
            'type' => 0,
      );

}
        LoaiTour::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
}
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
      $tour = Tour::where('loaitour_id',$id)->first();
      if($tour)
      return response()->json(['errors' => 'LỖI : Loại tour này đang được khai thác']);
      else {
        $data = LoaiTour::find($id);
         $data->delete();
      }
    }
}
