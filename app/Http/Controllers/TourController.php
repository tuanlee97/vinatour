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
use DB;
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
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Sửa</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Xóa</button>';
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
        if($id==1){
        $states = Tinh::where('quocgia',84)->pluck('tentinh','id');
        return json_encode($states);}
        else {
          $states = Tinh::where('quocgia','<>',84)->pluck('tentinh','id');
          return json_encode($states);}
        }
        public function getDiadanh($id)
        {

            $diadanh = DiaDanh::where('tinh',$id)->pluck('tendiadanh','id');
            return json_encode($diadanh);
        }
        public function getNhahang($id)
        {

            $nhahang = NhaHang::where('tinh',$id)->pluck('tennhahang','id');
            return json_encode($nhahang);
        }
        public function getKhachsan($id)
        {

            $khachsan = KhachSan::where('tinh',$id)->pluck('tenkhachsan','id');
            return json_encode($khachsan);
        }
        public function getDiemden($id)
        {

            $diemden = Tinh::where('id',$id)->pluck('tentinh','id');
            return json_encode($diemden);
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

     $error = Validator::make($request->all(), [
      'tentour'    =>  'required',
     'loaitour' => 'required',
     'xuatphat' => ' required',
     'diemden' => 'required',
     'diadanh' => 'required',
     'nhahang' => 'required',
     'khachsan' => 'required',
     'sodem' => 'required',
     'songay' => 'required|greater_than_field:sodem',
     'editor1' => 'required',
     'image' => 'required|image|max:2048'],

     [ 'tentour.required'=>'Bạn chưa nhập tên tour',
      'loaitour.required'=>'Bạn chưa chọn loại tour',
      'xuatphat.required'=>'Bạn chưa chọn điểm xuất phát',
      'diemden.required'=>'Bạn chưa chọn điểm đến',
      'diadanh.required'=>'Bạn chưa chọn địa danh',
      'nhahang.required'=>'Bạn chưa chọn nhà hàng',
      'khachsan.required'=>'Bạn chưa chọn khách sạn',
      'sodem.required'=>'Bạn chưa chọn số đêm',
      'songay.required'=>'Bạn chưa chọn số ngày',
      'songay.greater_than_field'=>'Số ngày phải lớn hơn Số đêm',
      'editor1.required'=>'Bạn chưa nhập nội dung',
      'image.required'=>'Bạn chưa chọn hình ảnh',
      'image.image'=>'Sai định dạng ảnh',
      'image.max'=>'Ảnh tối đa 2MB',
      ]);

     if($error->fails())
     {
         return response()->json(['errors' => $error->errors()->all()]);
     }
      $image = $request->file('image');

     $new_name = rand() . '.' . $image->getClientOriginalExtension();

     $image->move(public_path('images/'), $new_name);
     $form_data = array(
          'loaitour'  => $request->loaitour,
         'tentour'        =>  $request->tentour,
         'songay'             =>  $request->songay,
         'sodem'             =>  $request->sodem,
         'diemxuatphat'          => $request->xuatphat,
         'noidung'        => $request->editor1,
         'hinhanh'      => $new_name
     );

      $tour =  Tour::create($form_data);
        foreach ($request->diemden as $diemden) {
          $tinh_tour_data = array(
           'tour_id'  =>    $tour->id,
           'tinh_id'  =>   (int)$diemden
           );
           DB::table('tinh_tour')->insert($tinh_tour_data);

        }
        foreach ($request->nhahang as $nhahang) {
          $nhahang_tour_data = array(
           'tour_id'  =>    $tour->id,
           'nhahang_id'  =>   (int)$nhahang
           );
           DB::table('nhahang_tour')->insert($nhahang_tour_data);

        }
        foreach ($request->khachsan as $khachsan) {
          $khachsan_tour_data = array(
           'tour_id'  =>    $tour->id,
           'khachsan_id'  =>   (int)$khachsan
           );
           DB::table('khachsan_tour')->insert($khachsan_tour_data);

        }
        foreach ($request->diadanh as $diadanh) {
          $diadanh_tour_data = array(
           'tour_id'  =>    $tour->id,
           'diadanh_id'  =>   (int)$diadanh
           );
           DB::table('diadanh_tour')->insert($diadanh_tour_data);

        }

     return response()->json(['success' => 'Data Added successfully.']);
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
