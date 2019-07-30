<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Models\Tour;
use App\Models\DonDatTour;
use App\Models\ChiTietDatTour;
use Validator;

use Illuminate\Support\Facades\Auth;
class DatTourController extends Controller
{
    public function postCheckout (Request $request){ 
            $tour = Tour::find($request->tour_id);
       $form_data = array(
            'tour_id'        =>  $request->tour_id,
            'user_id'             =>  Auth()->user()->id,
            'songuoilon'        => $request->nguoilonsl,
            'sotreem'          => $request->treemsl,
            'soembe'      => $request->embesl,
            'tongtien'          => $request->tongtien,
            'status'          => 0,
            'thanhtoan'          => $request->thanhtoan
        );

        $dondattour=DonDatTour::create($form_data);
            foreach ($request->nguoilon as $key => $value) {
            
            $form_nguoilon_data = array(
            'dondattour_id'        =>  $dondattour->id,
            'giatien'             =>  $tour->gianguoilon,
            'loai'        => "Người lớn",
            'ten'          => $value['name'],
            'sdt'      => $value['phone'],
            'diachi'          => $value['address'],
            'gioitinh'          => $value['sex'],
            'quocgia'          => $value['country'],
             'passport'          => $value['passport']
        );

        $chitietdattour_nguoilon=ChiTietDatTour::create($form_nguoilon_data);

            }
            if($request->treemsl != null){
            foreach ($request->treem as $key => $value) {
            $form_treem_data = array(
            'dondattour_id'        =>  $dondattour->id,
            'giatien'             =>  $tour->giatreem,
            'loai'        => "Trẻ em",
            'ten'          => $value['name'],
            'sdt'      => $value['phone'],
            'diachi'          => $value['address'],
            'gioitinh'          => $value['sex'],
            'quocgia'          => $value['country'],
             'passport'          => $value['passport']
        );

        $chitietdattour_nguoilon=ChiTietDatTour::create($form_treem_data);

            }
}
 if($request->embesl != null){
 foreach ($request->embe as $key => $value) {
            $form_embe_data = array(
            'dondattour_id'        =>  $dondattour->id,
            'giatien'             =>  $tour->giaembe,
            'loai'        => "Em bé",
            'ten'          => $value['name'],
            'sdt'      => $value['phone'],
            'diachi'          => $value['address'],
            'gioitinh'          => $value['sex'],
            'quocgia'          => $value['country'],
             'passport'          => $value['passport']
        );

        $chitietdattour_nguoilon=ChiTietDatTour::create($form_embe_data);

            }
        }
                $email = Auth::user()->email;    
                $arr_chitietdattour = ChiTietDatTour::where('dondattour_id',$dondattour->id)->get();
            Mail::send('dondattour.sendmail',['arr_chitietdattour'=>$arr_chitietdattour,'dondattour'=>$dondattour,'tour'=>$tour],function($message) use ($email){
            $message->to($email,'Thông tin đơn đặt tour của bạn')->subject('Thông tin đơn đặt tour');
});

    

return response()->json(['success'=>'Data is successfully added']);


}
}
