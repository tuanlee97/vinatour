<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachSan;
use App\Models\NhaHang;
use App\Models\Tinh;
use App\Models\QuocGia;
use App\Models\Tour;
use App\Models\DiemDen;
use App\Models\ThamQuan;
use App\Models\NoiAnUong;
use App\Models\NoiNghi;

use App\Models\DiaDanh;
class PageController extends Controller
{
	public function getindex(){
     $diadanh=DiaDanh::take(3)
 							->orderBy('updated_at', 'desc')
 							->get();

    $tour = Tour::take(8)
							->orderBy('review', 'desc')
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

   	return view('page.chitiet_tour',compact('tour','diemden','thamquan','noianuong','noinghi','dem'));
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
}
