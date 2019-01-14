<!DOCTYPE html>
<html lang="en" moznomarginboxes mozdisallowselectionprint> <!-- Hide title & footer (mozila) -->
<head>
	<meta charset="UTF-8">
	<title>Pemesanan - {{ $order->no_faktur }}</title>

	<link rel="stylesheet" href="{{ asset('public/vendor/materialize/css/materialize.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/print-order.css') }}">
</head>
<body onload="window.print()"> <br>
	<div class="center">
		<div class="row">
		<b>
			UNIT USAHA <br>
			SMK WIKRAMA BOGOR <br>
		</b>
			JL Raya Wangun Kel. Sindangsari Kec. Bogor Timur <br>
			Telp / Fax : (0251)8242411 Ciawi - Bogor 16720 <br>
			Website : http://www.smkwikrama.net, Email : prohumasi@smkwikrama.net <hr>
		</div>
		<div class="row">
			<div class="center">
				PEMBELIAN SERAGAM
			</div>
			<div class="col s6">
				<table class="tb">
					<tr>
						<td>No Faktur</td>
						<td>:</td>
						<td>{{ $order->no_faktur }}</td>
					</tr>
					<tr>
						<td>No Daftar</td>
						<td>:</td>
						<td>{{ $order->student->no_daftar }}</td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td>{{ $order->student->nama_lengkap }}</td>
					</tr>
				</table>
			</div>
			<div class="col s6">
				<table class="tb">
					<tr>
						<td>Tanggal</td>
						<td>:</td>
						<td>{{ $order->order_date->format('d-m-Y') }}</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td>:</td>
						<td>{{ $order->model() }}</td>
					</tr>
				</table>
			</div>
		</div> <hr>
		<div class="row">
			<table class="tb">
		        <thead>
		            <tr>
		                <th>No</th>
		                <th>Jenis Seragam</th>
		                <th>Jumlah</th>
		                <th>Harga</th>
		                <th>Total</th>
		                <th>Ukuran</th>
		                <th>Ambil</th>
		            </tr>
		        </thead>
		        <tbody>
		            @forelse ($orders as $order)
		        		<tr>
		        			<td align="center">{{ $loop->iteration }}</td>
		        			<td>{{ $order->uniform->name }}</td>
		        			<td>{{ $order->qty }}</td>
		        			<td>{{ "Rp. ".number_format($order->uniform->price, 0, ',', '.').",-" }}</td>
		        			<td>{{ $order->total }}</td>
		        			<td>{{ $order->size->size }}</td>
		        			<td>
		        				<input type="checkbox" id="{{ $loop->iteration }}">
		        				<label for="{{ $loop->iteration }}"></label>
		        			</td>
		        		</tr>
		        	@empty
		                <tr>
		                    <td colspan="7" class="center">Data seragam atau data ukuran siswa sudah dihapus</td>
		                </tr>
		        	@endforelse
		        </tbody>
		    </table>
		</div> <hr>
		<div class="row">
			<table>
				<tr>
					<td>Total Keseluruhan</td>
					<td>:</td>
					<td>{{ "Rp. ".number_format($order->grand_total, 0, ',', '.').",-" }}</td>
				</tr>
				<tr>
					<td>Jumlah Uang</td>
					<td>:</td>
					<td>{{ "Rp. ".number_format($order->amount_paid, 0, ',', '.').",-" }}</td>
				</tr>
				<tr>
					<td>Kembali</td>
					<td>:</td>
					<td>{{ "Rp. ".number_format($order->refund, 0, ',', '.').",-" }}</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>