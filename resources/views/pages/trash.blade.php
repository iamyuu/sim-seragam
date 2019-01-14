<?php
/*
|--------------------------------------------------------------------------
| Trash Uniform
|--------------------------------------------------------------------------
|
| This is file (trash) is only for data uniform
| for just data uniform using soft delete
|
*/ ?>

@extends('layouts.app')

@section('title', 'Seragam')

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

<div class="card material-table">
    <div class="table-header">
        <span class="table-title">Seragam</span>
        <div class="actions">
            <a href="{{ route('seragam.trash') }}" class="btn-flat"><i class="material-icons">delete</i></a>
            <a href="javascript:void(0);" class="search-toggle waves-effect btn-flat nopadding">
                <i class="material-icons">search</i>
            </a>
        </div>
    </div>
    <table id="datatable">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="65%">Nama</th>
                <th width="15%">Harga</th>
                <th width="15%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($uniforms as $uniform)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $uniform->name }}</td>
                    <td>{{ $uniform->price }}</td>
                    <td>
                        <a href="javascript:void(0);" class="btn-flat btn-delete">
                            <i class="material-icons">clear</i>
                        </a>

                        <form action="{{ route('seragam.delete', $uniform->id) }}" method="POST" class="form-delete" style="display: none;">
                            {{ csrf_field() }}
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
<script>
    $(document).ready(function() {
        $('#datatable').dataTable({
            "oLanguage": {
                "sStripClasses": "",
                "sSearch": "",
                "sSearchPlaceholder": "Masukan Kata Di sini",
                "sInfo": "_START_ -_END_ of _TOTAL_"
            },
            bAutoWidth: false
        });
        $('.btn-delete').on('click', function(e) {
            swal({
              title: 'Yakin menghapus data?',
              text: "Data akan di hapus secara permanen",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya',
              cancelButtonText: 'Batal'
            }).then((result) => {
              if (result) {
                $('.form-delete').submit();
              }
            });
        });
        @if ($data = Session::get('status'))
            swal('Berhasil', '{{ $data }}', 'success');
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