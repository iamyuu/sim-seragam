@extends('layouts.app')

@section('title', 'Ukuran')

@section('style')
<style>
	.hide {display: none;}
</style>
@endsection

@section('content')
<div class="card-panel">
	<div class="row">
		<div class="input-field col s9">
			<input type="text" id="search" placeholder="Masukan no daftar siswa" autocomplete="off">
			<label for="search">Cari siswa</label>
		</div>
		<div class="col s3">
			<a href="javascript:void(0);" id="btn-search" class="btn cyan waves-effect waves-light">Cari</a>
		</div>
	</div>
	<div class="row hide" id="hide-card">
		<form action="{{ route('ukuran.store') }}" method="POST">
			<input type="hidden" id="student_id" name="student"> @csrf
			<div class="input-field col s8">
				<input type="text" id="name" placeholder="Nama siswa" disabled>
				<label for="">Nama Siswa</label>
			</div>
			<div class="input-field col s4">
				<input type="text" id="school_origin" placeholder="Asal sekolah" disabled>
				<label for="">Asal Sekolah</label>
			</div>
			<div class="col s12">
				<table>
					<thead>
						<tr>
			                <th width="20%">Nama Seragam</th>
			                <th width="20%"></th>
						</tr>
					</thead>
					<tbody id="load-uniform"></tbody>
				</table>
				<button class="btn cyan right waves-effect waves-light">Simpan</button>
			</div>
		</form>
	</div>
</div>
@endsection

@push('script')
<script src="{{ asset('public/js/size.js') }}"></script>
<script>
	@if ($data = Session::get('status'))
        Materialize.toast('{{ $data }}', 2500);
    @endif
</script>
@endpush