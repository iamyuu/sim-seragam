@extends('layouts.app')

@section('title', 'Pemesanan')

@section('style')
<link rel="stylesheet" href="{{ asset('public/vendor/DataTables/css/dataTables.material.css') }}">
@endsection

@section('content')
<div class="card material-table">
    <div class="table-header">
        <span class="table-title">Pemesanan</span>
        <div class="actions">
            <a href="{{ route('pemesanan.create') }}" class="waves-effect btn-flat nopadding tooltipped"
                data-position="bottom" data-delay="50" data-tooltip="Tambah">
                <i class="material-icons">add</i>
            </a>
            <a href="javascript:void(0);" class="search-toggle waves-effect btn-flat nopadding tooltipped"
                data-position="bottom" data-delay="50" data-tooltip="Cari">
                <i class="material-icons">search</i>
            </a>
        </div>
    </div>
    <table id="datatable">
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="50%">Nama Siswa</th>
                <th width="7%">Model</th>
                <th width="10%">Tanggal</th>
                <th width="5%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            	<tr>
            		<td>{{ $loop->iteration }}</td>
            		<td>{{ $order->student->nama_lengkap }}</td>
            		<td>{{ $order->model() }}</td>
            		<td>{{ $order->order_date->format('d M, Y') }}</td>
            		<td>
            			<a href="{{ route('pemesanan.show', Crypt::encrypt($order->no_faktur)) }}" class="btn-flat waves-effect tooltipped"
                            data-position="top" data-delay="50" data-tooltip="Detail">
            				<i class="material-icons">visibility</i>
            			</a>
            		</td>
            	</tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('script')
<script src="{{ asset('public/vendor/DataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/vendor/DataTables/js/dataTables.material.js') }}"></script>
<script>
	$(document).ready(function() {
		$('#datatable').dataTable({
            "oLanguage": {
                "sStripClasses": "",
                "sSearch": "",
                "sSearchPlaceholder": "Masukan Kata Di sini",
                "sInfo": "_START_ -_END_ of _TOTAL_",
                "sLengthMenu": '<span>Baris per halaman:</span><select class="browser-default">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                '</select></div>'
            },
            bAutoWidth: false
        });
		@if ($data = Session::get('status'))
		    Materialize.toast('{{ $data }}', 2500);
		@endif
	});
</script>
@endpush