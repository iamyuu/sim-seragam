@extends('layouts.app')

@section('title', 'Siswa')

@section('style')
<link rel="stylesheet" href="{{ asset('public/vendor/DataTables/css/dataTables.material.css') }}">
<link rel="stylesheet" href="{{ asset('public/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('content')
@if (count($errors) > 0)
    <div id="error" style="display: none;">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif

@include('pages.student.modal')

<div class="card material-table">
    <div class="table-header">
        <span class="table-title">Siswa</span>
        <div class="actions">
            <a href="#modal-upload" class="btn-flat waves-effect modal-trigger nopadding tooltipped"
                data-position="bottom" data-delay="50" data-tooltip="Upload excel">
                <i class="material-icons">file_upload</i>
            </a>
            <a href="{{ route('siswa.download') }}" class="btn-flat waves-effect nopadding tooltipped"
                data-position="bottom" data-delay="50" data-tooltip="Download template excel">
                <i class="material-icons">file_download</i>
            </a>
            <a href="#modal-add" class="waves-effect btn-flat tooltipped modal-trigger"
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
                <th width="9%">No Daftar</th>
                <th width="35%">Nama</th>
                <th width="13%">Jenis Kelamin</th>
                <th width="10%">Agama</th>
                <th width="20%">Asal Sekolah</th>
                <th width="15%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->no_daftar }}</td>
                    <td>{{ $student->nama_lengkap }}</td>
                    <td>{{ $student->gender() }}</td>
                    <td>{{ $student->religion() }}</td>
                    <td>{{ $student->asal_smp }}</td>
                    <td>
                        <a href="javascript:void(0);" class="btn-flat btn-edit waves-effect tooltipped" data-position="top" data-delay="50" 
                            data-tooltip="Edit" data-id="{{ $student->no_daftar }}" data-name="{{ $student->nama_lengkap }}"
                            data-jk="{{ $student->jenis_kelamin }}" data-agama="{{ $student->agama }}" data-smp="{{ $student->asal_smp }}">
                            <i class="material-icons">edit</i>
                        </a>
                        <a href="javascript:void(0);" class="btn-flat waves-effect tooltipped" data-tooltip="Hapus"
                            data-position="top" data-delay="50" onclick="swalDelete({{ $loop->index }})">
                            <i class="material-icons">clear</i>
                        </a>

                        <form action="{{ route('siswa.destroy', $student->no_daftar) }}" method="POST" id="form-delete-{{ $loop->index }}">
                            @csrf @method('DELETE')
                        </form>
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
<script src="{{ asset('public/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('public/js/student.js') }}"></script>
<script>
    $(document).ready(function() {
        @if ($data = Session::get('status'))
            Materialize.toast('{{ $data }}', 2500);
        @endif
        var err = {{ count($errors) > 0 ? 'true' : 'false' }};
        if (err) {
            swal({
              title : 'Opps...',
              type  : 'error',
              html  : jQuery('#error').html(),
              timer : 5000,
            });
        }
    });
</script>
@endpush