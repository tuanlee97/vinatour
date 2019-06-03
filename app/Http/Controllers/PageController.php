<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\DiemDen;
use App\Models\ThamQuan;
use App\Models\NoiAnUong;
use App\Models\NoiNghi;
class PageController extends Controller
{
	public function getindex(){
		return view('page.index');
	} 
   public function gettours(){
      $tour = Tour::paginate(8);

     
   	return view('page.tours',compact('tour'));
   }
   public function gethotels()
   {
   	return view('page.hotels');
   }
   public function getservices()
   {
   	return view('page.services');
   }
  
    public function getblog(){
   	return view('page.blog');
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
   public function gethotel_room(){
   	return view('page.hotel-room');
   }
}
