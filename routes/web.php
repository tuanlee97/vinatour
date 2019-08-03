<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/search', 'LiveSearchController@search')->name('tour.search');
Route::get('/searchks', 'LiveSearchController@searchks')->name('khachsan.search');
Route::get('/searchks2', 'LiveSearchController@searchks2')->name('khachsan.search2');
Route::get('/searchks3', 'LiveSearchController@searchks3')->name('khachsan.search3');
Route::get('/searchnh', 'LiveSearchController@searchnh')->name('nhahang.search');
Route::get('/searchnh2', 'LiveSearchController@searchnh2')->name('nhahang.search2');
Route::get('/searchnh3', 'LiveSearchController@searchnh3')->name('nhahang.search3');
Route::get('/searchdd', 'LiveSearchController@searchdd')->name('diadanh.search');
Route::get('/searchdd2', 'LiveSearchController@searchdd2')->name('diadanh.search2');

//Comment
Route::post('post', 'PostController@post');

Route::get('show', 'PostController@getPost');

Route::get('getcomment', 'PostController@getComment');

Route::post('writecomment', 'PostController@makeComment');
Route::post('/view_tour','PageController@rendertourview')->name('tour.view');
//
Route::post('posts', 'PageController@postPost')->name('posts.post')->middleware('userLogin');
Route::post('postCheckout', 'DatTourController@postCheckout')->name('postCheckout');
Route::post('postCheckoutVNPAY', 'DatTourController@postCheckoutVNPAY')->name('postCheckoutVNPAY');
Route::get('return-vnpay', 'DatTourController@return')->name('return');
Route::get('tours',[
'as'=>'tours',
'uses'=>'PageController@gettours'
]);
Route::get('tours_tk',[
'as'=>'tours_tk',
'uses'=>'PageController@gettours_tk'
]);
Route::get('quocnoi/{id}',[
'as'=>'quocnoi',
'uses'=>'PageController@gettoursTN'
]);
Route::get('quocte/{id}',[
'as'=>'quocte',
'uses'=>'PageController@gettoursNN'
]);
Route::get('quocnoi_tk/{id}',[
'as'=>'quocnoi_tk',
'uses'=>'PageController@gettoursTN_tk'
]);
Route::get('quocte_tk/{id}',[
'as'=>'quocte_tk',
'uses'=>'PageController@gettoursNN_tk'
]);
Route::get('hotels',[
'as'=>'hotels',
'uses'=>'PageController@gethotels'
]);
Route::get('nhahang',[
'as'=>'nhahang',
'uses'=>'PageController@getnhahang'
]);
Route::get('services',[
'as'=>'services',
'uses'=>'PageController@getservices'
]);
Route::get('profile',[
'as'=>'profile',
'uses'=>'PageController@getProfile'
])->middleware('userLogin');
Route::get('/',[
'as'=>'index',
'uses'=>'PageController@getindex'
]);
Route::post('dattour',[
'as'=>'dattour',
'uses'=>'DatTourController@postorder'
]);
Route::get('ctdiadanh/{id}',[
'as'=>'ctdiadanh',
'uses'=>'PageController@getctdiadanh'
]);
Route::get('diadanh',[
'as'=>'diadanh',
'uses'=>'PageController@getDiadanh'
]);
Route::get('lienhe',[
'as'=>'lienhe',
'uses'=>'PageController@getlienhe'
]);
Route::get('about',[
'as'=>'about',
'uses'=>'PageController@getabout'
]);
Route::get('chitiettour/{id}',[
'as'=>'chitiettour',
'uses'=>'PageController@getchitiettour'
]);
Route::get('booking/{id}',[
'as'=>'booking',
'uses'=>'PageController@getBooking' 
])->middleware('userLogin');
Route::get('ctnhahang/{id}',[
'as'=>'ctnhahang',
'uses'=>'PageController@getctnhahang'
]);
Route::get('ctkhachsan/{id}',[
'as'=>'ctkhachsan',
'uses'=>'PageController@getctkhachsan'
]);
Route::get('getDiadanhs/{id}/{tour}','PageController@getDiadanhs');
Route::get('getNhahangs/{id}/{tour}','PageController@getNhahangs');
Route::get('getKhachsans/{id}/{tour}','PageController@getKhachsans');
Route::get('/redirectFB', 'SocialAuthFacebookController@redirect');
Route::get('/callbackFB', 'SocialAuthFacebookController@callback');

