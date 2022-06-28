<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LAPORAN Penyewaan</title>

	<link rel="stylesheet" href="{{asset('template/print/table.css')}}">

</head>
<body>
	<div class="card-body">
		<center>
			<h2>Laporan Penyewaan</h2>
		</center>

		<table class="table table-striped" id="table1">
			<thead>
				<tr>
					<th>No. </th>
					<th>Nama Lapangan</th>
					<th>Nama Penyewa</th>
					<th>No HP</th>
					<th>Harga</th>
					<th>Jam Mulai</th>
					<th>Lama Sewa</th>
				</tr>
			</thead>
			<tbody>
				<?php $nul=0; ?>
				<?php $no=1; ?>
				@foreach($data as $dt)
				<?php date_default_timezone_set('Asia/Jakarta');
				$mulai=strtotime($dt->jam_mulai);
				$selesai=strtotime($dt->jam_selesai);

				$dif=$selesai-$mulai;

				$jam=floor($dif/(60*60));
				$menit=$dif-$jam*(60*60);
				$menit2=floor($menit/60);
				if ($menit2>=30) {
				$jam+=1;
			}
			$subtotal=number_format($nul+=$dt->nominal,0,",",".");
			?>
			<tr>
				<td>{{$no}}. </td>
				<td>{{$dt->nama_lap}}</td>
				<td>{{$dt->name}}</td>
				<td>{{$dt->no_telp}}</td>
				<td>Rp {{number_format($dt->harga,0,",",".")}}</td>
				<td>{{$dt->jam_mulai}} - {{$dt->jam_selesai}}</td>
				<td>
					{{$jam}} Jam
				</td>
			</tr>
			<?php $no++ ?>
			@endforeach
			@foreach($omset as $mo)
			<tr>
				<td colspan="7"><b>Subtotal : </b></td>
				<td>Rp {{$subtotal}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

</body>
</html>
