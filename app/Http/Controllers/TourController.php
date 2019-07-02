<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tinh;
use App\Models\QuocGia;
use Validator;
use App\Models\LoaiTour;
use App\Models\DiaDanh;
use App\Models\NhaHang;
use App\Models\KhachSan;
use App\Models\Tour;
class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {       $quocgia=QuocGia::all();
            $tinh=Tinh::where('quocgia',84)->get();
            $loaitour=LoaiTour::all();
            $diadanh=DiaDanh::all();
            $nhahang=NhaHang::all();
            $khachsan=KhachSan::all();
       if(request()->ajax())
        {
          
            return datatables()->of(Tour::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->matour.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->matour.'" class="delete btn btn-danger btn-sm">Xóa</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.tour_manage',['quocgia'=>$quocgia,'loaitour'=>$loaitour,'tinh'=>$tinh,'diadanh'=>$diadanh,'nhahang'=>$nhahang,'khachsan'=>$khachsan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStates($id)
    {
        $states = Tinh::where('quocgia',$id)->pluck('tentinh','matinh');
        return json_encode($states);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