Route::get('/redirectGG', 'SocialAuthGoogleController@redirect');
Route::get('/callbackGG', 'SocialAuthGoogleController@callback');
Route::post('dattour',
    [
        'as'=>'dattour',
        'uses'=>'KhachHangController@postDattour'
    ]
);

Route::post('dangky',
    [
        'as'=>'dangky',
        'uses'=>'KhachHangController@postRegister'
    ]
);

Route::post('dangnhap',
    [
        'as'=>'dangnhap',
        'uses'=>'KhachHangController@postlogin'
    ]
);
Route::post('xoa_ykien/{id}',
    [
        'as'=>'xoa_ykien',
        'uses'=>'KhachHangController@postxoa_ykien'
    ]
);
Route::post('xoa_phanhoi/{id}',
    [
        'as'=>'xoa_phanhoi',
        'uses'=>'KhachHangController@postxoa_phanhoi'
    ]
);
Route::get('sua_phanhoi/{id}',
    [
        'as'=>'sua_phanhoi',
        'uses'=>'KhachHangController@getsua_phanhoi'
    ]
);
Route::get('sua_ykien/{id}',
    [
        'as'=>'sua_ykien',
        'uses'=>'KhachHangController@getsua_ykien'
    ]
);
Route::post('save_ykien',
    [
        'as'=>'save_ykien',
        'uses'=>'KhachHangController@postsave_ykien'
    ]
);
Route::post('save_phanhoi',
    [
        'as'=>'save_phanhoi',
        'uses'=>'KhachHangController@postsave_phanhoi'
    ]
);
Route::post('changeprofile',
    [
        'as'=>'changeprofile',
        'uses'=>'KhachHangController@postchangepass'
    ]
);
Route::post('changepass',
    [
        'as'=>'changepass',
        'uses'=>'KhachHangController@postchangepass'
    ]
);
Route::post('dangkihdv',
    [
        'as'=>'dangkihdv',
        'uses'=>'KhachHangController@postdangkihdv'
    ]
);
Route::post('load',
    [
        'as'=>'load',
        'uses'=>'AdminController@postLoadNotification'
    ]
);
Route::get('inhaiquan',[
'as'=>'inhaiquan',
'uses'=>'PageController@inhaiquan'
])->middleware('userLogin');

 Route::resource('danhsachin', 'InHaiQuanController');
    Route::post('danhsachin/update', 'InHaiQuanController@update')->name('danhsachin.update');
    Route::get('danhsachin/destroy/{id}', 'InHaiQuanController@destroy');

Route::post('thongtinchung',
    [
        'as'=>'thongtinchung',
        'uses'=>'InHaiQuanController@createthongtin'
    ]
);
Route::get('print/{id}',[
'as'=>'print',
'uses'=>'PageController@print'
])->middleware('userLogin');

Route::get('lay-lay-mat-khau','Auth\ForgotPasswordController@getFormResetPassword')->name('get.reset.password');
Route::post('sendlink','Auth\ForgotPasswordController@sendlinkreset')->name('post.reset.password');
Route::post('change-pw','Auth\ForgotPasswordController@postresetPassword')->name('post.change-pw.password');
Route::get('passwordreset','Auth\ForgotPasswordController@resetPassword')->name('get.link.reset.password');
Route::get('getmuatour',
    [
        'as'=>'getmuatour',
        'uses'=>'KhachHangController@getmuatour'
    ]
);
Route::post('postmuatour',
    [
        'as'=>'postmuatour',
        'uses'=>'KhachHangController@postmuatour'
    ]
);
Auth::routes();


    Route::group(['prefix'=>'admin'],function(){
        Route::get('dangnhap','AdminController@getloginAdmin');
        Route::post('dangnhap','AdminController@postloginAdmin');

    });
//
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::get('dangxuat','AdminController@getlogoutAdmin')->name('adlogout');
    Route::get('trangchu','AdminController@gettrangchu');
