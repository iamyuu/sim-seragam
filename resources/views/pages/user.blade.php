@extends('layouts.app')

@section('title', 'User')

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

<div id="modal" class="modal">
    <form action="">
        <div class="modal-title">Tambah User</div>
        <div class="modal-content" style="margin-bottom: 20%;">
            <div class="input-field col s12">
                <input type="text" name="name" autocomplete="off" required>
                <label>Name</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-flat modal-action modal-close waves-effect waves-light">Batal</button>
            <button type="submit" class="btn-flat modal-action waves-effect waves-light">Simpan</button>
        </div>
    </form>
</div>

<div class="card material-table">
    <div class="table-header">
        <span class="table-title">User</span>
        <div class="actions">
            <a href="#modal" class="btn-flat modal-trigger"><i class="material-icons">add</i></a>
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
                <th width="15%">username</th>
                <th width="15%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            	<tr>
            		<td>{{ $loop->iteration }}</td>
            		<td>{{ $user->name }}</td>
            		<td>{{ $user->username }}</td>
            		<td>
            			<a href="javascript:void(0);" class="btn-flat"><i class="material-icons">edit</i></a>
                    	<a href="javascript:void(0);" class="btn-flat"><i class="material-icons">clear</i></a>
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
        Materialize.toast('Default password akun: 123', 2500);
        $('#datatable').dataTable({
            "oLanguage": {
                "sStripClasses": "",
                "sSearch": "",
                "sSearchPlaceholder": "Enter Keyword Here",
                "sInfo": "_START_ -_END_ of _TOTAL_",
                "sLengthMenu": '<span>Rows per page:</span><select class="browser-default">' +
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