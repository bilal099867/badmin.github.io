<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::get('clear_cache', function () {
	\Artisan::call('cache:clear');
	\Artisan::call('config:cache');
	\Artisan::call('view:clear');
	dd("Sudah Bersih nih!, Silahkan Kembali ke Halaman Utama");
});

Route::get('page/logout',[HomeController::class,'logout'])->name('logout');
Route::get('login',[HomeController::class,'login'])->name('login');
Route::post('login/cek',[HomeController::class,'ceklogin'])->name('ceklogin');
Route::get('register',[HomeController::class,'register'])->name('register');
Route::post('register/addreg',[HomeController::class,'addreg'])->name('addreg');

Route::get('/',[UserController::class,'index'])->name('index');
Route::get('lapangan/visit/{id_lapangan}',[UserController::class,'visit'])->name('visit');
Route::get('lapangan/cek_boking/{id_lapangan}',[UserController::class,'cek_boking'])->name('cek_boking');

Route::group(['middleware'=>['auth','ceklevel:Admin']],function()
{
	Route::get('page/home',[HomeController::class,'home'])->name('home');

	Route::get('page/profil',[AdminController::class,'profil_lapangan'])->name('profil_lapangan');
	Route::post('page/profil/{id_profil}',[AdminController::class,'setting'])->name('setting');

	Route::get('page/user',[AdminController::class,'user'])->name('user');
	Route::get('page/pengguna',[AdminController::class,'pengguna'])->name('pengguna');
	Route::post('page/pengguna/update/{id}',[AdminController::class,'edit_pengguna'])->name('edit_pengguna');
	Route::get('page/user/status_user/{id}',[AdminController::class,'status_user'])->name('status_user');

	Route::get('page/jenis_sarana',[AdminController::class,'jenis_lapangan'])->name('jenis_lapangan');
	Route::post('page/jenis_lapangan/add',[AdminController::class,'add_jenis'])->name('add_jenis');
	Route::post('page/jenis_lapangan/update',[AdminController::class,'update_jenis'])->name('update_jenis');
	Route::get('page/jenis_sarana/delete/{id_jenis}',[AdminController::class,'delete_jenis'])->name('delete_jenis');

	Route::get('page/lapangan',[AdminController::class,'lapangan'])->name('lapangan');
	Route::post('page/lapangan/add',[AdminController::class,'add_lapangan'])->name('add_lapangan');
	Route::post('page/lapangan/update',[AdminController::class,'update_lapangan'])->name('update_lapangan');
	Route::get('page/lapangan/delete/{id_lapangan}',[AdminController::class,'delete_lapangan']);
	Route::get('page/sarana/image/{id_lapangan}',[AdminController::class,'image_lapangan'])->name('image');
	Route::post('page/lapangan/image/store',[AdminController::class,'store'])->name('store');
	Route::delete('page/lapangan/image/delete/{id_image}',[AdminController::class,'delete_image'])->name('delete_image');

	Route::get('page/payment',[AdminController::class,'payment'])->name('payment');
	Route::post('page/payment/add',[AdminController::class,'add_payment'])->name('add_payment');
	Route::post('page/payment/update',[AdminController::class,'update_payment'])->name('update_payment');
	Route::get('page/payment/delete/{id_payment}',[AdminController::class,'delete_payment'])->name('delete_payment');

	Route::get('page/data_sewa',[AdminController::class,'sewa'])->name('sewa');
	Route::get('page/data_sewa/cek_data/{id_sewa}',[AdminController::class,'cek_data'])->name('cek_data');
	Route::get('user/data_sewa/delete/{id_sewa}',[UserController::class,'delete_sewa'])->name('delete_sewa');
	Route::post('page/data_sewa/cek_data/keterangan',[AdminController::class,'keterangan'])->name('keterangan');
	Route::get('page/data_sewa/cek_data/konfirmasi/{id_sewa}',[AdminController::class,'konfirmasi'])->name('konfirmasi');
	Route::post('page/data_sewa/pembayaran/entry',[AdminController::class,'entry'])->name('entry');

	Route::get('page/data/laporan',[AdminController::class,'laporan'])->name('laporan');
	Route::get('page/data/laporan/pdf',[AdminController::class,'export_pdf'])->name('export_pdf');
});

Route::group(['middleware'=>['auth','ceklevel:Admin,Penyewa']],function()
{
	// Route::get('/',[UserController::class,'index'])->name('index');
	// Route::get('lapangan/visit/{id_lapangan}',[UserController::class,'visit'])->name('visit');
	// Route::get('lapangan/cek_boking/{id_lapangan}',[UserController::class,'cek_boking'])->name('cek_boking');
	Route::get('lapangan/user/boking/{id_lapangan}',[UserController::class,'boking'])->name('boking');
	Route::post('lapangan/user/boking/add',[UserController::class,'add_sewa'])->name('add_sewa');

	Route::get('user/data_sewa/',[UserController::class,'data_sewa'])->name('data_sewa');
	Route::get('user/data_sewa/delete/{id_sewa}',[UserController::class,'delete_sewa'])->name('delete_sewa');
	Route::post('user/data_sewa/upload',[UserController::class,'upload_bukti'])->name('upload_bukti');
	Route::post('user/data_sewa/ubah-waktu/{id_sewa}',[UserController::class,'ubah_waktu'])->name('ubah_waktu');

	Route::get('user/profil/',[UserController::class,'profil'])->name('profil');
	Route::post('user/profil/lengkapi',[UserController::class,'lengkapi'])->name('lengkapi');
});