Route::get('getStates/{id}','TourController@getStates');
Route::get('getDiemden/{id}','TourController@getDiemden');
Route::get('getDiadanh/{id}','TourController@getDiadanh');
Route::get('getNhahang/{id}','TourController@getNhahang');
Route::get('getKhachsan/{id}','TourController@getKhachsan');
Route::get('getCustome/{id}','LoaiTourController@getCustome');
    Route::group(['prefix'=>'tour'],function(){

        Route::get('/','TourController@getDanhSach');

        Route::get('them','TourController@getThem');

        Route::get('sua/{id}','TourController@getSua');

        Route::post('them','TourController@XuLyThem');

        Route::post('sua/{id}','TourController@XuLySua');

        Route::get('xoa/{id}','TourController@XuLyXoa');
    });

    Route::resource('quocgia', 'QuocGiaController');
    Route::post('quocgia/update', 'QuocGiaController@update')->name('quocgia.update');
    Route::get('quocgia/destroy/{id}', 'QuocGiaController@destroy');

    Route::resource('khachhang', 'KhachHangController');
    Route::post('khachhang/update', 'KhachHangController@update')->name('khachhang.update');
    Route::get('khachhang/destroy/{id}', 'KhachHangController@destroy');

    Route::resource('quantrivien', 'AdminController');
    Route::post('quantrivien/update', 'AdminController@update')->name('quantrivien.update');
    Route::get('quantrivien/destroy/{id}', 'AdminController@destroy');

     Route::resource('tinh', 'TinhController');
    Route::post('tinh/update', 'TinhController@update')->name('tinh.update');
    Route::get('tinh/destroy/{id}', 'TinhController@destroy');

     Route::resource('diadanh', 'DiadanhController');
    Route::post('diadanh/update', 'DiadanhController@update')->name('diadanh.update');
    Route::get('diadanh/destroy/{id}', 'DiadanhController@destroy');

     Route::resource('khachsan', 'KhachSanController');
    Route::post('khachsan/update', 'KhachSanController@update')->name('khachsan.update');
    Route::get('khachsan/destroy/{id}', 'KhachSanController@destroy');

     Route::resource('nhahang', 'NhaHangController');
    Route::post('nhahang/update', 'NhaHangController@update')->name('nhahang.update');
    Route::get('nhahang/destroy/{id}', 'NhaHangController@destroy');

    Route::resource('tour', 'TourController');
    Route::post('tour/update', 'TourController@update')->name('tour.update');
    Route::get('tour/destroy/{id}', 'TourController@destroy');

     Route::resource('loaitour', 'LoaiTourController');
    Route::post('loaitour/update', 'LoaiTourController@update')->name('loaitour.update');
    Route::get('loaitour/destroy/{id}', 'LoaiTourController@destroy');

    Route::resource('yeucau', 'YeuCauController');

    Route::post('yeucau/XuLy','YeuCauController@XuLy')->name('yeucau.XuLy');
    Route::post('yeucau/Xoa','YeuCauController@Xoa')->name('yeucau.Xoa');

       Route::resource('ykien', 'YKienController');
       Route::post('ykien/XuLy','YKienController@XuLy')->name('ykien.XuLy');
    Route::post('ykien/Xoa','YKienController@Xoa')->name('ykien.Xoa');

         Route::resource('comment_tour', 'Comment_TourController');
       Route::post('comment_tour/XuLy','Comment_TourController@XuLy')->name('comment_tour.XuLy');
    Route::post('comment_tour/Xoa','Comment_TourController@Xoa')->name('comment_tour.Xoa');
        
       Route::resource('tuchon', 'TuChonController');
    Route::get('tuchon/{id}/details', 'TuChonController@details');
     Route::get('tuchon/destroy/{id}', 'TuChonController@destroy');
     Route::resource('donhang', 'DonHangController');
     Route::post('donhang/XuLy','DonHangController@XuLy')->name('donhang.XuLy');
     Route::get('donhang/{id}/details', 'DonHangController@details');

      Route::resource('donhang_done', 'DonHang_Done_Controller');
     Route::post('donhang_done/XuLy','DonHang_Done_Controller@XuLy')->name('donhang_done.XuLy');
     Route::get('donhang_done/{id}/details', 'DonHang_Done_Controller@details');
});
