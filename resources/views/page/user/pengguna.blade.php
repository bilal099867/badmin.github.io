@extends('page/layout/app')

@section('title', 'Data Pengguna')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>DataTable Pengguna</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                With Data Pengguna
            <!--     <button style="float: right;" type="button" class="btn btn-sm btn-outline-primary block"
                data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                Tambah Data
            </button> -->
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($data as $dt)
                    <tr>
                        <td>{{$no}}. </td>
                        <td>{{$dt->name}}</td>
                        <td>{{$dt->username}}</td>
                        <td>{{$dt->level}}</td>
                        <td>{{$dt->status_user}}</td>
                        <td align="center">
                            <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id}}" class="btn btn-sm btn-primary">
                                <i class="dripicons dripicons-document-edit"></i>
                            </button>
                            @if($dt->status_user=="Aktif")
                            <a href="{{route('status_user',$dt->id)}}" class="btn btn-sm btn-danger"><i class="dripicons dripicons-lock"></i></a>
                            @endif
                            @if($dt->status_user!=="Aktif")
                            <a href="{{route('status_user',$dt->id)}}" class="btn btn-sm btn-success"><i class="dripicons dripicons-lock-open"></i></a>
                            @endif
                        </td>
                    </tr>
                    <?php $no++ ?>
                    <div class="modal fade" id="edit{{$dt->id}}" tabindex="-1" role="dialog"
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
                        <form action="{{route('edit_pengguna',$dt->id)}}" method="post">
                            @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="{{$dt->name}}" name="name" id="">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="{{$dt->username}}" name="username" id="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="password" id="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button class="btn btn-primary">
                            <i class="bx bx-x d-block d-sm-none"></i>
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