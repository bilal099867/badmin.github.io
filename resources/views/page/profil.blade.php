@extends('page/layout/app')

@section('title', 'Profil Lapangan')

@section('content')
<div class="page-heading">

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h2>Profil</h2>
                <button type="button" class="btn rounded-pill btn-sm btn-warning block" style="float: right;" data-bs-toggle="modal" data-bs-target="#inlineForm">
                    <i class="icon dripicons-document-edit"></i> Lengkapi
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        @foreach($profil as $cst)
                        <tr>
                            <td>NAMA PROFIL</td>
                            <td>:</td>
                            <td>{{$cst->nama_profil}}</td>
                        </tr>
                        <tr>
                            <td>JENIS APLIKASI</td>
                            <td>:</td>
                            <td>{{$cst->jenis_apk}}</td>
                        </tr>
                        <tr>
                            <td>LOKASI</td>
                            <td>:</td>
                            <td>{{$cst->lokasi}}</td>
                        </tr>
                        <tr>
                            <td>TELEPON</td>
                            <td>:</td>
                            <td>{{$cst->no_profil}}</td>
                        </tr>
                        <div class="modal fade text-left" id="inlineForm" tabindex="-1"
                        role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content" style="border-bottom:1px solid blue;">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel33">SETING PROFIL </h4>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form method="post" action="{{route('setting',$cst->id_profil)}}">
                            @csrf
                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label>NAMA PROFIL:</label>
                                        <div class="form-group">
                                            <input type="text" name="nama_profil" value="{{$cst->nama_profil}}"
                                            class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>JENIS APLIKASI: </label>
                                        <div class="form-group">
                                            <input type="text" name="jenis_apk" value="{{$cst->jenis_apk}}"
                                            class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>LOKASI: </label>
                                        <div class="form-group">
                                            <input type="text" name="lokasi" value="{{$cst->lokasi}}"
                                            class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>TELEPON: </label>
                                        <div class="form-group">
                                            <input type="text" name="no_profil" value="{{$cst->no_profil}}"
                                            class="form-control">
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
<div class="row mb-4">
    @foreach($profil as $cst)
    <div class="col-12"><iframe class="form-control" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=720&amp;height=600&amp;hl=en&amp;q={{$cst->lokasi}}+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
    </div>
    @endforeach
</div>
@endsection