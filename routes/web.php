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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('dangnhap','admincontroller@getlogin');
Route::get('user','admincontroller@getadmin');
Route::post('user','admincontroller@postadmin');
Route::get('logout','admincontroller@logout');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('message', function() {
    	return view('janux.messages');
});
Route::resource('sanpham','sanphamcontroller');
Route::resource('nhacungcap','nhacungcapController');

////////////////////////////////////////////////////////////////////////////////////
Route::group(['prefix' => 'admin','middleware'=>'check'], function() {
    Route::group(['prefix' => 'cate'], function() {
    	Route::get('list',['as'=>'admin.cate.getList','uses'=>'CateController@getList']);
        Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);
          Route::post('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@postAdd']);
           Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);
            Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);
         	 Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);

    });
});

//////////////////
Route::group(['prefix' => 'admin','middleware'=>'check'], function() {
        Route::group(['prefix' => 'cungcap'], function() {
            //
        Route::get('addcungcap',['as'=>'admin.cungcap.getAdd','uses'=>'CungcapController@getAdd']);
          Route::post('addcungcap',['as'=>'admin.cungcap.getAdd','uses'=>'CungcapController@postAdd']);

        });
});
/////////////////////////////

Route::group(['prefix' => 'admin','middleware'=>'check'], function() {
    Route::group(['prefix' => 'loaihang'], function() {
      Route::get('list',['as'=>'admin.loaihang.getList','uses'=>'LoaihangController@getList']);
        Route::get('add',['as'=>'admin.loaihang.getAdd','uses'=>'LoaihangController@getAdd']);
          Route::post('add',['as'=>'admin.loaihang.getAdd','uses'=>'LoaihangController@postAdd']);
           Route::get('delete/{id}',['as'=>'admin.loaihang.getDelete','uses'=>'LoaihangController@getDelete']);
            Route::get('edit/{id}',['as'=>'admin.loaihang.getEdit','uses'=>'LoaihangController@getEdit']);
           Route::post('edit/{id}',['as'=>'admin.loaihang.postEdit','uses'=>'LoaihangController@postEdit']);

    });
});







////////////////////////////
Route::group(['prefix' => 'admin','middleware'=>'check'], function() {
        Route::group(['prefix' => 'lienhe'], function() {
            //
        Route::get('list',['as'=>'admin.lienhe.list','uses'=>'LienheController@index']);
         Route::get('delete/{id}',['as'=>'admin.lienhe.getDeletes','uses'=>'LienheController@getDelete']);
          Route::get('edit/{id}',['as'=>'admin.lienhe.getEdit','uses'=>'LienheController@getEdit']);
        });
});
/////////////////////////
       Route::group(['prefix' => 'admin','middleware'=>'check'], function() {
        Route::group(['prefix' => 'thongke'], function() {
            //
        Route::get('list',['as'=>'admin.thongke.list','uses'=>'ThongkeController@index']);
         Route::get('edit',['as'=>'admin.thongke.getEdit','uses'=>'ThongkeController@getEdit']);
        
        });
});
      

