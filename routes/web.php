<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('layouts.index');
});

Route::get('/login', function () {
    return view('login.index');
});

Route::get('/home', function () {
    return view('home.index');
});

Route::get('/tugas', function(){
    return view('contents.tugas', [
        'title' => 'tugas'
    ]);
});

Route::get('/absen', function(){
    return view('contents.absen', [
        'title' => 'absen'
    ]);
});

Route::get('/biodata', function(){
    return view('contents.biodata', [
        'title' => 'biodata'
    ]);
});

Route::get('/materi', function(){
    return view('contents.materi', [
        'title' => 'Materi'
    ]);
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

// Route::get('/besmart', function(){
//     return view('layouts.master');
// });



