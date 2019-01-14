@extends('layouts.app')

@section('title', 'Pemesanan')

@section('style')
<style>
	.hide {display: none;}
</style>
@endsection

@section('content')
<div class="card-panel">
	<div class="row">
		<div class="input-field col s9">
			<input type="text" id="search" placeholder="Masukan no daftar siswa" autocomplete="off" autofocus>
			<label for="search">Cari siswa</label>
		</div>
		<div class="col s3">
			<a href="javascript:void(0);" id="btn-search" class="btn cyan waves-effect waves-light">Cari</a>
		</div>
	</div>
	<div class="row hide" id="hide-card">
		<form action="{{ route('pemesanan.store') }}" method="POST"> @csrf
            <input type="hidden" name="no_faktur" id="kode">
			<input type="hidden" id="student_id" name="student_id">
            <div class="input-field col s5 right">
                <select name="model" >
                    <option value="1">Pendek</option>
                    <option value="2">Panjang</option>
                </select>
                <label>Model</label>
            </div>
			<div class="input-field col s8">
				<input type="text" id="name" disabled autofocus>
				<label>Nama Siswa</label>
			</div>
			<div class="input-field col s4">
				<input type="text" id="school_origin" disabled autofocus>
				<label>Asal Sekolah</label>
            </div>
			<div class="col s12 tbl">
				<table>
					<thead>
						<tr>
							<th width="5%">
								{{-- <input type="checkbox" id="selectAll">
								<label for="selectAll"></label> --}}
							</th>
			                <th width="45%">Nama Seragam</th>
                            <th></th>
			                <th width="15%">Harga</th>
                            <th width="10%">Ukuran</th>
                            <th width="10%">QTY</th>
                            <th width="15%">Sub Total</th>
						</tr>
					</thead>
					<tbody id="load-size"></tbody>
					<tfoot>
						<tr>
                            <td colspan="2" class="white"></td>
                            <td>Total</td>
                            <td colspan="4"><span id="grand-total">0</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="white"></td>
                            <td>Bayar</td>
                            <td colspan="4"><input type="text" id="pay" name="amount_paid"
                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="white"></td>
                            <td>Kembali</td>
                            <td colspan="4"><span id="refund">0</span></td>
                        </tr>
					</tfoot>
                </table> <br><br>
                <button class="btn cyan right waves-effect waves-light" id="done">Selesai</button>
                <input type="hidden" name="grand_total" id="grand_total">
                <input type="hidden" name="refund" id="irefund">
			</div>
		</form>
	</div>
</div>
@endsection

@push('script')
<script src="{{ asset('public/js/order.js') }}"></script>
<script>
    $(document).ready(function() {
         $.get('{{ route('order.lastId') }}', function(data) { 
            var kode = "SRG",
                no = parseInt(data.last_id) + 1;

            if (no < 10) {
                kode += "000" + no;
            } else if (no < 100) {
                kode += "00" + no;
            } else if (no < 1000) {
                kode += "0" + no;
            } else if (no < 10000) {
                kode += no;
            } else {
                kode += "0001";
            }

            $("#kode").attr('value', kode);
        });
    });
</script>
@endpush