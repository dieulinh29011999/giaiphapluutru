<?php

use App\Http\Controllers\benhnhanController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\permissionController;
use App\Permission;
use Illuminate\Support\Facades\Route;

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




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('chart-line-ajax', 'HomeController@chartLineAjax');

Route::group(['middleware' => ['auth']], function() {
    // Route::get('/','HomeController@index')->name('home');
    Route::resource('roles','RoleController');
    Route::resource('users','usercontroller');
    Route::resource('permissions','permissionController');


    Route::resource('chinhanh','chinhanhController');
    Route::resource('chucvu','chucvuController');
    Route::resource('vitri','vitriController');
    Route::resource('phongban','phongbanController');
    Route::resource('nhanvien','nhanvienController');
    Route::resource('loaihoso','loaihosoController');
    Route::resource('loaiphong','loaiphongController');
    Route::resource('hoso','hosoController');
    Route::get('/','hosoController@search')->name('homepage');
    Route::get('tim-kiem-ho-so','phongbanController@search')->name('timkiem');


    // Route::resource('benhvien','benhvienController');
    // Route::resource('chuyenkhoa','chuyenkhoaController');
    // Route::resource('bacsi','bacsiController');
    // Route::resource('khunggio','khunggioController');
    // Route::resource('benhnhan','benhnhanController');
    // Route::get('benhnhan-tim-kiem','benhnhanController@search')->name('benhnhan.search');
    // Route::post('showchuyenkhoa', 'bacsiController@showChuyenKhoainBenhVien')->name('show-chuyenkhoa');
    // Route::post('showchuyenkhoainbv', 'benhnhanController@showChuyenKhoainBenhNhan')->name('show-chuyenkhoainBenhnhan');
    // Route::post('showbacsi', 'benhnhanController@showBacSiinBenhNhan')->name('show-bacsi');
    // Route::post('showkhunggio', 'benhnhanController@showKhungGioinBenhNhan')->name('show-khunggio');
    // // Route::post('showbacsick', 'benhnhanController@showBacSiChuyenKhoainBenhNhan')->name('show-bsck');
    // Route::get('export', 'MyController@export')->name('export');
    // Route::get('importExportView', 'MyController@importExportView');
    // Route::post('import', 'MyController@import')->name('import');
    // Route::get('export-benhnhan','MyController@exportBN')->name('exportBN');
    // Route::get('export-bacsi','MyController@exportbs')->name('exportbs');
    // Route::post('importBS', 'MyController@importBS')->name('importBS');
    // Route::get('exportbenhnhan', 'benhnhanController@exportbenhnhan')->name('exportbenhnhan');
    // Route::get('benhnhanchuyengiaocr','benhnhanController@BenhNhanDaChuyenGiaoCR')->name('bncgcr');
    // Route::get('benhnhanchuyengiaotd','benhnhanController@BenhNhanDaChuyenGiaoTD')->name('bncgtd');
    // Route::get('benhnhanchuyengiao','benhnhanController@BenhNhanDaChuyenGiao')->name('bncg');



    
    // Route::post('password.request', 'ForgotPasswordController');

    
});
route::get('profile','HomeController@profile')->name('profile');
route::post('profile-update','HomeController@profileUpdate')->name('profile-update');

Route::post('reset-password', 'ResetPasswordController@sendMail');
Route::put('reset-password/{token}', 'ResetPasswordController@reset');
// route::get('register',function(){
//     return view('auth.register');
// });

            // route::get('users/{id}',function($id)
            // {
            //     return 'users'.$id;
            // });