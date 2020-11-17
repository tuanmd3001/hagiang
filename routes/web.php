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

Route::resource('canBoNgoaiGiaoTinhs', 'CanBoNgoaiGiaoTinhController');

Route::resource('canBoNgoaiGiaoHuyens', 'CanBoNgoaiGiaoHuyenController');

Route::resource('duqts', 'DuqtController');

Route::resource('ttqts', 'TtqtController');
Route::resource('ttqt_tinh', 'TtqtController');
Route::resource('ttqt_so_nganh', 'TtqtController');
Route::resource('ttqt_huyen_tp', 'TtqtController');


Route::group(['prefix' => 'danhMuc'], function () {
    Route::resource('capDonVi', 'Danh_Muc\DmCapDonViController', ["as" => 'danhMuc']);
    Route::resource('chucVu', 'Danh_Muc\DmChucVuController', ["as" => 'danhMuc']);
    Route::resource('danhNghiaDoan', 'Danh_Muc\DmDanhNghiaDoanController', ["as" => 'danhMuc']);
    Route::resource('donVi', 'Danh_Muc\DmDonViController', ["as" => 'danhMuc']);
    Route::resource('loaiDoan', 'Danh_Muc\DmLoaiDoanController', ["as" => 'danhMuc']);
    Route::resource('loaiDuAn', 'Danh_Muc\DmLoaiDuAnController', ["as" => 'danhMuc']);
    Route::resource('loaiHangHoa', 'Danh_Muc\DmLoaiHangHoaController', ["as" => 'danhMuc']);
    Route::resource('loaiHinhToChuc', 'Danh_Muc\DmLoaiHinhToChucController', ["as" => 'danhMuc']);
    Route::resource('loaiKinhPhi', 'Danh_Muc\DmLoaiKinhPhiController', ["as" => 'danhMuc']);
    Route::resource('loaiSuKien', 'Danh_Muc\DmLoaiSuKienController', ["as" => 'danhMuc']);
    Route::resource('loaiVanBan', 'Danh_Muc\DmLoaiVanBanController', ["as" => 'danhMuc']);
    Route::resource('ngheNghiep', 'Danh_Muc\DmNgheNghiepController', ["as" => 'danhMuc']);
    Route::resource('quocGia', 'Danh_Muc\DmQuocGiaController', ["as" => 'danhMuc']);
    Route::resource('toChuc', 'Danh_Muc\DmToChucController', ["as" => 'danhMuc']);
});


//Route::resource('doanRas', 'DoanRaController');
Route::resource('doanRaCapTinh', 'DoanRaController');
Route::resource('doanRaCapHuyen', 'DoanRaController');
Route::resource('doanRaCapXa', 'DoanRaController');
