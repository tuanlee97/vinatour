<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Models\Tour;
use App\Models\DonDatTour;
use App\Models\ChiTietDatTour;
use Validator;
use Session;
use Illuminate\Support\Facades\Auth;
use Hash;
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
            'thanhtoan'          => "Thanh toán tại công ty"
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
            
                $url = route('chitiettour',$tour->id);
                $get = ['get'=>$url];
               
            Mail::send('dondattour.sendmail',['get'=>$get,'arr_chitietdattour'=>$arr_chitietdattour,'dondattour'=>$dondattour,'tour'=>$tour],function($message) use ($email){
            $message->to($email,'Thông tin đơn đặt tour của bạn')->subject('Thông tin đơn đặt tour');
});

    

return response()->json(['success'=>'Data is successfully added']);


}


 public function postCheckoutVNPAY (Request $request){ 

 
            $tour = Tour::find($request->tour_id);
       $form_data = array(
            'tour_id'        =>  $request->tour_id,
            'user_id'             =>  Auth()->user()->id,
            'songuoilon'        => $request->nguoilonsl,
            'sotreem'          => $request->treemsl,
            'soembe'      => $request->embesl,
            'tongtien'          => $request->tongtien,
            'status'          => 0,
            'thanhtoan'          => null
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
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);


    $vnp_TmnCode = "LKRTW0F2";
   $vnp_HashSecret = "TQYLRZBOGXNCFECTHQVQACUSNLNVTPQG";
    $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
  $vnp_Returnurl = "http://vinatour.test/return-vnpay"; 



$vnp_TxnRef = $dondattour->id;
$vnp_OrderInfo = $request->order_desc;
$vnp_OrderType = $request->order_type;
$vnp_Amount = $request->tongtien * 100;
$vnp_Locale = $request->language;
$vnp_BankCode = $request->bank_code;
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

$inputData = array(
    "vnp_Version" => "2.0.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
);

if ($vnp_BankCode && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . $key . "=" . $value;
    } else {
        $hashdata .= $key . "=" . $value;
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if ($vnp_HashSecret) {
   // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
    $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
    $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);

return response()->json(['success'=> $returnData['data']]);
// return redirect()->to($returnData['data']);






    



}

public function return(Request $request)
{
     $dondattourID = $request->vnp_TxnRef;
        $dondattour = DonDatTour::find($dondattourID);
   
    if($request->vnp_ResponseCode == "00") {
            $dondattour->thanhtoan="Thanh toán VNPAY";
            $dondattour->save();
                $tour = Tour::find($dondattour->tour_id);
                $email = Auth::user()->email;    
                $arr_chitietdattour = ChiTietDatTour::where('dondattour_id',$dondattour->id)->get();
            $url = route('chitiettour',$tour->id);
                $get = ['get'=>$url];
               
            Mail::send('dondattour.sendmail',['get'=>$get,'arr_chitietdattour'=>$arr_chitietdattour,'dondattour'=>$dondattour,'tour'=>$tour],function($message) use ($email){
            $message->to($email,'Thông tin đơn đặt tour của bạn')->subject('Thông tin đơn đặt tour');
});
            return redirect('tours')->with('success' ,'Đã thanh toán phí dịch vụ');              
    }
   else{
         $dondattour->delete();
        return redirect('tours')->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');

   } 
    
}

}
