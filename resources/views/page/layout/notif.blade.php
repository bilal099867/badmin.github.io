@if(session('jenisadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data",
	});
</script>
@endif
@if(session('jenisup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Jenis Berhasil di Ubah.",
	});
</script>
@endif
@if(session('jenisdel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Jenis Berhasil di Hapus.",
	});
</script>
@endif
@if(session('setting'))
<script type="text/javascript">
    document.getElementById('success');
    Swal.fire({
        icon: "success",
        title: "Berhasil Setting Profil"
    });
</script>
@endif
@if(session('lapanganadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Lapangan",
	});
</script>
@endif
@if(session('lapanganup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Lapangan Berhasil di Ubah.",
	});
</script>
@endif
@if(session('lapangandel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Lapangan Berhasil di Hapus.",
	});
</script>
@endif

@if(session('paymentadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Payment",
	});
</script>
@endif
@if(session('paymentup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Payment Berhasil di Ubah.",
	});
</script>
@endif
@if(session('paymentdel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Payment Berhasil di Hapus.",
	});
</script>
@endif

@if(session('statusup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Ubah Status",
		text: "Data Status User Berhasil di Ubah.",
	});
</script>
@endif

@if(session('digunakan'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Dalam Bokingan",
		text: "Tanggal dan Jam tersebut masih dalam Boking Orang."
	});
</script>
@endif

@if(session('addboking'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Boking",
		text: "Berhasil memesan Lapangan."
	});
</script>
@endif
@if(session('sewadel'))
<script type="text/javascript">
	document.getElementById('error');
	Swal.fire({
		icon: "error",
		title: "Berhasil Hapus Data",
		text: "Data Sewa Berhasil di Hapus.",
	});
</script>
@endif

@if(session('lengkapi'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Lengkapi Data",
		text: "Data Profil Berhasil di Lengkapi.",
	});
</script>
@endif

@if(session('keterangan'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Ubah Keterangan",
	});
</script>
@endif

@if(session('bukti_tf'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Upload Pembayaran",
		text: "Tunggu Konfirmasi dari Admin.",
	});
</script>
@endif

@if(session('konfirmasi'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Confirm",
		text: "Penyewaan di Konfirmasi",
	});
</script>
@endif

@if(session('pembayaran'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Entry Pembayaran",
		text: "Data Pembayaran berhasil di Tambahkan",
	});
</script>
@endif

@if(session('oketgl'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Data Berhasil",
		text: "Berhasil Ubah Waktu Penyewaan",
	});
</script>
@endif