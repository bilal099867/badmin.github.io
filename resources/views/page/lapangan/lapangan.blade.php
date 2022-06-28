@extends('page/layout/app')

@section('title', 'Jenis Sarana')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>DataTable Sarana</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                With Data Sarana
                <button style="float: right;" type="button" class="btn btn-sm btn-outline-primary block"
                data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                Tambah Data
            </button>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Sarana</th>
                        <th>Jenis Sarana</th>
                        <th>Harga Sewa</th>
                        <th>Gambar</th>
                        <th>Kegiatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($data as $dt)
                    <tr>
                        <td>{{$no}}. </td>
                        <td>{{$dt->nama_lap}}</td>
                        <td>{{$dt->nama_jenis}}</td>
                        <td>Rp {{number_format($dt->harga,0,",",".")}}</td>
                        <td>
                            <a href="{{asset('gambar')}}//{{$dt->gambar}}" target="_blank">
                                <img src="{{asset('gambar')}}//{{$dt->gambar}}" width="80">
                            </a>
                        </td>
                        <td>{{$dt->kegiatan}}</td>
                        <td align="center">
                            <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_lapangan}}" class="btn btn-sm btn-success">
                                <i class="dripicons dripicons-document-edit"></i>
                            </button>
                            <a href="lapangan/delete/{{$dt->id_lapangan}}" class="btn btn-sm btn-danger">
                                <i class="dripicons dripicons-trash"></i>
                            </a>
                            <a href="{{route('image',$dt->id_lapangan)}}" class="btn btn-sm btn-primary">
                                <i class="dripicons dripicons-photo-group"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                    <div class="modal fade" id="edit{{$dt->id_lapangan}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Menambah Data Sarana
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form method="post" action="{{route('update_lapangan')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="hidden" value="{{$dt->id_lapangan}}" name="id_lapangan">
                                        <div class="form=group">
                                            <label>Nama Sarana</label>
                                            <input type="text" value="{{$dt->nama_lap}}" class="form-control" name="nama_lap">
                                        </div>  
                                    </div>
                                    <div class="col-6">
                                        <div class="form=group">
                                            <label>Jenis Sarana</label>
                                            <select class="form-control" name="jenis_id">
                                                @foreach($jenis as $js)
                                                <option value="{{$js->id_jenis}}">{{$js->nama_jenis}}</option>
                                                @endforeach
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-4">
                                        <div class="form=group">
                                            <label>Harga Sewa</label>
                                            <input type="number" value="{{$dt->harga}}" class="form-control" name="harga">
                                        </div>  
                                    </div>
                                    <div class="col-4">
                                        <div class="form=group">
                                            <label>Kegiatan</label>
                                            <input type="text" value="{{$dt->kegiatan}}" class="form-control" name="kegiatan">
                                        </div>  
                                    </div>
                                    <div class="col-4">
                                        <div class="form=group">
                                            <label>Gambar Sarana</label>
                                            <input type="file" class="form-control" name="gambar">
                                        </div>  
                                    </div>
                                    <div class="col-12">
                                        <div class="form=group">
                                            <label>Keterangan/Detail Sarana</label>
                                            <textarea class="form-control" rows="5" name="det_lapangan">{{$dt->det_lapangan}}</textarea>
                                        </div>  
                                    </div>
                                </div>
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable modal-lg"
role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Menambah Data Sarana
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal"
        aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<form method="post" action="{{route('add_lapangan')}}" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="form=group">
                    <label>Nama Sarana</label>
                    <input type="text" required="" class="form-control" name="nama_lap">
                </div>  
            </div>
            <div class="col-6">
                <div class="form=group">
                    <label>Jenis Sarana</label>
                    <select class="form-control" required="" name="jenis_id">
                        @foreach($jenis as $js)
                        <option value="{{$js->id_jenis}}">{{$js->nama_jenis}}</option>
                        @endforeach
                    </select>
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Harga Sewa</label>
                    <input type="text" required="" class="form-control" name="harga">
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Kegiatan</label>
                    <input type="text" required="" class="form-control" name="kegiatan">
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Gambar Sarana</label>
                    <input type="file" required="" class="form-control" name="gambar">
                </div>  
            </div>
            <div class="col-12">
                <div class="form=group">
                    <label>Keterangan/Detail Sarana</label>
                    <textarea class="form-control" required="" rows="5" name="det_lapangan"></textarea>
                </div>  
            </div>
        </div>
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
@endsection