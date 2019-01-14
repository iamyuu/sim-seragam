@extends('layouts.app')

@section('title', 'Ukuran')

@section('style')
<link rel="stylesheet" href="{{ asset('public/vendor/DataTables/css/dataTables.material.css') }}">
<link rel="stylesheet" href="{{ asset('public/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('content')
<div class="card material-table">
    <div class="table-header">
        <span class="table-title">Ukuran Siswa ({{ $sizes[0]->student->nama_lengkap }})</span>
        <div class="actions">
            <a href="{{ route('ukuran.edit', Crypt::encrypt($sizes[0]->student_id)) }}" data-position="bottom" data-delay="50" data-tooltip="Edit" class="btn-flat tooltipped waves-effect">
                <i class="material-icons">create</i>
            </a>
            {{--  <a href="javascript:void(0);" class="btn-flat tooltipped waves-effect" id="btn-delete" data-position="bottom" data-delay="50" data-tooltip="Hapus">
                <i class="material-icons">clear</i>
            </a>  --}}
            <form action="{{ route('ukuran.destroy', $sizes[0]->student_id) }}" method="POST" id="form-delete">
                @csrf @method('DELETE')
            </form>
        </div>
    </div>
    <table id="datatable">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="45%">Jenis Seragam</th>
                <th width="10%">Ukuran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sizes as $size)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $size->uniform->name }}</td>
                    <td>{{ $size->size }}</td>
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
    });
</script>
@endpush