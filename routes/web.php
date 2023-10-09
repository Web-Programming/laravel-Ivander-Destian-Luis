<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profil' , function(){
    echo "Namaku Ivan";
    return view('profile');
});

Route::get('/mahasiswa/{nama?}' , function($nama = "Ivan"){
    echo "Namaku $nama";
});

Route::get('/mahasiswa/{nama?}/{kelas?}' , function($nama = "Ivan", $kelas ="if3a"){
    echo "<h1>Namaku $nama dari $kelas</h1>";
});

Route::get('/hubungi/{telp?}' , function($telp = "kamu nobob"){
    echo "<h1> Hubungi kami $telp </h1>";
});

Route::redirect("/contact" , '/hubungi')->name("call");

Route::get("/halo" , function(){
    echo "<a href='".route('call') . "'>" . route('call')."</a>";
});

Route::prefix("/dosen")->group(function(){
    Route::get("/jadwal" , function(){
        echo "Jadwal Dosen";
    });
    Route::get("/materi" , function(){
        echo "Materi Dosen!";
    });
});