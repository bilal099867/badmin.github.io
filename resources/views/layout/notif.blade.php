@if(session('salah'))
<script type="text/javascript">
	document.getElementById('error');
	Swal.fire({
		icon: "error",
		title: "Gagal Login",
		text: "Username dan Password tidak sesuai."
	});
</script>
@endif
@if(session('sama'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Username Sama",
		text: "Username tersebut telah di Gunakan."
	});
</script>
@endif
@if(session('non-aktif'))
<script type="text/javascript">
	document.getElementById('error');
	Swal.fire({
		icon: "error",
		title: "Username Tidak Aktif",
		text: "Username telah di Non-Aktif kan."
	});
</script>
@endif