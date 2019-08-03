<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Tour;
use App\Models\LoaiTour;
use App\Models\KhachSan;
use App\Models\QuocGia;
use App\Models\Tinh;
use App\Models\NhaHang;

class LiveSearchController extends Controller
{
   

    public function search(Request $request)
    {

       		if($request->search!=null)
       		{
            $tour = null;
            $output =  array();
            $touritem = Tour::join('loaitour', 'loaitour.id', '=', 'tour.loaitour_id')
                ->select( 'tour.*', 'loaitour.tenloai as tenloai','loaitour.type as type','loaitour.songay as songay', 'loaitour.sodem as sodem')
                ->where('tentour', 'LIKE', '%' . $request->search . '%')
                 ->orwhere('tenloai','LIKE','%'.$request->search.'%')
                ->get();
           
	            if (count($touritem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	          		}
          		else{
          			foreach ($touritem as  $value) {
	                    $output[] = $value;
	               		 }
	           			 $tour = $output;
	           			 return view('page.search_tour',compact('tour'));
          		}
          	}
          	else{
				return redirect()->back() ->with('alert', 'Xin hãy nhập từ khóa tìm kiếm trước');
			}
	}
	public function searchks(Request $request){
		$quocgia = QuocGia::all();
		$tinh = Tinh::all();
		if($request->searchks!=null)
		{
			$khachsan = null;
			$output = array();
			$ksitem = DB::table('khachsan')->join('tinh','khachsan.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('khachsan.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tenkhachsan','LIKE','%'.$request->searchks.'%')
											->orwhere('tentinh','LIKE','%'.$request->searchks.'%')
											->orwhere('tenquocgia','LIKE','%'.$request->searchks.'%')
											->orwhere('gia','LIKE','%'.$request->searchks.'%')
											->paginate(200);	
								 
					if (count($ksitem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	    }
          		else{
          			// foreach ($ksitem as  $value) {
	            //         $output[] = $value;
	            //    		 }
	           	// 		 $khachsan = $output;
	           			 return view('page.hotels',['khachsan'=>$ksitem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          		}
          	}
        else{
			return redirect()->back() ->with('alert', 'Xin hãy nhập từ khóa tìm kiếm trước');
			}

	}

	public function searchks2(Request $request){
		
		$quocgia = QuocGia::all();
		$tinh = Tinh::all();
		$khachsan = null;
		$output = array();
		if($request->searchnh_name!=null)
		{
			if($request->searchnh_tinh == null){
			
			$ksitem = DB::table('khachsan')->join('tinh','khachsan.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('khachsan.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tenkhachsan','LIKE','%'.$request->searchnh_name.'%')
											->paginate(200);	
								
					if (count($ksitem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	   				 }
          			else{
	           		return view('page.hotels',['khachsan'=>$ksitem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          			}
          	}
          	else
          	{
				$ksitem = DB::table('khachsan')->join('tinh','khachsan.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('khachsan.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tenkhachsan','LIKE','%'.$request->searchnh_name.'%')
											->where('tentinh','LIKE','%'.$request->searchnh_tinh.'%')
											->paginate(200);
				if (count($ksitem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	   				 }
          			else{
	           		return view('page.hotels',['khachsan'=>$ksitem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          			}
          	}
          }
          	else{
          		if($request->searchnh_tinh == null)
          		{
          			return redirect()->back() ->with('alert', 'Xin hãy nhập từ khóa tìm kiếm trước');
          		}
          		else
          		{
          			$ksitem = DB::table('khachsan')->join('tinh','khachsan.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('khachsan.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tentinh','LIKE','%'.$request->searchnh_tinh.'%')
											->paginate(200);
											
					if (count($ksitem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	   				 }
          			else{
	           		return view('page.hotels',['khachsan'=>$ksitem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          			}						
          		}
          	}   

	}

	public function searchnh(Request $request){
		dd( $request);
		$quocgia = QuocGia::all();
		$tinh = Tinh::all();
		if($request->searchnh!=null)
		{
			$nhahang = null;
			$output = array();
			$nhitem = DB::table('nhahang')->join('tinh','nhahang.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('nhahang.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tennhahang','LIKE','%'.$request->searchnh.'%')
											->orwhere('tentinh','LIKE','%'.$request->searchnh.'%')
											->orwhere('tenquocgia','LIKE','%'.$request->searchnh.'%')
											->paginate(200);	
								
					if (count($nhitem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	    }
          		else{
          			// foreach ($ksitem as  $value) {
	            //         $output[] = $value;
	            //    		 }
	           	// 		 $khachsan = $output;
	           			 return view('page.nhahang',['nhahang'=>$nhitem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          		}
          	}
        else{
			return redirect()->back() ->with('alert', 'Xin hãy nhập từ khóa tìm kiếm trước');
			}

	}
// ->orwhere('tentinh','LIKE','%'.$request->searchnh.'%')
// 											->orwhere('tenquocgia','LIKE','%'.$request->searchnh.'%')
	public function searchnh2(Request $request){
		
		$quocgia = QuocGia::all();
		$tinh = Tinh::all();
		$nhahang = null;
		$output = array();
		if($request->searchnh_name!=null)
		{
			if($request->searchnh_tinh == null){
			
			$nhitem = DB::table('nhahang')->join('tinh','nhahang.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('nhahang.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tennhahang','LIKE','%'.$request->searchnh_name.'%')
											->paginate(200);	
								
					if (count($nhitem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	   				 }
          			else{
	           		return view('page.nhahang',['nhahang'=>$nhitem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          			}
          	}
          	else
          	{
				$nhitem = DB::table('nhahang')->join('tinh','nhahang.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('nhahang.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tennhahang','LIKE','%'.$request->searchnh_name.'%')
											->where('tentinh','LIKE','%'.$request->searchnh_tinh.'%')
											->paginate(200);
				if (count($nhitem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	   				 }
          			else{
	           		return view('page.nhahang',['nhahang'=>$nhitem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          			}
          	}
          }
          	else{
          		if($request->searchnh_tinh == null)
          		{
          			return redirect()->back() ->with('alert', 'Xin hãy nhập từ khóa tìm kiếm trước');
          		}
          		else
          		{
          			$nhitem = DB::table('nhahang')->join('tinh','nhahang.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('nhahang.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tentinh','LIKE','%'.$request->searchnh_tinh.'%')
											->paginate(200);
											
					if (count($nhitem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	   				 }
          			else{
	           		return view('page.nhahang',['nhahang'=>$nhitem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          			}						
          		}
          	}   

	}


	public function searchdd(Request $request){
		$quocgia = QuocGia::all();
		$tinh = Tinh::all();
		if($request->searchdd!=null)
		{
			$diadanh = null;
			$output = array();
			$dditem = DB::table('diadanh')->join('tinh','diadanh.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('diadanh.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tendiadanh','LIKE','%'.$request->searchdd.'%')
											->orwhere('tentinh','LIKE','%'.$request->searchdd.'%')
											->orwhere('tenquocgia','LIKE','%'.$request->searchdd.'%')
											->orwhere('gia','LIKE','%'.$request->searchdd.'%')
											->paginate(200);	

								 
					if (count($dditem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	    }
          		else{
          			// foreach ($ksitem as  $value) {
	            //         $output[] = $value;
	            //    		 }
	           	// 		 $khachsan = $output;
	           			 return view('page.diadanh',['diadanh'=>$dditem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          		}
          	}
        else{
			return redirect()->back() ->with('alert', 'Xin hãy nhập từ khóa tìm kiếm trước');
			}

	}

	public function searchdd2(Request $request){
		
		$quocgia = QuocGia::all();
		$tinh = Tinh::all();
		$diadanh = null;
		$output = array();
		if($request->searchnh_name!=null)
		{
			if($request->searchnh_tinh == null){
			
			$dditem = DB::table('diadanh')->join('tinh','diadanh.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('diadanh.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tendiadanh','LIKE','%'.$request->searchnh_name.'%')
											->paginate(200);	
								
					if (count($dditem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	   				 }
          			else{
	           		return view('page.diadanh',['diadanh'=>$dditem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          			}
          	}
          	else
          	{
				$dditem = DB::table('diadanh')->join('tinh','diadanh.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('diadanh.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tendiadanh','LIKE','%'.$request->searchnh_name.'%')
											->where('tentinh','LIKE','%'.$request->searchnh_tinh.'%')
											->paginate(200);
				if (count($dditem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	   				 }
          			else{
	           		return view('page.diadanh',['diadanh'=>$dditem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          			}
          	}
          }
          	else{
          		if($request->searchnh_tinh == null)
          		{
          			return redirect()->back() ->with('alert', 'Xin hãy nhập từ khóa tìm kiếm trước');
          		}
          		else
          		{
          			$dditem = DB::table('diadanh')->join('tinh','diadanh.tinh','=','tinh.id')
											->join('quocgia','tinh.quocgia','=','quocgia.maquocgia')
											->select('diadanh.*','tinh.tentinh as tentinh','quocgia.tenquocgia as tenquocgia')
											->where('tentinh','LIKE','%'.$request->searchnh_tinh.'%')
											->paginate(200);
											
					if (count($dditem)==0) {
	                return redirect()->back() ->with('alert', 'Không tồn tại từ khóa bạn tìm kiếm');
	   				 }
          			else{
	           		return view('page.diadanh',['diadanh'=>$dditem,'quocgia'=>$quocgia,'tinh'=>$tinh]);
          			}						
          		}
          	}   

	}

	
}
        

    
      


