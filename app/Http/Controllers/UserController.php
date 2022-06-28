<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function index()
	{
		$lapangan=DB::table('nama_lapangan')->join('jenis_lapangan','jenis_lapangan.id_jenis','=','nama_lapangan.jenis_id')->get();
		return view('halaman/index',['lapangan'=>$lapangan]);
	}
	public function visit($id_lapangan)
	{
		$data=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->join('image_lapangan','image_lapangan.lapangan_id','=','nama_lapangan.id_lapangan')->where('image_lapangan.lapangan_id',$id_lapangan)->get();
		$id=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->where('nama_lapangan.id_lapangan',$id_lapangan)->get();
		return view('halaman/visit',['data'=>$data,'id'=>$id]);
	}
	public function boking($id_lapangan)
	{
		$data=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->where('nama_lapangan.id_lapangan',$id_lapangan)->get();
		$lengkap=DB::table('datauser')->where('user_id',Auth::user()->id)->get();
		$list=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->join('data_sewa','data_sewa.lap_id','=','nama_lapangan.id_lapangan')->where('data_sewa.lap_id',$id_lapangan)->where('Keterangan','Aktif')->get();
		return view('halaman/boking',['data'=>$data,'lengkap'=>$lengkap,'list'=>$list]);
	}
	public function add_sewa(Request $request)
	{
		$cek=DB::table('data_sewa')->where('lap_id',$request->lap_id)->where('tanggal',$request->tanggal)->where('keterangan','!=','Selesai')->first();
		$jatuhtempo=date('Y-m-d',strtotime("+1 day",strtotime(date($request->tanggal))));
		if ($cek) {
			if ($request->jam_mulai>=$cek->jam_mulai AND $request->jam_selesai<=$cek->jam_selesai) {
				return redirect()->back()->with('digunakan','-');
			}
			DB::table('data_sewa')->insert([
				'id_user'=>$request->id_user,
				'lap_id'=>$request->lap_id,
				'tanggal'=>$request->tanggal,
				'tempo'=>$jatuhtempo,
				'jam_mulai'=>$request->jam_mulai,
				'jam_selesai'=>$request->jam_selesai,
				'keterangan'=>'-',
				'konfirmasi'=>'Belum di Konfirmasi',
				'bukti_tf'=>'-',
			]);
			return redirect('user/data_sewa')->with('addboking','-');
		}else{
			DB::table('data_sewa')->insert([
				'id_user'=>$request->id_user,
				'lap_id'=>$request->lap_id,
				'tanggal'=>$request->tanggal,
				'tempo'=>$jatuhtempo,
				'jam_mulai'=>$request->jam_mulai,
				'jam_selesai'=>$request->jam_selesai,
				'keterangan'=>'-',
				'konfirmasi'=>'Belum di Konfirmasi',
				'bukti_tf'=>'-',
			]);
			return redirect('user/data_sewa')->with('addboking','-');
		}
	}
	public function data_sewa()
	{
		$data=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->join('data_sewa','data_sewa.lap_id','=','nama_lapangan.id_lapangan')->where('data_sewa.id_user',Auth::user()->id)->get();
		$kode=DB::table('payment')->get();
		return view('halaman/sewa',['data'=>$data,'kode'=>$kode]);
	}
	public function delete_sewa($id_sewa)
	{
		DB::table('data_sewa')->where('id_sewa',$id_sewa)->delete();
		return redirect()->back()->with('sewadel','-');
	}
	public function cek_boking($id_lapangan)
	{
		$data=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->join('data_sewa','data_sewa.lap_id','=','nama_lapangan.id_lapangan')->where('data_sewa.lap_id',$id_lapangan)->where('Keterangan','Aktif')->get();
		return view('halaman/cek',['data'=>$data]);
	}
	public function profil()
	{
		$data=DB::table('users')->join('datauser','users.id','=','datauser.user_id')->where('users.id',Auth::user()->id)->get();
		return view('halaman/profil',['data'=>$data]);
	}
	public function lengkapi(Request $request)
	{
		if ($request->password=="") {
			DB::table('users')->where('id',Auth::user()->id)->update([
				'name'=>$request->name,
				'username'=>$request->username,
			]);
			DB::table('datauser')->where('user_id',Auth::user()->id)->update([
				'email'=>$request->email,
				'no_telp'=>$request->no_telp,
				'jenis_kelamin'=>$request->jenis_kelamin,
				'ktp'=>$request->ktp,
				'alamat_penyewa'=>$request->alamat_penyewa,
			]);
			return redirect()->back()->with('lengkapi','-');
		}else{
			DB::table('users')->where('id',Auth::user()->id)->update([
				'name'=>$request->name,
				'username'=>$request->username,
				'password'=>hash::make($request->password),
			]);
			DB::table('datauser')->where('user_id',Auth::user()->id)->update([
				'email'=>$request->email,
				'no_telp'=>$request->no_telp,
				'jenis_kelamin'=>$request->jenis_kelamin,
				'ktp'=>$request->ktp,
				'alamat_penyewa'=>$request->alamat_penyewa,
			]);
			return redirect()->back()->with('lengkapi','-');
		}
	}
	public function upload_bukti(Request $request)
	{
		if ($request->hasFile('gambar')) {
			$ambil=$request->file('gambar');
			$name=$ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path()."/public/upload", $namaFileBaru);
			$save=DB::table('data_sewa')->where('id_sewa',$request->id_sewa)->update([
				'bukti_tf'=>$namaFileBaru,		
				'keterangan'=>'Sedang di Cek',		
			]);
			return redirect()->back()->with('bukti_tf','-');
		}
	}
	public function ubah_waktu(Request $request,$id_sewa)
	{
		$cek=DB::table('data_sewa')->where('lap_id',$request->id_lapangan)->where('tanggal',$request->tanggal)->where('keterangan','!=','Selesai')->first();
		if ($cek) {
			if ($request->jam_mulai>=$cek->jam_mulai AND $request->jam_selesai<=$cek->jam_selesai) {
				return redirect()->back()->with('digunakan','-');
			}DB::table('data_sewa')->where('id_sewa',$id_sewa)->update([
				'tanggal'=>$request->tanggal,
				'jam_mulai'=>$request->jam_mulai,
				'jam_selesai'=>$request->jam_selesai,
			]);
			return redirect()->back()->with('oketgl','-');
		}else{
			DB::table('data_sewa')->where('id_sewa',$id_sewa)->update([
				'tanggal'=>$request->tanggal,
				'jam_mulai'=>$request->jam_mulai,
				'jam_selesai'=>$request->jam_selesai,
			]);
			return redirect()->back()->with('oketgl','-');
		}
	}
}
