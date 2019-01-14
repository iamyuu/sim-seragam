@extends('layouts.app')

@section('title', 'Home')

@section('content')
{{-- @if (Hash::check(123, Auth::user()->password))
	@if (count($errors) > 0)
	    <div id="error" style="display: none;">
	        @foreach ($errors->all() as $error)
	            {{ $error }} <br>
	        @endforeach
	    </div>
	@endif

	<div class="card-panel">
		<form action="{{ route('auth.change') }}" method="POST"> 
			{{ csrf_field() }}
			<div class="input-field col s12">
	            <input type="password" name="old" required>
	            <label>Password Lama</label>
	        </div>
	        <div class="input-field col s12">
	            <input type="password" name="new" required>
	            <label>Password Baru</label>
	        <div class="input-field col s12">
	            <input type="password" name="confirm" required>
	            <label>Konfirmasi Password</label>
	        </div>
	        </div>
	        <div class="input-field col s12">
		        <button class="btn waves-effect waves-light cyan">Ganti Password</button>
		    </div>
		</form>
		<table></table>
	</div>
@endif --}}

<div class="row" style="margin-top: 23px;">
	<div class="col s12 m6 l3">
		<div class="card">
	        <div class="card-content">
	            <p class="card-widget-title">Siswa</p>
	            <h4 class="card-widget-number">{{ $student }}</h4>
	        </div>
	        <div class="card-action">
	            <a href="{{ url('siswa') }}" style="color: black;">Detail</a>
	        </div>
	    </div>
	</div>
	<div class="col s12 m6 l3">
		<div class="card">
	        <div class="card-content">
	            <p class="card-widget-title">Seragam</p>
	            <h4 class="card-widget-number">{{ $uniform }}</h4>
	        </div>
	        <div class="card-action">
	            <a href="{{ url('seragam') }}" style="color: black;">Detail</a>
	        </div>
	    </div>
	</div>
	<div class="col s12 m6 l3">
		<div class="card">
	        <div class="card-content">
	            <p class="card-widget-title">Ukuran</p>
	            <h4 class="card-widget-number">{{ $size }}</h4>
	        </div>
	        <div class="card-action">
	            <a href="{{ url('ukuran') }}" style="color: black;">Detail</a>
	        </div>
	    </div>
	</div>
	<div class="col s12 m6 l3">
		<div class="card">
	        <div class="card-content">
	            <p class="card-widget-title">Pemesanan</p>
	            <h4 class="card-widget-number">{{ $order }}</h4>
	        </div>
	        <div class="card-action">
	            <a href="{{ url('pemesanan') }}" style="color: black;">Detail</a>
	        </div>
	    </div>
	</div>
</div>
@endsection

{{-- @push('script')
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
@endpush --}}