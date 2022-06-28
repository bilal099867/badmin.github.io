@extends('page/layout/app')

@section('title', 'Data Sewa')

@section('content')
<div class="page-heading">

    <section class="section">
        <div class="card">
            <div class="card-header">
                With Data Sewa Lapangan
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
                            <th>Bukti Transfer</th>
                            <!-- <th>Status Sewa</th> -->
                            <th>Total</th>
                            <th>Action</th>
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
                        $nominal=$dt->harga*$jam;
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
                            <td>
                                @if($dt->bukti_tf=="-")
                                <span class="badge bg-danger">Belum Upload <br>Bukti Transfer</span>
                                @endif
                                @if($dt->bukti_tf!=="-")
                                <img src="{{asset('upload')}}/{{$dt->bukti_tf}}" width="80">
                                @endif
                            </td>
                        <!-- <td>
                            @if($dt->tempo==date('Y-m-d') AND date('H:i:s')>=$dt->jam_selesai AND $dt->bukti_tf=="-")
                            <span class="badge bg-danger">Di Batalkan <br>Data akan di Hapus</span>
                            @endif
                            @if($dt->tempo==date('Y-m-d') AND date('H:i:s')>=$dt->jam_selesai AND $dt->bukti_tf!=="-")
                            <span class="badge bg-primary">{{$dt->keterangan}}</span>
                            @endif

                            @if($dt->tempo!==date('Y-m-d') AND date('H:i:s')>=$dt->jam_selesai AND $dt->bukti_tf=="-")
                            <span class="badge bg-primary">Berlangsung</span>
                            @endif
                        </td> -->
                        <td>
                            Rp {{number_format($dt->harga*$jam,0,",",".")}}
                        </td>
                        <td align="center">
                            <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_sewa}}" class="btn btn-sm btn-primary">
                                <i class="dripicons dripicons-disc"></i>
                            </button>
                            <a href="{{route('cek_data',$dt->id_sewa)}}" class="btn btn-sm btn-success">
                                <i class="dripicons dripicons-document-edit"></i>
                            </a>
                            <a href="{{route('delete_sewa',$dt->id_sewa)}}" onclick="return confirm('Hapus Data?')" class="btn btn-sm btn-danger">
                                <i class="dripicons dripicons-trash"></i>
                            </a>
                            @if($dt->keterangan=="Aktif")
                            <button data-bs-toggle="modal" data-bs-target="#bayar{{$dt->id_sewa}}" class="btn btn-sm btn-warning">
                                <i class="dripicons dripicons-direction"></i>
                            </button>
                            @endif
                        </td>
                    </tr>
                    <?php $no++ ?>
                    <div class="modal fade" id="edit{{$dt->id_sewa}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Data
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-3">Nama </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{Auth::user()->name}} </div>
                                <div class="col-3">Nama Lapangan </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$dt->nama_lap}} </div>
                                <div class="col-3">Jenis Lapangan </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$dt->nama_jenis}} </div>
                                <div class="col-3">Harga </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> Rp {{number_format($dt->harga,0,",",".")}} </div>
                                <div class="col-3">Tanggal </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$dt->tanggal}} </div>
                                <div class="col-3">Jam </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$dt->jam_mulai}} - {{$dt->jam_selesai}} </div>
                                <div class="col-3">Lama Sewa </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$jam}} Jam </div>
                                <div class="col-3">Konfirmasi </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> 
                                    @if($dt->konfirmasi=="Belum di Konfirmasi")
                                    <span class="badge bg-warning">{{$dt->konfirmasi}}</span>
                                    @endif
                                    @if($dt->konfirmasi!=="Belum di Konfirmasi")
                                    <span class="badge bg-primary">{{$dt->konfirmasi}}</span>
                                    @endif
                                </div>
                                <div class="col-3">Keterangan </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> 
                                    @if($dt->bukti_tf=="-")
                                    <span class="badge bg-danger">Segera Upload Bukti Transfer ke Rekening</span>
                                    @endif
                                    @if($dt->keterangan!=="-")
                                    @if($dt->bukti_tf!=="-")
                                    <span class="badge bg-primary">
                                        {{$dt->keterangan}}
                                    </span>
                                    @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        $pembayaran=DB::table('pembayaran')->where('sewa_id',$dt->id_sewa)->get();
        ?>
        <div class="modal fade" id="bayar{{$dt->id_sewa}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Entry Data Pembayaran
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form method="post" action="{{route('entry')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" value="{{$dt->id_sewa}}" name="sewa_id">
                        <label>Nominal Pembayaran</label>
                        <input type="number" class="form-control" value="{{$nominal}}" name="nominal" readonly="">
                    </div>
                    <div class="form-group">
                        <label>Status Pembayaran</label>
                        <select class="form-control" name="status_pembayaran">
                            <option value="Lunas">Lunas</option>
                            <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                    </div>
                    @foreach($pembayaran as $pb)
                    <div class="form-group">
                        <label>
                            Note : 
                            <span class="badge bg-success">Data Pembayaran telah sudah di Entry.</span> 
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endforeach
</tbody>
</table>
</div>
</div>

</section>
</div>
@endsection