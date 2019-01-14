@extends('layouts.app')

@section('title', 'Ukuran')

@section('content')
<div class="card-panel">
	<div class="row">
		<form action="{{ route('ukuran.update', $siswa->id) }}" method="POST"> @csrf @method('PUT')
			<input type="hidden" name="student" value="{{ $siswa->student_id }}">
			<div class="input-field col s8">
				<input type="text" value="{{ $siswa->student->nama_lengkap }}" disabled>
				<label for="">Nama Siswa</label>
			</div>
			<div class="input-field col s4">
				<input type="text" value="{{ $siswa->student->asal_smp }}" disabled>
				<label for="">Asal Sekolah</label>
			</div>
			<div class="col s12">
				<table>
					<thead>
						<tr>
			                <th width="20%">Nama Seragam</th>
			                <th width="20%">Ukuran</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 1; $i <= count($seragam); $i++)
							<tr>
								<td>{{ $seragam[$i] }}</td>
								<td>
									<input type="text" name="size[]" value="{{ $ukuran[$i] }}">
								</td>
							</tr>
							<input type="hidden" name="uniform[]" value="{{ $seragam_id[$i] }}">
						@endfor
					</tbody>
				</table>
				<button class="btn cyan right waves-effect waves-light">Simpan</button>
			</div>
		</form>
	</div>
</div>
@endsection