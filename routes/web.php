<?php

Route::group(['middleware' => 'guest'], function() {
	Route::view('login', 'pages.login')->name('login');
	Route::post('login', 'Auth\LoginController@login')->name('login.process');
});

Route::group(['middleware' => 'auth'], function() {
	// Route::view('/', 'pages.home')->name('index');
	Route::get('/', function() {
		$student = App\Student::all()->count();
		$uniform = App\Uniform::all()->count();
		$order   = App\Order::all()->count();
		$size    = count(App\Size::groupBy('student_id')->get());
		return view('pages.home', compact('size', 'order', 'student', 'uniform'));
	});

	Route::resource('seragam', 'UniformController', ['only' => ['index', 'store', 'destroy']]);
	Route::patch('seragam/update', 'UniformController@update')->name('seragam.update');

	Route::get('siswa/template', 'StudentController@download')->name('siswa.download');
	Route::post('siswa/import', 'StudentController@import')->name('siswa.import');
	Route::patch('siswa/update', 'StudentController@update')->name('siswa.update');
	Route::resource('siswa', 'StudentController', ['only' => ['index', 'store', 'destroy']]);

	Route::get('pengukuran', 'SizeController@create')->name('ukuran.create');
	Route::post('pengukuran', 'SizeController@store')->name('ukuran.store');
	Route::resource('ukuran', 'SizeController', ['except' => ['create', 'store']]);

	Route::resource('pemesanan', 'OrderController');
	Route::get('pemesanan/{order}/print', 'OrderController@print')->name('pemesanan.print');

	Route::view('ganti-password', 'pages.change');
	Route::post('changed', 'AuthController@changed')->name('auth.change');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');


	Route::get('pemesanan/search/student', 'OrderController@searchStudent')->name('order.student');
});
