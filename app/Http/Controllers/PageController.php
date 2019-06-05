<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\QuocGia;
use App\Models\DiaDanh;
use App\Models\Tinh;
use App\Models\KhachSan;
use App\Models\NhaHang;
use App\Models\DiemDen;
use App\Models\ThamQuan;
use App\Models\NoiAnUong;
use App\Models\NoiNghi;
class PageController extends Controller
{
	public function getindex(){
     $diadanh=DiaDanh::all();
    $tour = Tour::paginate(8);
      $khachsan = KhachSan::all();
      $tinh = Tinh::all();
      $quocgia = QuocGia::all();
		return view('page.index',['tour'=>$tour,'diadanh'=>$diadanh,'khachsan'=>$khachsan,'quocgia'=>$quocgia,'tinh'=>$tinh]);
	} 
   public function gettours(){
      $tour = Tour::paginate(8);

     
   	return view('page.tours',compact('tour'));
   }
   public function gethotels()
   {
      $khachsan = KhachSan::all();
      $tinh = Tinh::all();
      $quocgia = QuocGia::all();
   	return view('page.hotels',['khachsan'=>$khachsan,'quocgia'=>$quocgia,'tinh'=>$tinh]);
   }
    public function getnhahang()
   {
      $nhahang = NhaHang::all();
      $tinh = Tinh::all();
      $quocgia = QuocGia::all();
    return view('page.nhahang',['nhahang'=>$nhahang,'quocgia'=>$quocgia,'tinh'=>$tinh]);
   }
   public function getservices()
   {
   	return view('page.services');
   }

   public function getlienhe()
   {
    return view('page.lienhe');
   }
  
    public function getblog(){
      $diadanh=DiaDanh::all();
   	return view('page.blog',['diadanh'=>$diadanh]);
   }
   public function getabout(){
   	return view('page.about');
   }
    public function getchitiettour(Request $req){
         $tour = Tour::Where('matour',$req->id)->first();
         $diemden = DiemDen::Where('matour',$tour->matour)->get();
         $thamquan=array();
         foreach ($diemden as $dd) {
             $diadiem = ThamQuan::Where('khuvuc',$dd->id_diemden)->get();
             $thamquan[]=$diadiem;
            
         }
         $noianuong=array();
         foreach ($diemden as $dd) {
             $diadiem = NoiAnUong::Where('khuvuc',$dd->id_diemden)->get();
             $noianuong[]=$diadiem;
            
         }
         $noinghi=array();
         foreach ($diemden as $dd) {
             $diadiem = NoiNghi::Where('khuvuc',$dd->id_diemden)->get();
             $noinghi[]=$diadiem;
            
         }
        
   	return view('page.chitiet_tour',compact('tour','diemden','thamquan','noianuong','noinghi'));
   }
   public function gethotel_room(Request $req){
    $khachsan=KhachSan::Where('makhachsan',$req->id)->first();
   	return view('page.hotel-room',['khachsan'=>$khachsan]);
   }
    public function getctblog(Request $req){
    $diadanh=DiaDanh::Where('madiadanh',$req->id)->first();
    return view('page.ctblog',['diadanh'=>$diadanh]);
   }
   public function getctnhahang(Request $req){
    $nhahang=NhaHang::Where('manhahang',$req->id)->first();
    return view('page.ctnhahang',['nhahang'=>$nhahang]);
   }
}
