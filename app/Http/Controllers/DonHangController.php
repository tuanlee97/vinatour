<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use DB;
use App\Models\Tour;
use App\Models\DonDatTour;
use App\Models\ChiTietDatTour;
use Validator;

use Illuminate\Support\Facades\Auth;
class DonHangController extends Controller
{

     public function index()
    {
        
        if(request()->ajax())
        {

            return datatables()->of(DonDatTour::join('users', 'dondattour.user_id', '=', 'users.id')
                    ->join('tour', 'dondattour.tour_id', '=', 'tour.id')
                ->select( 'dondattour.*', 'users.name as username', 'tour.tentour as tentour')
                ->where('status','0')
                ->latest()->get())

                    ->addColumn('action', function($data){
                         $input = '<button type="button" name="chitiet" id="'.$data->id.'" class="details btn btn-info btn-sm">Chi tiết</button>';
                     $input .= '&nbsp;&nbsp;';
                        $input .= '<input style="float: right;" type="checkbox" name="status" class="status" value="'.$data->id.'" />';
                      
                       
                        return $input;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('admin.donhang_manage');
    }
   
public function XuLy(Request $request)
    {

            foreach ($request->id as $value) {
               $data = DonDatTour::find($value);
               $data->status = 1;
               $data->save();
            }
        
    }
    public function details($id)
    {
         if(request()->ajax())
        {   
            $donhang = DonDatTour::find($id);
            $arr_chitiet=ChiTietDatTour::where('dondattour_id',$id)->select('giatien','loai','ten','sdt','diachi','gioitinh','quocgia','passport')->get();
            return response()->json(['data' => $arr_chitiet,'donhang'=>$donhang]);
        }
         
    }

}
