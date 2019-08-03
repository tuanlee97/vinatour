<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuocGia;
use App\Models\Tinh;
use App\Models\ThongTinChung;
use App\Models\DanhSachIn;
use Illuminate\Support\Facades\Auth;
use Validator;
class InHaiQuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $ttc=ThongTinChung::orderBy('id', 'desc')->first();
        if(request()->ajax())
        {    
                
          $text = "'chitiettour'";
    
            return datatables()->of(DanhSachIn::where('ttc_id',$ttc->id)->latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                    
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                    
                        return $button;
                    })
                    ->addColumn('print', function($data){
                      $text = "'chitiettour'";
                        $button2 = '<a href="print/'.$data->id.'" target="_blank" name="print" id="'.$data->id.'" class="info btn btn-info btn-sm"><img src="images\printer.png"></a>';
                          
                        return $button2;
                    })
                    ->rawColumns(['action','print'])
                    ->make(true);
        }
        return view('huongdanvien.inhaiquan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }
  public function createthongtin(Request $request)
    { 
        
      
        $error = Validator::make($request->all(), 	[
          'sohieu'    =>  'required',
          'songayolai'    =>  'required|integer',
          'diachi' =>  'required',
          'sdt' =>  'required|regex:/(0)[0-9]{9}/'
          
    	],[
          'sohieu.required' => "Chưa nhập số hiệu chuyến bay",
          'songayolai.required' => "Chưa nhập số ngày ở lại",
          'songayolai.integer' => "Số ngày ở lại không hợp lệ",
          'diachi.required' => "Chưa nhập địa chỉ",
          'sdt.required' => "Chưa nhập SĐT",
          'sdt.regex' => "Số điện thoại không hợp lệ",

      ]);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

       
       
          $form_data = array(
              'flightno'        =>  $request->sohieu,
              'day'             =>  $request->songayolai,
              'adress'            =>  $request->diachi,
              'phone'=>  $request->sdt,
              'user_id'  => Auth::user()->id,
            );

        


        ThongTinChung::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  $ttc=ThongTinChung::orderBy('id', 'desc')->first();
        $error = Validator::make($request->all(), 	[
          'first_name'    =>  'required',
        'last_name'    =>  'required',
        'birthday'    =>  'required',
        'country_name'    =>  'required',
        'city_name'    =>  'required',
        
       

    	],
    	[
    			'first_name.required'=>'Bạn chưa nhập tên ',
          'last_name.required'=>'Bạn chưa nhập họ',
    			'birthday.required'=>'Bạn chưa nhập ngày sinh',
          'country_name.required'=>'Bạn chưa nhập quốc tịch',
          'city_name.required'=>'Bạn chưa nhập thành phố',
         


    	]);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
          $form_data = array(
              'firstname'        =>  $request->first_name,
              'lastname'             =>  $request->last_name,
              'birthday'            => $request->birthday,
              'country'            => $request->country_name,
              'city'            => $request->city_name,
              'purpose'            => $request->purpose,
              'ttc_id'          => $ttc->id,
            );


          $formcheckbox = array();
        for ($i=1; $i <=3 ; $i++) { 
          $a = 'option'.$i;
          if($request->$a == "on")
             $formcheckbox[$a] = 1;
           else  $formcheckbox[$a] = 0;
          } 
         
        if ($formcheckbox){
         $form_data= array_merge($form_data, $formcheckbox);   
            }




         DanhSachIn::create($form_data);

         return response()->json(['success' => 'Thêm thành công.']);
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
            $data = DanhSachIn::findOrFail($id);
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
      $ttc=ThongTinChung::orderBy('id', 'desc')->first();
        $error = Validator::make($request->all(),   [
          'first_name'    =>  'required',
        'last_name'    =>  'required',
        'birthday'    =>  'required',
        'country_name'    =>  'required',
        'city_name'    =>  'required',
        
       

      ],
      [
          'first_name.required'=>'Bạn chưa nhập tên ',
          'last_name.required'=>'Bạn chưa nhập họ',
          'birthday.required'=>'Bạn chưa nhập ngày sinh',
          'country_name.required'=>'Bạn chưa nhập quốc tịch',
          'city_name.required'=>'Bạn chưa nhập thành phố',
         


      ]);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }
          $form_data = array(
              'firstname'        =>  $request->first_name,
              'lastname'             =>  $request->last_name,
              'birthday'            => $request->birthday,
              'country'            => $request->country_name,
              'city'            => $request->city_name,
              'purpose'            => $request->purpose,
              'ttc_id'          => $ttc->id,
            );


          $formcheckbox = array();
        for ($i=1; $i <=3 ; $i++) { 
          $a = 'option'.$i;
          if($request->$a == "on")
             $formcheckbox[$a] = 1;
           else  $formcheckbox[$a] = 0;
          } 
         
        if ($formcheckbox){
         $form_data= array_merge($form_data, $formcheckbox);   
            }



        DanhSachIn::where('id', $request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Sửa thành công.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
          $data = DanhSachIn::where('id', $id);
           $data->delete();
        

    }
}
