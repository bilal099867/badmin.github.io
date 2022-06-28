<div class="modal fade" id="upload{{$dt->id_sewa}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Pembayaran
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
            aria-label="Close">
            <i data-feather="x"></i>
        </button>
    </div>
    <form method="POST" action="{{route('upload_bukti')}}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="form-group">
                    <label>Upload Bukti Pembayaran</label>
                    <input type="hidden" value="{{$dt->id_sewa}}" name="id_sewa">
                    <input type="file" class="form-control" name="gambar">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light-secondary"
            data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Close</span>
            <button class="btn btn-primary">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Upload</span>
            </button>
        </div>
    </form>
</div>
</div>
</div>