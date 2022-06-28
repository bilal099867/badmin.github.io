     @extends('page/layout/app')
     @section('title','Profil')
     @section('content')
     <div class="page-heading">

        <section class="section">
            <div class="card">
                <div class="card-header">
                    BIODATA {{Auth::user()->name}} <br>
                    <!-- <b>Note :</b> <span class="text text-danger">Email anda untuk Notifikasi Konfirmasi Penyewaan.</span> -->
                        <button type="button" class="btn rounded-pill btn-sm btn-warning block" style="float: right;" data-bs-toggle="modal" data-bs-target="#inlineForm{{Auth::user()->id}}">
                            <i class="icon dripicons-document-edit"></i> Lengkapi
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                @foreach($data as $cst)
                                <tr>
                                    <td>NO KTP</td>
                                    <td>:</td>
                                    <td>{{$cst->ktp}}</td>
                                </tr>
                                <tr>
                                    <td>NAMA</td>
                                    <td>:</td>
                                    <td>{{$cst->name}}</td>
                                </tr>
                                <tr>
                                    <td>USERNAME</td>
                                    <td>:</td>
                                    <td>{{$cst->username}}</td>
                                </tr>
                                <tr>
                                    <td>EMAIL</td>
                                    <td>:</td>
                                    <td>{{$cst->email}}</td>
                                </tr>
                                <tr>
                                    <td>JENIS KELAMIN</td>
                                    <td>:</td>
                                    <td>{{$cst->jenis_kelamin}}</td>
                                </tr>
                                <tr>
                                    <td>NO TELP/WA</td>
                                    <td>:</td>
                                    <td>
                                        @if(substr($cst->no_telp,0,1)=='0')
                                        <a href="https://wa.me/62{{substr($cst->no_telp,1)}}" target="_blank">
                                            62 {{substr($cst->no_telp,1)}}
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>ALAMAT</td>
                                    <td>:</td>
                                    <td>{{$cst->alamat_penyewa}}</td>
                                </tr>
                                <div class="modal fade text-left" id="inlineForm{{Auth::user()->id}}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content" style="border-bottom:1px solid blue;">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">LENGKAPI BIODATA </h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form method="post" action="{{route('lengkapi')}}">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label>No KTP: </label>
                                                    <div class="form-group">
                                                        <input type="number" name="ktp" value="{{$cst->ktp}}"
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Nama: </label>
                                                    <div class="form-group">
                                                        <input type="text" name="name" value="{{$cst->name}}"
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Username: </label>
                                                    <div class="form-group">
                                                        <input type="text" name="username" value="{{$cst->username}}"
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Password:</label>
                                                    <div class="form-group">
                                                        <input type="password" name="password"
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Email: </label>
                                                    <div class="form-group">
                                                        <input type="email" name="email" value="{{$cst->email}}"
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>N0 Telp/WA: </label>
                                                    <div class="form-group">
                                                        <input type="number" name="no_telp" value="{{$cst->no_telp}}"
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>JENIS KELAMIN: </label>
                                                    <div class="form-group">
                                                        <select class="form-control" name="jenis_kelamin">
                                                            <option <?php if($cst->jenis_kelamin=="Laki-Laki"){echo "selected";}?> value="Laki-Laki" >Laki-Laki</option>
                                                            <option <?php if($cst->jenis_kelamin=="Perempuan"){echo "selected";}?> value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Alamat: </label>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="alamat_penyewa" rows="4">{{$cst->alamat_penyewa}}</textarea>
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
                                        <button type="submit" class="btn btn-primary ml-1">
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