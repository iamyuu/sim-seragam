@extends('layouts.app')

@section('title', 'Ukuran')

@section('style')
<link rel="stylesheet" href="{{ asset('public/vendor/DataTables/css/dataTables.material.css') }}">
<link rel="stylesheet" href="{{ asset('public/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('content')
<div class="card material-table">
    <div class="table-header">
        <span class="table-title">Ukuran</span>
        <div class="actions">
            <a href="{{ route('ukuran.create') }}" class="waves-effect btn-flat tooltipped"
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
                <th width="5%">No</th>
                <th width="15%">No daftar</th>
                <th width="65%">Nama Siswa</th>
                <th width="15%">Asal SMP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sizes as $size)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $size->student->no_daftar }}</td>
                    <td><a href="{{ route('ukuran.show', Crypt::encrypt($size->student_id)) }}">{{ $size->student->nama_lengkap }}</a></td>
                    <td>{{ $size->student->asal_smp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('script')
<script src="{{ asset('public/vendor/DataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/vendor/DataTables/js/dataTables.material.js') }}"></script>
<script src="{{ asset('public/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        @if ($data = Session::get('status'))
            Materialize.toast('{{ $data }}', 2500);
        @endif
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
    });
</script>
@endpush