<div class="modal fade" id="kode" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Rekening
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal"
        aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        @foreach($kode as $kd)
        <div class="col-3">Nomer Rek </div>
        <div class="col-1">: </div>
        <div class="col-8"> {{$kd->no_rek}} - {{$kd->nama_rek}} </div>
        @endforeach
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