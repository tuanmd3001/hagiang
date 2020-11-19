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

App::setLocale('vi');
//Auth::routes(['verify' => true]);

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['role:SuperAdmin']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');

    Route::get('/firstRun', 'PermissionController@firstRun');
    Route::get('users/{user}/reset_password', 'UserController@reset_password')->name('reset_user_password');
});


Route::group(['middleware' => ['auth']], function (){
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('users', 'UserController')->middleware('can:users');

    Route::resource('hoiNghiHoiThao', 'HoiNghiHoiThaoController')->middleware('can:hoiNghiHoiThao');

    Route::resource('ngos', 'NgoController')->middleware('can:ngos');

    Route::resource('duAnNgos', 'DuAnNgoController')->middleware('can:duAnNgos');

    Route::resource('duAnKhacs', 'DuAnKhacController')->middleware('can:duAnKhacs');

    Route::resource('xuatNhapKhaus', 'XuatNhapKhauController')->middleware('can:xuatNhapKhaus');

    Route::resource('nguonOdas', 'NguonOdaController')->middleware('can:nguonOdas');

    Route::resource('duAnOdas', 'DuAnOdaController')->middleware('can:duAnOdas');

    Route::resource('nguonFdis', 'NguonFdiController')->middleware('can:nguonFdis');

    Route::resource('duAnFdis', 'DuAnFdiController')->middleware('can:duAnFdis');

    Route::resource('dnNuocNgoais', 'DnNuocNgoaiController')->middleware('can:dnNuocNgoais');

    Route::resource('dnVonNuocNgoais', 'DnVonNuocNgoaiController')->middleware('can:dnVonNuocNgoais');

    Route::resource('lanhSuTinhs', 'LanhSuTinhController')->middleware('can:lanhSuTinhs');

    Route::resource('lanhSuNuocNgoais', 'LanhSuNuocNgoaiController')->middleware('can:lanhSuNuocNgoais');

    Route::resource('bhNgNuocNgoais', 'BhNgNuocNgoaiController')->middleware('can:bhNgNuocNgoais');

    Route::resource('bhNgHaGiangs', 'BhNgHaGiangController')->middleware('can:bhNgHaGiangs');

    Route::resource('ngHgNuocNgoais', 'NgHgNuocNgoaiController')->middleware('can:ngHgNuocNgoais');

    Route::resource('ngHgVeNuocs', 'NgHgVeNuocController')->middleware('can:ngHgVeNuocs');

    Route::resource('canBos', 'CanBoController')->middleware('can:canBos');

    Route::resource('hcNgoaiGiaos', 'HcNgoaiGiaoController')->middleware('can:hcNgoaiGiaos');

    Route::resource('hcCongVus', 'HcCongVuController')->middleware('can:hcCongVus');

    Route::resource('abtcs', 'AbtcController')->middleware('can:abtcs');

    Route::resource('xncHcNgoaiGiaos', 'XncHcNgoaiGiaoController')->middleware('can:xncHcNgoaiGiaos');

    Route::resource('xncHcCongVus', 'XncHcCongVuController')->middleware('can:xncHcCongVus');

    Route::resource('chuKies', 'ChuKyController')->middleware('can:chuKies');

    Route::resource('canBoNgoaiGiaoTinhs', 'CanBoNgoaiGiaoTinhController')->middleware('can:canBoNgoaiGiaoTinhs');

    Route::resource('canBoNgoaiGiaoHuyens', 'CanBoNgoaiGiaoHuyenController')->middleware('can:canBoNgoaiGiaoHuyens');

    Route::resource('duqts', 'DuqtController')->middleware('can:duqts');

    Route::resource('ttqt_tinh', 'TtqtController')->middleware('can:ttqt_tinh');
    Route::resource('ttqt_so_nganh', 'TtqtController')->middleware('can:ttqt_so_nganh');
    Route::resource('ttqt_huyen_tp', 'TtqtController')->middleware('can:ttqt_huyen_tp');

    Route::group(['prefix' => 'danhMuc', 'middleware' => ['can:danhMuc']], function () {
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


    Route::resource('doanRaCapTinh', 'DoanRaController')->middleware('can:doanRaCapTinh');
    Route::resource('doanRaCapHuyen', 'DoanRaController')->middleware('can:doanRaCapHuyen');
    Route::resource('doanRaCapXa', 'DoanRaController')->middleware('can:doanRaCapXa');
    Route::resource('doanVaoCapTinh', 'DoanVaoController')->middleware('can:doanVaoCapTinh');
    Route::resource('doanVaoCapHuyen', 'DoanVaoController')->middleware('can:doanVaoCapHuyen');
    Route::resource('doanVaoCapXa', 'DoanVaoController')->middleware('can:doanVaoCapXa');



    Route::resource('suVuBienGiois', 'SuVuBienGioiController')->middleware('can:suVuBienGiois');

    Route::resource('suVuBienGiois', 'SuVuBienGioiController')->middleware('can:suVuBienGiois');

    Route::resource('kyKetHuuNghis', 'KyKetHuuNghiController')->middleware('can:kyKetHuuNghis');

});
