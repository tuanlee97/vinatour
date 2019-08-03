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
use App\Models\LoaiTour;
use DB;
use TJGazel\Toastr\Facades\Toastr;
use Session;
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
    
      $tour =   Tour::join('loaitour', 'loaitour.id', '=', 'tour.loaitour_id')
                ->select( 'tour.*', 'loaitour.songay as songay', 'loaitour.sodem as sodem','loaitour.type as type')
                ->where('type',0)
                ->paginate(10);

                if(session::has('success'))
      Toastr::success("Thông tin đơn đặt tour đã được chuyển tới email của bạn", "THANH TOÁN THÀNH CÔNG !");

             if(session::has('errors'))
                   
              Toastr::error("Đã có lỗi trong quá trình thanh toán !", "THANH TOÁN THẤT BẠI !");
    return view('page.tours',compact('tour'));
   }
  public function gettours_tk(){
    
      $tour =   Tour::join('loaitour', 'loaitour.id', '=', 'tour.loaitour_id')
                ->select( 'tour.*', 'loaitour.songay as songay', 'loaitour.sodem as sodem','loaitour.type as type')
                ->where('type',1)
                ->paginate(10);
                
                if(session::has('success'))
      Toastr::success("Thông tin đơn đặt tour đã được chuyển tới email của bạn", "THANH TOÁN THÀNH CÔNG !");

             if(session::has('errors'))
                   
              Toastr::error("Đã có lỗi trong quá trình thanh toán !", "THANH TOÁN THẤT BẠI !");
    return view('page.tours',compact('tour'));
   }
   public function getProfile(){

     $user = Auth::user();
    $isSended = Notification::where('user_id',$user->id)->first();
   
    $isHDV = $user->role;
    return view('user.profile',compact('isSended','isHDV'));
   }
    public function gettoursTN(Request $req){
  
$tour = null;
$data = Tour::join('loaitour', 'loaitour.id', '=', 'tour.loaitour_id')
                ->select( 'tour.*', 'loaitour.type as type','loaitour.songay as songay', 'loaitour.sodem as sodem')
                ->get();
        foreach ($data as  $value) {
          if($value->in_out == $req->id  && $value->type==0)
            $touritem[]=$value;

        }

        $tour = $touritem;

return view('page.tours',['tour'=>$tour]);
   }
  public function gettoursNN(Request $req){
  
$tour = null;
$data = Tour::join('loaitour', 'loaitour.id', '=', 'tour.loaitour_id')
                ->select( 'tour.*', 'loaitour.type as type','loaitour.songay as songay', 'loaitour.sodem as sodem')
                ->get();

             foreach ($data as  $value) {
          if($value->in_out == $req->id  && $value->type==0)
            $touritem[]=$value;

        }

        $tour = $touritem;
return view('page.tours',['tour'=>$tour]);
   }
 public function gettoursTN_tk(Request $req){
 $tour = null;
$data = Tour::join('loaitour', 'loaitour.id', '=', 'tour.loaitour_id')
                ->select( 'tour.*', 'loaitour.type as type','loaitour.songay as songay', 'loaitour.sodem as sodem')
                ->get();
        foreach ($data as  $value) {
          if($value->in_out == $req->id  && $value->type==0)
            $touritem[]=$value;

        }

        $tour = $touritem;
return view('page.tours',['tour'=>$tour]);
   }
    public function gettoursNN_tk(Request $req){
     

$tour = null;
$data = Tour::join('loaitour', 'loaitour.id', '=', 'tour.loaitour_id')
                ->select( 'tour.*', 'loaitour.type as type','loaitour.songay as songay', 'loaitour.sodem as sodem')
                ->get();
        foreach ($data as  $value) {
          if($value->in_out == $req->id  && $value->type==1)
            $touritem[]=$value;
        }

        $tour = $touritem;
return view('page.tours',['tour'=>$tour]);
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
        $diadanh1=DiaDanh::take(5)
              ->orderBy('updated_at', 'desc')
              ->get();
    return view('page.diadanh',compact('diadanh','diadanh1'));
   }
   public function getabout(){

    return view('page.about');
   }

   public function getlienhe()
   {


    return view('page.lienhe');
   }
    public function getchitiettour(Request $req){
          $tour = Tour::join('loaitour', 'loaitour.id', '=', 'tour.loaitour_id')
                ->select( 'tour.*', 'loaitour.type as type','loaitour.songay as songay', 'loaitour.sodem as sodem')
                ->where('tour.id',$req->id)
                ->first();
       
        
         $diemden = Tour::find($tour->id)->tinhs;
         $thamquan=Tour::find($tour->id)->diadanhs;
         $noianuong=Tour::find($tour->id)->nhahangs;
         $noinghi=Tour::find($tour->id)->khachsans;
         $rating=null;

         if(Auth::guard('web')->check()){

            $rating = Rating::where([['rateable_id','=',$req->id],['user_id','=',Auth::user()->id]])->select('rating')->first();
                return view('page.chitiet_tour',compact('tour','diemden','thamquan','noianuong','noinghi','rating'));
          }
          else  return view('page.chitiet_tour',compact('tour','diemden','thamquan','noianuong','noinghi','rating'));
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
public function getBooking(Request $req){
  $tour = Tour::Where('id',$req->id)->first();
  return view('page.dattour',compact('tour'));
}
public function rendertourview(Request $request){
  if($request->ajax()){

    $data = $request->id;
    $tours = Tour::whereIn('id',$data)->get();

    $html = view('page.tous_view',compact('tours'))->render();
   
    return response()->json(['data'=>$html]);
  }
}
}
