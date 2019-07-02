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


Route::get('tours',[
'as'=>'tours',
'uses'=>'PageController@gettours'
]);
Route::get('hotels',[
'as'=>'hotels',
'uses'=>'PageController@gethotels'
]);
Route::get('services',[
'as'=>'services',
'uses'=>'PageController@getservices'
]);

Route::get('/',[
'as'=>'index',
'uses'=>'PageController@getindex'
]);


Route::get('blog',[
'as'=>'blog',
'uses'=>'PageController@getblog'
]);

Route::get('about',[
'as'=>'about',
'uses'=>'PageController@getabout'
]);
Route::get('chitiettour/{id}',[
'as'=>'chitiettour',
'uses'=>'PageController@getchitiettour'
]);
Route::get('hotel-room',[
'as'=>'hotel-room',
'uses'=>'PageController@gethotel_room'
]);
Route::get('/redirectFB', 'SocialAuthFacebookController@redirect');
Route::get('/callbackFB', 'SocialAuthFacebookController@callback');

Route::get('/redirectGG', 'SocialAuthGoogleController@redirect');
Route::get('/callbackGG', 'SocialAuthGoogleController@callback');

Route::post('dangky',
    [
        'as'=>'dangky',
        'uses'=>'UserController@postRegister'
    ]
);

Route::post('dangnhap',
    [
        'as'=>'dangnhap',
        'uses'=>'UserController@postlogin'
    ]
);
Auth::routes();

Route::get('admin/dangxuat','UserController@getlogoutAdmin');

    Route::group(['prefix'=>'admin'],function(){
        Route::get('dangnhap','AdminController@getloginAdmin');
        Route::post('dangnhap','AdminController@postloginAdmin');
    });
//,'middleware'=>'adminLogin'
Route::group(['prefix'=>'admin'],function(){
    Route::get('trangchu','AdminController@gettrangchu');

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
});



