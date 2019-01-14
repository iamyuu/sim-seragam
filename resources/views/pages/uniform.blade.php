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

<div id="modal" class="modal">
    <form action="{{ route('seragam.store') }}" method="POST">  @csrf
        <div class="modal-content">
            <div class="input-field col s12">
                <input type="text" name="name" autocomplete="off" required>
                <label>Nama</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off" required>
                <label>Harga</label>
            </div>
            <div class="row">
                <span>&nbsp;&nbsp;&nbsp;Status</span>
                <span>
                    <input type="radio" id="1" name="status" value="1" class="with-gap">
                    <label for="1">Laki-laki</label>
                </span>
                <span>
                    <input type="radio" id="2" name="status" value="2" class="with-gap">
                    <label for="2">Perempuan</label>
                </span>
                <span>
                    <input type="radio" id="3" name="status" value="3" class="with-gap">
                    <label for="3">umum</label>
                </span>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-flat modal-action modal-close waves-effect waves-light">Batal</button>
            <button type="submit" class="btn-flat modal-action waves-effect waves-light">Simpan</button>
        </div>
    </form>
</div>

<div id="modal-edit" class="modal">
    <form action="{{ route('seragam.update') }}" method="POST">
        @csrf @method('PATCH')
        <div class="modal-content">
            <div class="input-field col s12">
                <input type="text" name="name" id="name" autocomplete="off" autofocus required>
                <label>Nama</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="price" id="price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off" autofocus required>
                <label>Harga</label>
            </div>
            <div class="row">
                <span>&nbsp;&nbsp;&nbsp;Status</span>
                <span>
                    <input type="radio" id="status-l" name="status" value="1" class="with-gap">
                    <label for="status-l">Laki-laki</label>
                </span>
                <span>
                    <input type="radio" id="status-p" name="status" value="2" class="with-gap">
                    <label for="status-p">Perempuan</label>
                </span>
                <span>
                    <input type="radio" id="status-u" name="status" value="3" class="with-gap">
                    <label for="status-u">Umum</label>
                </span>
            </div>
        </div>
        <div class="modal-footer">
            <input type="hidden" id="id" name="id">
            <button type="button" class="btn-flat modal-action modal-close waves-effect waves-light">Batal</button>
            <button type="submit" class="btn-flat modal-action waves-effect waves-light">Simpan</button>
        </div>
    </form>
</div>

<div class="card material-table">
    <div class="table-header">
        <span class="table-title">Seragam</span>
        <div class="actions">
            <a href="#modal" class="waves-effect btn-flat tooltipped modal-trigger"
                data-position="bottom" data-delay="50" data-tooltip="Tambah">
                <i class="material-icons">add</i>
            </a>
            {{-- <a href="{{ route('seragam.trash') }}" class="btn-flat"><i class="material-icons">delete</i></a> --}}
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
                <th width="45%">Nama</th>
                <th width="15%">Harga</th>
                <th width="15%">Status</th>
                <th width="15%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($uniforms as $uniform)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $uniform->name }}</td>
                    <td>{{ "Rp. ".number_format($uniform->price, 0, ',', '.').",-" }}</td>
                    <td>{{ $uniform->status() }}</td>
                    <td>
                        <a href="javascript:void(0);" class="btn-flat btn-edit waves-effect tooltipped"
                        data-id="{{ $uniform->id }}" data-name="{{ $uniform->name }}" data-price="{{ $uniform->price }}" data-position="top" data-delay="50" data-tooltip="Edit" data-status="{{ $uniform->status }}">
                            <i class="material-icons">edit</i>
                        </a>
                        <a href="javascript:void(0);" class="btn-flat waves-effect tooltipped" data-tooltip="Hapus"
                            data-position="top" data-delay="50" onclick="swalDelete({{ $loop->index }})">
                            <i class="material-icons">clear</i>
                        </a>

                        <form action="{{ route('seragam.destroy', $uniform->id) }}" method="POST" id="form-delete-{{ $loop->index }}" style="display: none;">
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
<script src="{{ asset('public/js/uniform.js') }}"></script>
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