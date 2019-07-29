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
//Comment
Route::post('post', 'PostController@post');

Route::get('show', 'PostController@getPost');

Route::get('getcomment', 'PostController@getComment');

Route::post('writecomment', 'PostController@makeComment');

//
Route::post('posts', 'PageController@postPost')->name('posts.post');
Route::get('tours',[
'as'=>'tours',
'uses'=>'PageController@gettours'
]);
Route::get('quocnoi/{id}',[
'as'=>'quocnoi',
'uses'=>'PageController@gettoursTN'
]);
Route::get('quocte/{id}',[
'as'=>'quocte',
'uses'=>'PageController@gettoursNN'
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

    Route::resource('yeucau', 'YeuCauController');
    Route::get('yeucau/update/{id}', 'YeuCauController@update');
    Route::get('yeucau/destroy/{id}', 'YeuCauController@destroy');
       Route::resource('ykien', 'YKienController');
    Route::get('ykien/update', 'YKienController@update')->name('ykien.update');
    Route::get('ykien/destroy/{id}', 'YKienController@destroy');

       Route::resource('tuchon', 'TuChonController');
    Route::get('tuchon/{id}/details', 'TuChonController@details');
     Route::get('tuchon/destroy/{id}', 'TuChonController@destroy');
});
