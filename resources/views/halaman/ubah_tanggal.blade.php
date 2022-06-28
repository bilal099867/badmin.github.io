<div class="modal fade" id="tgl{{$dt->id_sewa}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
    role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Waktu Penyewaan
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal"
            aria-label="Close">
            <i data-feather="x"></i>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <form method="post" action="{{route('ubah_waktu',$dt->id_sewa)}}">
                @csrf
                <div class="form-group">
                    <label>Tanggal Sewa</label>
                    <input type="date" value="{{$dt->tanggal}}" class="form-control" name="tanggal">
                </div>
                <input type="hidden" value="{{$dt->lap_id}}" name="id_lapangan">
                <div class="form-group">
                    <label>Jam Mulai</label>
                    <input type="time" class="form-control" value="{{$dt->jam_mulai}}" name="jam_mulai">
                </div>
                <div class="form-group">
                    <label>Jam Selesai</label>
                    <input type="time" class="form-control" value="{{$dt->jam_selesai}}" name="jam_selesai">
                </div>
                <a href="{{route('cek_boking',$dt->id_lapangan)}}" target="_blank" class="btn btn-sm btn-primary">Cek List Penyewaan</a>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-light-secondary">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Ubah</span>
        </button>
    </div>
</form>
</div>
</div>
</div>