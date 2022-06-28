@extends('page/layout/app')

@section('title', 'Data Sewa')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="alert alert-light-danger color-danger"><i
            class="bi bi-exclamation-circle"></i> Jika Pembayaran Melebihi Waktu Sewa atau Jatuh Tempo, Penyewaan akan di Batalkan.</div>
        </div>
    </div>
    <div class="page-heading">

        <section class="section">
            <div class="card">
                <div class="card-header">
                    With Data Sewa Lapangan <b>{{Auth::user()->name}}</b>
                    <button style="float: right;" type="button" class="btn btn-sm btn-outline-success block"
                    data-bs-toggle="modal" data-bs-target="#kode">
                    Kode Pembayaran
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama Lapangan</th>
                            <th>Harga</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Lama Sewa</th>
                            <th>Tanggal Sewa</th>
                            <th>Jatuh Tempo</th>
                            <th>Bukti Transfer</th>
                            <th>Total</th>
                            <th>Action Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($data as $dt)
                        <?php date_default_timezone_set('Asia/Jakarta');
                        $mulai=strtotime($dt->jam_mulai);
                        $selesai=strtotime($dt->jam_selesai);

                        $dif=$selesai-$mulai;

                        $jam=floor($dif/(60*60));
                        $menit=$dif-$jam*(60*60);
                        $menit2=floor($menit/60);
                        if ($menit2>=30) {
                            $jam+=1;
                        }
                        ?>
                        <tr>
                            <td>{{$no}}. </td>
                            <td>{{$dt->nama_lap}}</td>
                            <td>Rp {{number_format($dt->harga,0,",",".")}}</td>
                            <td>{{$dt->jam_mulai}}</td>
                            <td>{{$dt->jam_selesai}}</td>
                            <td>
                                {{$jam}} Jam
                            </td>
                            <td>{{$dt->tanggal}}</td>
                            <td>{{$dt->tempo}}</td>
                            <td>
                                @if($dt->bukti_tf=="-")
                                <span class="badge bg-danger">Segera Upload <br>Bukti Transfer</span>
                                @endif
                                @if($dt->bukti_tf!=="-")
                                <img src="{{asset('upload')}}/{{$dt->bukti_tf}}" width="80">
                                @endif
                            </td>
                            <td>
                                Rp {{number_format($dt->harga*$jam,0,",",".")}}
                            </td>
                            <td align="center">
                                <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_sewa}}" class="btn btn-sm btn-primary">
                                    <i class="dripicons dripicons-disc"></i>
                                </button>
                                @if($dt->konfirmasi=="Belum di Konfirmasi")
                                <a href="{{route('delete_sewa',$dt->id_sewa)}}" onclick="return confirm('Lanjut untuk Hapus?')" class="btn btn-sm btn-danger">
                                    <i class="dripicons dripicons-trash"></i>
                                </a>
                                @endif
                                <button data-bs-toggle="modal" data-bs-target="#upload{{$dt->id_sewa}}" class="btn btn-sm btn-success">
                                    <i class="dripicons dripicons-browser-upload"></i>
                                </button>
                                @if($dt->keterangan!=="Selesai")
                                <button type="button" class="btn btn-sm btn-success"
                                data-bs-toggle="modal" data-bs-target="#tgl{{$dt->id_sewa}}">
                                <i class="dripicons dripicons-clock"></i>
                            </button>
                            @endif
                        </td>
                    </tr>
                    <?php $no++ ?>
                    @include('halaman/ubah_tanggal')
                    @include('halaman/detailsewa')
                    @include('halaman/uploadbayar')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
</div>
@include('halaman/norek')
@endsection