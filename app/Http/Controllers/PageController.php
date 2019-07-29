<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachSan;
use App\Models\NhaHang;
use App\Models\Tinh;
use App\Models\QuocGia;
use App\Models\Tour;
use App\Models\Notification;
use App\Models\DiaDanh;
use App\Models\DanhSachIn;
use App\Models\ThongTinChung;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Rating;
class PageController extends Controller
{

     public function getDiadanhs($id,$tour)
        {
          $thamquan=Tour::find($tour)->diadanhs()->where('tinh',$id)->select('tendiadanh','diadanh.id','gia')->get();
            return json_encode($thamquan);
        }
        public function getNhahangs($id,$tour)
        {

            $noianuong=Tour::find($tour)->nhahangs()->where('tinh',$id)->select('tennhahang','nhahang.id','gia')->get();
            return json_encode($noianuong);
        }
        public function getKhachsans($id,$tour)
        {

             $noinghi=Tour::find($tour)->khachsans()->where('tinh',$id)->select('tenkhachsan','khachsan.id','gia')->get();
            return json_encode($noinghi);
        }


	public function getindex(){

     $diadanh=DiaDanh::take(3)
 							->orderBy('updated_at', 'desc')
 							->get();

    $tour = Tour::take(8)
							->orderBy('created_at', 'desc')
							->get();
      $khachsan = KhachSan::all();
      $tinh = Tinh::all();
      $quocgia = QuocGia::all();

		return view('page.index',compact('diadanh','tour','khachsan','tinh','quocgia'));
	}
   public function gettours(){

      $tour = Tour::paginate(8);
   	return view('page.tours',compact('tour'));
   }
   public function getProfile(){

     $user = Auth::user();
    $isSended = Notification::where('user_id',$user->id)->first();
   
    $isHDV = $user->role;
    return view('user.profile',compact('isSended','isHDV'));
   }
      public function gettoursTN(Request $req){
      $tour = Tour::where('in_out', $req->id)->paginate(8);
    return view('page.tours',compact('tour'));
   }
      public function gettoursNN(Request $req){

      $tour = Tour::where('in_out', $req->id)->paginate(8);

    return view('page.tours',compact('tour'));
   }

   public function gethotels()
   {

    $khachsan = KhachSan::paginate(8);
      $tinh = Tinh::all();
      $quocgia = QuocGia::all();
   	return view('page.hotels',compact('tinh','quocgia','khachsan'));
   }

    public function getnhahang()
   {
      $nhahang = NhaHang::paginate(8);
      $tinh = Tinh::all();
      $quocgia = QuocGia::all();
    return view('page.nhahang',compact('tinh','quocgia','nhahang'));
   }

   public function getservices()
   {

   	return view('page.services');
   }
   public function inhaiquan()
   {
      $user = Auth::user();
    $isHDV = $user->role;
    if($isHDV==1||$isHDV==3)
    return view('huongdanvien.inhaiquan');
  else  
  return redirect()->back();
   }

   public function print(Request $req)
   {    $dsin=DanhSachIn::find($req->id);
    $ttchung=ThongTinChung::where('id',$dsin->ttc_id)->first();
        
      $user = Auth::user();
    $isHDV = $user->role;
    if($isHDV==1||$isHDV==3)
    return view('huongdanvien.print',compact('dsin','ttchung'));
  else  
  return redirect()->back();
   }

    public function getDiadanh(){

       $diadanh=DiaDanh::paginate(8);
   	return view('page.diadanh',compact('diadanh'));
   }
   public function getabout(){

   	return view('page.about');
   }

   public function getlienhe()
   {


    return view('page.lienhe');
   }
    public function getchitiettour(Request $req){
          
         $tour = Tour::Where('id',$req->id)->first();
         $diemden = Tour::find($tour->id)->tinhs;
         $thamquan=Tour::find($tour->id)->diadanhs;
         $noianuong=Tour::find($tour->id)->nhahangs;
         $noinghi=Tour::find($tour->id)->khachsans;
         if(Auth::guard('web')->check()){

            $rating = Rating::where([['rateable_id','=',$req->id],['user_id','=',Auth::user()->id]])->select('rating')->first();
   	            return view('page.chitiet_tour',compact('tour','diemden','thamquan','noianuong','noinghi','rating'));
          }
          else  return view('page.chitiet_tour',compact('tour','diemden','thamquan','noianuong','noinghi'));
 }
   public function getctkhachsan(Request $req){

    $khachsan=KhachSan::Where('id',$req->id)->first();

    return view('page.ctkhachsan',['khachsan'=>$khachsan]);
   }
   public function getctdiadanh(Request $req){

    $diadanh=DiaDanh::Where('id',$req->id)->first();

    return view('page.ctdiadanh',['diadanh'=>$diadanh]);
   }
     public function getctnhahang(Request $req){

    $nhahang=NhaHang::Where('id',$req->id)->first();

    return view('page.ctnhahang',['nhahang'=>$nhahang]);
   }
    public function postPost(Request $request)
    {
      $tour = Tour::find($request->id);
        
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rating;
        $rating->user_id = auth()->user()->id;

        $tour->ratings()->save($rating);

        return redirect()->back();
    }


}
