<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return redirect()->route('frontpage');
// });

Auth::routes();

Route::get('register', function(){
    return redirect()->route('login');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('export', 'ResiController@export')->name('export');
// Route::get('resi','ResiController@index')->name('resi');
Route::post('import','ResiController@import')->name('import');

Route::resource('resi', 'ResiController',['except'=> ['show'] ]);
Route::get('resi/{resi}', 'ResiController@show')->middleware('reseller')->name('resi.show');
Route::get('/fetch_data','ResiController@fetch_data')->name('fetch_data');
Route::get('/admin', function(){
    return redirect()->route('admin.users.index');
})->middleware(['auth', 'auth.admin']);


Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
    Route::resource('/users', 'UserController', ['except' => ['show']]);
});


Route::get('/userview', function(){
    return view('user_view');
})->name('userview');

Route::get('klasifikasi','klasifikasiController@index')->name('klasifikasi');

Route::get('track','TrackController@index')->name('track');
Route::get('track/search','TrackController@search')->name('tracking');
Route::get('trackuser/{resi}', 'TrackController@show')->middleware('trackuser')->name('trackuser_show');
Route::get('trackuser', function(){
    return redirect()->route('track');
});

Route::get('/', function(){
    return view('frontpage');
})->name('frontpage');

Route::get('inputresi', 'RajaOngkirController@input')->name('inputresi');
Route::post('prosesresi','RajaOngkirController@proses')->name('prosesresi');

// Route::get('userlogin','Auth\LoginController@userlogin')->name('userlogin');
// Route::post('userlog','Auth\LoginController@userlog')->name('userlog');
Route::get('trackshow/{resi}','ResiController@trackResi')->middleware('reseller')->name('trackShow');
Route::get('trackuser_track/{resi}','TrackController@trackUser')->name('trackuser_track');
