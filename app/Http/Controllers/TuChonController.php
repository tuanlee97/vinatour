<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TuChon;
use App\Models\ChiTietTuChon;
use Validator;
class TuChonController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	 if(request()->ajax()){
    	return datatables()->of(TuChon::latest()->get())
				    	   ->addColumn('action', function($data){
				    	 	 $button = '<button type="button" name="chitiet" id="'.$data->id.'" class="details btn btn-primary btn-sm">Chi tiết</button>';
				                        $button .= '&nbsp;&nbsp;';
				                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
				                        return $button;
				                    })
    	 				  ->rawColumns(['action'])
                    	  ->make(true);
                    	  }
    	 return view('admin.tuchon');
    }




    public function details($id)
    {
         if(request()->ajax())
        {	
        	$tuchon = TuChon::Where('id',$id)->first();
            $arr_chitiet=ChiTietTuChon::where('tuchon_id',$id)->select('lichtrinhngay','tinh','diadanh','nhahang','khachsan','tongtienngay')->get();
            return response()->json(['data' => $arr_chitiet,'tongtien'=>$tuchon]);
        }
         
    }
    public function destroy($id)
    {
        
          $data = TuChon::where('id',$id);
          
           $data->delete();
        

    }
}