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
            $tinh=Tinh::all();
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
        return view('admin.tour_manage',['quocgia'=>$quocgia,'tinh'=>$tinh,'diadanh'=>$diadanh,'nhahang'=>$nhahang,'khachsan'=>$khachsan,'loaitour'=>$loaitour]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStates($id)
    {

      $idQuocNoi= null;
      $quocnoi = QuocGia::where('quocnoi',1)->get();
      foreach ($quocnoi as  $value) {
        $idQuocNoi=$value->maquocgia;
      }

      if($id==0){
      $states = Tinh::where('quocgia',$idQuocNoi)->pluck('tentinh','id');
      return json_encode($states);}
      else {
        $states = Tinh::where('quocgia','<>',$idQuocNoi)->pluck('tentinh','id');
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
     'xuatphat' => ' required',
     'diemden' => 'required',
     'diadanh' => 'required',
     'nhahang' => 'required',
     'nhahang' => 'required',
     'khachsan' => 'required',
      'loaitour' => 'required',
     'editor1' => 'required',
     'khuvuc' => 'required',
     'image' => 'required|image|max:2048'],

     [
      'tentour.required'=>'Bạn chưa nhập tên tour',
      'khuvuc.required'=>'Bạn chưa chọn khu vực',
      'xuatphat.required'=>'Bạn chưa chọn điểm xuất phát',
      'diemden.required'=>'Bạn chưa chọn điểm đến',
      'diadanh.required'=>'Bạn chưa chọn địa danh',
      'nhahang.required'=>'Bạn chưa chọn nhà hàng',
      'khachsan.required'=>'Bạn chưa chọn khách sạn',
      'loaitour.required'=>'Bạn chưa chọn loại tour',
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

     $image->move(public_path('admin/images/tour'), $new_name);
     $form_data = array(
          'in_out'  => $request->khuvuc,
         'tentour'        =>  $request->tentour,
          'loaitour_id'        =>  $request->loaitour,
         'diemxuatphat'          => $request->xuatphat,
         'noidung'        => $request->editor1,
         'hinhanh'      => $new_name,
         'gianguoilon'      => $request->gianguoilon,
         'giatreem'      => $request->giatreem,
         'giaembe'      => $request->giaembe,
          'soluong' => $request->soluong,
        'ngaykhoihanh' => $request->ngaykhoihanh,
        'khuyenmai' =>$request->khuyenmai,
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
           'nha_hang_id'  =>   (int)$nhahang
           );
           DB::table('nha_hang_tour')->insert($nhahang_tour_data);

        }
        foreach ($request->khachsan as $khachsan) {
          $khachsan_tour_data = array(
           'tour_id'  =>    $tour->id,
           'khach_san_id'  =>   (int)$khachsan
           );
           DB::table('khach_san_tour')->insert($khachsan_tour_data);

        }
        foreach ($request->diadanh as $diadanh) {
          $diadanh_tour_data = array(
           'tour_id'  =>    $tour->id,
           'dia_danh_id'  =>   (int)$diadanh
           );
           DB::table('dia_danh_tour')->insert($diadanh_tour_data);

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
      if(request()->ajax())
      {
          $data = Tour::findOrFail($id);

          $dichden = Tour::find($id)->tinhs;
          $thamquan = Tour::find($id)->diadanhs;
          $noianuong = Tour::find($id)->nhahangs;
          $noinghi = Tour::find($id)->khachsans;
          return response()->json(['data' => $data,'dichden'=>$dichden,'thamquan'=>$thamquan,'noianuong'=>$noianuong,'noinghi'=>$noinghi]);
      }
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id="")
  {


      $image_name = $request->hidden_image;
      $image = $request->file('image');
      if($image != '')
      {


          $error = Validator::make($request->all(), [
           'tentour'    =>  'required',
          'khuvuc' => 'required',
          'xuatphat' => ' required',
          'diemden' => 'required',
          'diadanh' => 'required',
          'nhahang' => 'required',
          'khachsan' => 'required',
          'loaitour' => 'required',
          'editor1' => 'required',
          'image' => 'required|image|max:2048'],

          [ 'tentour.required'=>'Bạn chưa nhập tên tour',
           'khuvuc.required'=>'Bạn chưa chọn khu vực',
           'xuatphat.required'=>'Bạn chưa chọn điểm xuất phát',
           'diemden.required'=>'Bạn chưa chọn điểm đến',
           'diadanh.required'=>'Bạn chưa chọn địa danh',
           'nhahang.required'=>'Bạn chưa chọn nhà hàng',
           'khachsan.required'=>'Bạn chưa chọn khách sạn',
            'loaitour.required'=>'Bạn chưa chọn loại tour',
           'editor1.required'=>'Bạn chưa nhập nội dung',
           'image.required'=>'Bạn chưa chọn hình ảnh',
           'image.image'=>'Sai định dạng ảnh',
           'image.max'=>'Ảnh tối đa 2MB',
           ]);
          if($error->fails())
          {
              return response()->json(['errors' => $error->errors()->all()]);
          }

          $image_name = rand() . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('admin/images/tour'), $image_name);
          $form_data = array(
            'in_out'  => $request->khuvuc,
           'tentour'        =>  $request->tentour,
            'loaitour_id'        =>  $request->loaitour,
           'diemxuatphat'          => $request->xuatphat,
           'noidung'        => $request->editor1,
            'hinhanh'            =>   $image_name,
             'gianguoilon'      => $request->gianguoilon,
         'giatreem'      => $request->giatreem,
         'giaembe'      => $request->giaembe,
               'soluong' => $request->soluong,
        'ngaykhoihanh' => $request->ngaykhoihanh,
        'khuyenmai' =>$request->khuyenmai,
          );
          Tour::whereId($request->hidden_id)->update($form_data);
          $tour=Tour::findOrFail($request->hidden_id)->id;
          DB::table('tinh_tour')->where('tour_id',$tour)->delete();
          foreach ($request->diemden as $diemden) {
            $tinh_tour_data = array(
              'tour_id' => $tour,
             'tinh_id'  =>   (int)$diemden,
             );
             DB::table('tinh_tour')->insert($tinh_tour_data);

          }
          DB::table('nha_hang_tour')->where('tour_id',$tour)->delete();
          foreach ($request->nhahang as $nhahang) {
            $nhahang_tour_data = array(
                'tour_id' => $tour,
             'nha_hang_id'  =>   (int)$nhahang,
             );
          DB::table('nha_hang_tour')->insert($nhahang_tour_data);

          }
            DB::table('khach_san_tour')->where('tour_id',$tour)->delete();
          foreach ($request->khachsan as $khachsan) {
            $khachsan_tour_data = array(
                  'tour_id' => $tour,
             'khach_san_id'  =>   (int)$khachsan,
             );
             DB::table('khach_san_tour')->insert($khachsan_tour_data);

          }
            DB::table('dia_danh_tour')->where('tour_id',$tour)->delete();
          foreach ($request->diadanh as $diadanh) {
            $diadanh_tour_data = array(
                  'tour_id' => $tour,
             'dia_danh_id'  =>   (int)$diadanh,
             );
             DB::table('dia_danh_tour')->insert($diadanh_tour_data);

          }
          return response()->json(['success' => 'Data is successfully updated']);
      }
      else
      {


          $error = Validator::make($request->all(), [
           'tentour'    =>  'required',
          'khuvuc' => 'required',
          'xuatphat' => ' required',
          'diemden' => 'required',
          'diadanh' => 'required',
          'nhahang' => 'required',
          'khachsan' => 'required',
          'loaitour' => 'required',
          'editor1' => 'required',
          ],

          [ 'tentour.required'=>'Bạn chưa nhập tên tour',
           'khuvuc.required'=>'Bạn chưa chọn khu vuc',
           'xuatphat.required'=>'Bạn chưa chọn điểm xuất phát',
           'diemden.required'=>'Bạn chưa chọn điểm đến',
           'diadanh.required'=>'Bạn chưa chọn địa danh',
           'nhahang.required'=>'Bạn chưa chọn nhà hàng',
           'khachsan.required'=>'Bạn chưa chọn khách sạn',
           'loaitour.required'=>'Bạn chưa chọn loại tour',

           'editor1.required'=>'Bạn chưa nhập nội dung',

           ]);

          if($error->fails())
          {
              return response()->json(['errors' => $error->errors()->all()]);
          }
          $form_data = array(
            'in_out'  => $request->khuvuc,
           'tentour'        =>  $request->tentour,
            'loaitour_id'        =>  $request->loaitour,
           'diemxuatphat'          => $request->xuatphat,
           'noidung'        => $request->editor1,
            'gianguoilon'      => $request->gianguoilon,
         'giatreem'      => $request->giatreem,
         'giaembe'      => $request->giaembe,
               'soluong' => $request->soluong,
        'ngaykhoihanh' => $request->ngaykhoihanh,
        'khuyenmai' =>$request->khuyenmai,

          );
          Tour::whereId($request->hidden_id)->update($form_data);
          $tour=Tour::findOrFail($request->hidden_id)->id;
          DB::table('tinh_tour')->where('tour_id',$tour)->delete();
          foreach ($request->diemden as $diemden) {
            $tinh_tour_data = array(
              'tour_id' => $tour,
             'tinh_id'  =>   (int)$diemden,
             );
             DB::table('tinh_tour')->insert($tinh_tour_data);

          }
          DB::table('nha_hang_tour')->where('tour_id',$tour)->delete();
          foreach ($request->nhahang as $nhahang) {
            $nhahang_tour_data = array(
                'tour_id' => $tour,
             'nha_hang_id'  =>   (int)$nhahang,
             );
          DB::table('nha_hang_tour')->insert($nhahang_tour_data);

          }
            DB::table('khach_san_tour')->where('tour_id',$tour)->delete();
          foreach ($request->khachsan as $khachsan) {
            $khachsan_tour_data = array(
                  'tour_id' => $tour,
             'khach_san_id'  =>   (int)$khachsan,
             );
             DB::table('khach_san_tour')->insert($khachsan_tour_data);

          }
            DB::table('dia_danh_tour')->where('tour_id',$tour)->delete();
          foreach ($request->diadanh as $diadanh) {
            $diadanh_tour_data = array(
                  'tour_id' => $tour,
             'dia_danh_id'  =>   (int)$diadanh,
             );
             DB::table('dia_danh_tour')->insert($diadanh_tour_data);

          }
          return response()->json(['success' => 'Data is successfully updated']);
      }



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $data = Tour::find($id);
          DB::table('tinh_tour')->where('tour_id',$id)->delete();
          DB::table('dia_danh_tour')->where('tour_id',$id)->delete();
          DB::table('nha_hang_tour')->where('tour_id',$id)->delete();
          DB::table('khach_san_tour')->where('tour_id',$id)->delete();
          $data->delete();
    }
}
