@extends('layouts.app')

@section('title', 'Detail Pemesanan')

@section('style')
<link rel="stylesheet" href="{{ asset('public/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
<style>
    .no-border > tr {
        border-bottom: none !important;
    }
</style>
@endsection

@section('content')
<div class="card-panel y-card">
    <div class="header">
        <span class="y-title">
        	Detail Pemesanan {{ $order->student->nama_lengkap }}
        </span>
        <div class="action">
            <a href="{{ route('pemesanan.print', Crypt::encrypt($order->no_faktur)) }}" class="waves-effect btn-flat nopadding tooltipped"
                data-position="bottom" data-delay="50" data-tooltip="Print" target="blank">
                <i class="material-icons">print</i>
            </a>
            <a href="{{ route('pemesanan.edit', Crypt::encrypt($order->no_faktur)) }}" class="waves-effect btn-flat nopadding tooltipped"
                data-position="bottom" data-delay="50" data-tooltip="Edit">
                <i class="material-icons">create</i>
            </a>
            <a href="#" class="waves-effect btn-flat nopadding tooltipped" id="btn-delete" 
                data-position="bottom" data-delay="50" data-tooltip="Hapus">
                <i class="material-icons">clear</i>
            </a>

            <form action="{{ route('pemesanan.destroy', $order->no_faktur) }}" method="POST" id="form-delete">
            	@csrf @method('DELETE')
            </form>
        </div>
    </div>
    <div class="content"> <br>
        <div class="col s6">
            <table class="no-border">
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
            </table>
        </div>
        <div class="col s6">
            <table class="no-border">
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
    </div> <br>
    <table class="bordered">
        <thead>
            <tr>
                <th width="3%">No</th>
                <th width="35%">Nama Seragam</th>
                <th width="25%">Harga Seragam</th>
                <th width="10%">Ukuran</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
        		<tr>
        			<td>{{ $loop->iteration }}</td>
        			<td>{{ $order->uniform->name }}</td>
        			<td>{{ "Rp. ".number_format($order->uniform->price, 0, ',', '.').",-" }}</td>
        			<td>{{ $order->size->size }}</td>
        		</tr>
            @empty
                <tr>
                    <td colspan="4" class="center">Data seragam atau data ukuran siswa sudah dihapus</td>
                </tr>
        	@endforelse
        </tbody>
    </table>
</div>
@endsection

@push('script')
<script src="{{ asset('public/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#btn-delete').on('click', function(e) {
            swal({
              title: 'Yakin menghapus data?',
              text: "Data akan di hapus secara permaen",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya',
              cancelButtonText: 'Batal'
            })
            .then((result) => {
              if (result) {
                $('#form-delete').submit();
              }
            });
        });
        @if ($data = Session::get('status'))
            Materialize.toast('{{ $data }}', 2500);
        @endif
    });
</script>
@endpush