///////////////////////////////////////////////////////
    Route::group(['prefix' => 'admin','middleware'=>'check'], function() {
        Route::group(['prefix' => 'nguoidung'], function() {
              Route::get('list',['as'=>'admin.nguoidung.getList','uses'=>'TaikhoanController@getList']);  
               Route::get('delete/{id}',['as'=>'admin.nguoidung.getDelete','uses'=>'TaikhoanController@getDelete']);
              Route::get('add',['as'=>'admin.nguoidung.getAdd','uses'=>'TaikhoanController@getAdd']);
             Route::post('add',['as'=>'admin.nguoidung.getAdd','uses'=>'TaikhoanController@postAdd']);
              Route::get('edit/{id}',['as'=>'admin.nguoidung.getEdit','uses'=>'TaikhoanController@getEdit']);
           Route::post('edit/{id}',['as'=>'admin.nguoidung.postEdit','uses'=>'TaikhoanController@postEdit']);
               Route::get('capdo',['as'=>'admin.nguoidung.capdo','uses'=>'TaikhoanController@capdo']);

        });
});
Route::group(['prefix' => 'admin','middleware'=>'check'], function() {
        Route::group(['prefix' => 'phieunhap'], function() {
              Route::get('list',['as'=>'admin.phieunhap.getList','uses'=>'PhieunhapController@getList']);  
             Route::get('addphieunhap',['as'=>'admin.phieunhap.getAdd','uses'=>'PhieunhapController@getAdd']);
              Route::post('addphieunhap',['as'=>'admin.phieunhap.getAdd','uses'=>'PhieunhapController@postAdd']);
               Route::get('delete/{id}',['as'=>'admin.phieunhap.getDelete','uses'=>'PhieunhapController@getDelete']);
              Route::get('edit/{id}',['as'=>'admin.phieunhap.getEdit','uses'=>'PhieunhapController@getEdit']);
              Route::post('edit/{id}',['as'=>'admin.phieunhap.postEdit','uses'=>'PhieunhapController@postEdit']);

        });
});
/////////////////////////////////////

 Route::group(['prefix' => 'admin','middleware'=>'check'], function() {
        Route::group(['prefix' => 'donhang'], function() {
              Route::get('list',['as'=>'admin.donhang.getList','uses'=>'DonhangController@getList']);  
               Route::get('delete/{id}',['as'=>'admin.donhang.getDelete','uses'=>'DonhangController@getDelete']);
              Route::get('add',['as'=>'admin.donhang.getAdd','uses'=>'DonhangController@getAdd']);
             Route::post('add',['as'=>'admin.donhang.getAdd','uses'=>'DonhangController@postAdd']);
              Route::get('edit/{id}',['as'=>'admin.donhang.getEdit','uses'=>'DonhangController@getEdit']);
           Route::post('edit/{id}',['as'=>'admin.donhang.postEdit','uses'=>'DonhangController@postEdit']);
             Route::get('indonhang/{id}',['as'=>'admin.donhang.indonhang','uses'=>'DonhangController@indonhang']);
              
       

        Route::get('listnv',['as'=>'admin.donhang.getListnv','uses'=>'DonhangController@getListnv']);  
         Route::get('editnv/{id}',['as'=>'admin.donhang.getEditnv','uses'=>'DonhangController@getEditnv']);
           Route::post('editnv/{id}',['as'=>'admin.donhang.getEditnv','uses'=>'DonhangController@postEditnv']);



               Route::get('capdo',['as'=>'admin.donhang.capdo','uses'=>'DonhangController@capdo']);

        });
});









////////////////


  Route::get('admin/login1',['as'=>'admin.login','uses'=>'Auth\LoginController@getLogin']);
          Route::post('admin/login1',['as'=>'admin.login','uses'=>'Auth\LoginController@postLogin']);
            Route::get('logout',['uses'=>'Auth\LoginController@logout']);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/',['as'=>'CHshop','uses'=>'WelcomeController@index']); 
Route::get('loaisanpham/{id}',['as'=>'loaisanpham','uses'=>'WelcomeController@loaisanpham']); 
Route::get('chitietsanpham/{id}',['as'=>'chitietsanpham','uses'=>'WelcomeController@chitietsanpham']); 
Route::get('muahang/{id}',['as'=>'muahang','uses'=>'WelcomeController@muahang']); 
Route::get('giohang',['as'=>'giohang','uses'=>'WelcomeController@giohang']); 
Route::get('xoasanpham/{id}',['as'=>'xoasanpham','uses'=>'WelcomeController@xoasanpham']);
Route::post('tinhtien',['as'=>'tinhtien','uses'=>'WelcomeController@tinhtien']); 















//////
Route::get('lienhe',['as'=>'lienhe','uses'=>'LienheController@getAdd']); 
Route::post('lienhe',['as'=>'lienhe','uses'=>'LienheController@postAdd']); 
Route::get('dangnhap1',['as'=>'dangnhap1','uses'=>'WelcomeController@getDangnhap']); 
Route::post('dangnhap1',['as'=>'dangnhap1','uses'=>'WelcomeController@postDangnhap']); 
Route::get('thoat','WelcomeController@logout');
Route::get('dangki',['as'=>'dangki','uses'=>'WelcomeController@getdangki']); 
Route::post('dangki',['as'=>'dangki','uses'=>'WelcomeController@postdangki']); 

Route::get('thongtin',['as'=>'thongtin','uses'=>'WelcomeController@getthongtin']); 
Route::post('thongtin',['as'=>'thongtin','uses'=>'WelcomeController@postthongtin']); 
Route::get('donhangcu',['as'=>'donhangcu','uses'=>'WelcomeController@getdonhangcu']); 
Route::get('donhangcu/{id}',['as'=>'postdonhangcu','uses'=>'WelcomeController@postdonhangcu']); 
Route::get('capnhat/{id}/{qty}',['as'=>'capnhat','uses'=>'WelcomeController@capnhat']);
Route::post('timkiem',['as'=>'timkiem','uses'=>'WelcomeController@timkiem']); 
Route::get('chitietdonhangcu/{id}',['as'=>'chitietdonhangcu','uses'=>'WelcomeController@chitietdonhangcu']); 

Route::get('motrieu',['as'=>'motrieu','uses'=>'WelcomeController@motrieu']); 
Route::get('haitrieu',['as'=>'haitrieu','uses'=>'WelcomeController@haitrieu']); 
Route::get('batrieu',['as'=>'batrieu','uses'=>'WelcomeController@batrieu']); 