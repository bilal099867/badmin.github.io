@extends('page/layout/app')

@section('title', 'Dashboard')

@section('content')
<div class="page-heading">
                <h3>Dashboard Admin</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Data User</h6>
                                                <h6 class="font-extrabold mb-0">{{$user}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Kode Payment</h6>
                                                <h6 class="font-extrabold mb-0">{{$kode}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Data Lapangan</h6>
                                                <h6 class="font-extrabold mb-0">{{$lapangan}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Laporan</h6>
                                                <!-- <h6 class="font-extrabold mb-0">112</h6> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Form Penyewaan</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Detail</th>
                                                        <th>Status Penyewaan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $dt)
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    @if($dt->jenis_kelamin=="Laki-Laki")
                                                                    <img src="{{asset('template/dist/assets/images/faces/2.jpg')}}">
                                                                    @endif
                                                                    @if($dt->jenis_kelamin=="Perempuan")
                                                                    <img src="{{asset('template/dist/assets/images/faces/5.jpg')}}">
                                                                    @endif
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0">{{$dt->name}}</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">{{$dt->nama_lap}} - {{$dt->nama_jenis}}</p>
                                                            <p class=" mb-0">Tanggal : {{$dt->tanggal}}</p>
                                                            <p class=" mb-0">Jam Penyewaan : {{$dt->jam_mulai}} - {{$dt->jam_selesai}}</p>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0">Keterangan : {{$dt->keterangan}}</p>
                                                            <p class=" mb-0">Konfirmasi : {{$dt->konfirmasi}}</p>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="{{asset('template/dist/assets/images/faces/2.jpg')}}" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">{{Auth::user()->name}}</h5>
                                        <h6 class="text-muted mb-0">{{Auth::user()->level}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Penyewa</h4>
                            </div>
                            <div class="card-content pb-4">
                                @foreach($alluser as $us)
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        @if($us->jenis_kelamin=="Laki-Laki")
                                        <img src="{{asset('template/dist/assets/images/faces/1.jpg')}}">
                                        @endif
                                        @if($us->jenis_kelamin=="Perempuan")
                                        <img src="{{asset('template/dist/assets/images/faces/5.jpg')}}">
                                        @endif
                                        @if($us->jenis_kelamin==NULL)
                                        <img src="{{asset('template/dist/assets/images/faces/8.jpg')}}">
                                        @endif
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">{{$us->name}}</h5>
                                        <h6 class="text-muted mb-0">{{$us->username}}</h6>
                                    </div>
                                </div>
                                @endforeach
                                <div class="px-4">
                                    <a href="{{route('user')}}" class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>All Data User</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
@endsection