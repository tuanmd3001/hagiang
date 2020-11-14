<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
App::setLocale('vi');
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->middleware('auth');

Route::resource('users', 'UserController')->middleware('auth');

Route::group(['middleware' => ['role:SuperAdmin']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
});


Route::group(['prefix' => 'danhMuc'], function () {
    Route::resource('capDonVi', 'Danh_Muc\DmCapDonViController', ["as" => 'danhMuc']);
});


Route::resource('hoiNghiHoiThao', 'HoiNghiHoiThaoController');

Route::resource('ngos', 'NgoController');

Route::resource('duAnNgos', 'DuAnNgoController');

Route::resource('duAnKhacs', 'DuAnKhacController');

Route::resource('xuatNhapKhaus', 'XuatNhapKhauController');

Route::resource('nguonOdas', 'NguonOdaController');

Route::resource('duAnOdas', 'DuAnOdaController');

Route::resource('nguonFdis', 'NguonFdiController');

Route::resource('duAnFdis', 'DuAnFdiController');

Route::resource('dnNuocNgoais', 'DnNuocNgoaiController');

Route::resource('dnVonNuocNgoais', 'DnVonNuocNgoaiController');

Route::resource('lanhSuTinhs', 'LanhSuTinhController');

Route::resource('lanhSuNuocNgoais', 'LanhSuNuocNgoaiController');

Route::resource('bhNgNuocNgoais', 'BhNgNuocNgoaiController');

Route::resource('bhNgHaGiangs', 'BhNgHaGiangController');

Route::resource('ngHgNuocNgoais', 'NgHgNuocNgoaiController');

Route::resource('ngHgVeNuocs', 'NgHgVeNuocController');

Route::resource('canBos', 'CanBoController');

Route::resource('hcNgoaiGiaos', 'HcNgoaiGiaoController');

Route::resource('hcCongVus', 'HcCongVuController');

Route::resource('abtcs', 'AbtcController');

Route::resource('xncHcNgoaiGiaos', 'XncHcNgoaiGiaoController');

Route::resource('xncHcCongVus', 'XncHcCongVuController');

Route::resource('chuKies', 'ChuKyController');