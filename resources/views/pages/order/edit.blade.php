@extends('layouts.app')

@section('title', 'Pemesanan')

@section('content')
<div class="card-panel">
	<div class="row">
		<form action="{{ route('pemesanan.update', $order->no_faktur) }}" method="POST"> @csrf @method('PATCH')
			<input type="hidden" id="student_id" name="student_id">
			<input type="hidden" id="priceAllUniform">
			<div class="input-field col s6">
				<input type="text" value="{{ $order->student->nama_lengkap }}" disabled autofocus>
				<label>Nama Siswa</label>
			</div>
			<div class="input-field col s4">
				<input type="text" value="{{ $order->student->asal_smp }}" disabled autofocus>
				<label>Asal Sekolah</label>
			</div>
            <div class="input-field col s2 right">
                <select name="model" >
                    <option {{ $order->model == 1 ? 'selected' : '' }} value="1">Pendek</option>
                    <option {{ $order->model == 2 ? 'selected' : '' }} value="2">Panjang</option>
                </select>
                <label>Model</label>
            </div>
			<div class="col s12 tbl">
				<table>
					<thead>
						<tr>
                            <th width="5%">
                                <input type="checkbox" id="selectAll">
                                <label for="selectAll"></label>
                            </th>
                            <th width="45%">Nama Seragam</th>
                            <th></th>
                            <th width="10%">Harga</th>
                            <th width="10%">Ukuran</th>
                            <th width="15%">QTY</th>
                            <th width="15%">Total</th>
                        </tr>
					</thead>
					<tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <input type="checkbox" id="checkbox-{{ $uniform->id }}" name="chk[]" onclick="calculatePriceUniform()" 
                                            value="{{ $uniform->id }}" data-price="{{ $uniform->price }}">
                                    <label for="checkbox-{{ $uniform->id }}"></label>
                                </td>
                                <td>{{ $uniform->name }}</td>
                                <td></td>
                                <td>{{ $uniform->price }}</td>
                                {{-- <td>{{ $order-> }}</td> --}}
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" class="white"></td>
                            <td>Total:</td>
                            <td colspan="4"><span id="total">{{ $order->grand_total }}</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="white"></td>
                            <td>Bayar</td>
                            <td colspan="4"><input type="text" name="amount_paid" value="{{ $order->amount_paid }}"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="white"></td>
                            <td>Kembali</td>
                            <td colspan="4"><span id="refund">{{ $order->refund }}</span></td>
                        </tr>
                    </tbody>
                </table> <br><br>
                <button class="btn cyan right waves-effect waves-light" id="done">Selesai</button>
                <input type="hidden" name="grand_total" id="grand_total">
			</div>
		</form>
	</div>
</div>
@endsection

@push('script')
<script>
    // 
</script>
@endpush