<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Tinh;
use App\Models\KhachSan;
use App\Models\NhaHang;
use App\Models\NoiAnUong;
use App\Models\NoiNghi;
use App\Models\ThamQuan;
use App\Models\QuocGia;
class TourController extends Controller
{
    public function getDanhSach(){
    	 $tour = Tour::all();
    	 
    	return view('admin.qltour.danhsach',compact('tour'));
    }
     public function getThem(){
     		 $quocgia = QuocGia::all();
     		 $tinh = Tinh::all();
     		 $khachsan = KhachSan::all();
     		 $nhahang = NhaHang::all();
     		 $noianuong = NoiAnUong::all();
     		 $noinghi = NoiNghi::all();
     		 $thamquan = ThamQuan::all();

    	return view('admin.qltour.them',compact('quocgia','tinh','khachsan','nhahang','noianuong','noinghi','thamquan'));
    }
}