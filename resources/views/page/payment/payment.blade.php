@extends('page/layout/app')

@section('title', 'Data Kode Pembayaran')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>DataTable Payment</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                With Data Kode Pembayaran
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
                        <th>No Rekening</th>
                        <th>Nama Rekening</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($data as $dt)
                    <tr>
                        <td>{{$no}}. </td>
                        <td>{{$dt->no_rek}}</td>
                        <td>{{$dt->nama_rek}}</td>
                        <td align="center">
                            <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_payment}}" class="btn btn-sm btn-success">Edit</button>
                            <a href="{{route('delete_payment',$dt->id_payment)}}" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $no++ ?>
                    <div class="modal fade" id="edit{{$dt->id_payment}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                    role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Update Data
                            </h5>
                            <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form method="post" action="{{route('update_payment')}}">
                        @csrf
                        <div class="modal-body">
                            <div class="form=group">
                                <input type="hidden" value="{{$dt->id_payment}}" name="id_payment">
                                <label>No Rekening</label>
                                <input type="text" class="form-control" value="{{$dt->no_rek}}" name="no_rek">
                            </div>
                            <div class="form=group">
                                <label>Nama Rekening</label>
                                <input type="text" class="form-control" value="{{$dt->nama_rek}}" name="nama_rek">
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
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Menambah Data
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal"
        aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<form method="post" action="{{route('add_payment')}}">
    @csrf
    <div class="modal-body">
        <div class="form=group">
            <label>No Rekening</label>
            <input type="text" required="" class="form-control" name="no_rek">
        </div>
        <div class="form=group">
            <label>Nama Rekening</label>
            <input type="text" required="" class="form-control" name="nama_rek">
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