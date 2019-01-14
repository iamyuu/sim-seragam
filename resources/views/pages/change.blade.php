@extends('layouts.app')

@section('title', 'Ganti Password')

@section('style')
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

<div class="row" style="margin-top: 23px;">
	<div class="col s12">
		<div class="card-panel">
	        <form action="{{ url('changed') }}" method="POST"> @csrf
	        	<div class="input-field col s12">
	                <input type="password" name="old" autocomplete="off" autofocus required>
	                <label>Password Lama</label>
	            </div>
	            <div class="input-field col s12">
	                <input type="password" name="new" autocomplete="off" required>
	                <label>Password Baru</label>
	            </div>
	            <div class="input-field col s12">
	                <input type="password" name="confirm" autocomplete="off" required>
	                <label>Konfirmasi Password</label>
	            </div>
	            <button class="btn waves-effect waves-light cyan right">Simpan</button>
	        </form>
	        <table></table>
	    </div>
	</div>
</div>
@endsection

@push('script')
<script src="{{ asset('public/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        @if ($data = Session::get('status'))
            Materialize.toast('{{ $data }}', 2500);
        @endif
        var err = {{ count($errors) > 0 ? 'true' : 'false' }};
        if (err) {
        	Materialize.toast(jQuery('#error').html(), 2500);
        }
    });
</script>
@endpush