<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Image;

class HomeController extends Controller
{
  public function login()
  {
   return view('login');
 }
 public function ceklogin(Request $request)
 {
   if (Auth::attempt(['username'=>$request->username,'password'=>$request->password])) {
    if (Auth::user()->status_user!=="Aktif") {
     Auth::logout();
     return redirect('login')->with('non-aktif','-');
   }else{
    if (Auth::user()->level=="Admin") {
      return redirect('page/home');
    }else{
      return redirect('/');                    
    }
  }
}else{
  return redirect()->back()->with('salah','-');
}
}
public function register()
{
 return view('register');
}
public function addreg(Request $request)
{
 $cek=DB::table('users')->where('username', $request->username)->first();
 if ($cek) {
  return redirect()->back()->with('sama','-');
}else{
  $users = new User();
  $users -> name = $request -> name;
  $users -> username = $request -> username;
  $users -> password = Hash::make($request -> password);
  $users -> level = 'Penyewa';
  $users -> status_user = 'Aktif';
  $users -> save();
  DB::table('datauser')->insert([
    'user_id'=>$users->id,
  ]);
  Auth::attempt(['username'=>$request->username,'password'=>$request->password]);
  return redirect('/');
}
}
public function home()
{
  $user=DB::table('users')->where('level','Penyewa')->count();
  $alluser=DB::table('users')->join('datauser','datauser.user_id','=','users.id')->where('level','Penyewa')->get();
  $kode=DB::table('payment')->count();
  $lapangan=DB::table('nama_lapangan')->count();
  $data=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->join('data_sewa','data_sewa.lap_id','=','nama_lapangan.id_lapangan')->join('users','users.id','=','data_sewa.id_user')->join('datauser','datauser.user_id','=','users.id')->limit('3')->get();
  return view('page/home/index',['user'=>$user,'kode'=>$kode,'lapangan'=>$lapangan,'alluser'=>$alluser,'data'=>$data]);
}
public function logout()
{
  Auth::logout();
  return redirect('/');
}
}
