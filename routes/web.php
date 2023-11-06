<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
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

// Route::get('/profil' , function(){
//     echo "Namaku Ivan";
//     return view('profile');
// });

// Route::get('/mahasiswa/{nama?}' , function($nama = "Ivan"){
//     echo "Namaku $nama";
// });

// Route::get('/mahasiswa/{nama?}/{kelas?}' , function($nama = "Ivan", $kelas ="if3a"){
//     echo "<h1>Namaku $nama dari $kelas</h1>";
// });

// Route::get('/hubungi/{telp?}' , function($telp = "kamu nobob"){
//     echo "<h1> Hubungi kami $telp </h1>";
// });

// Route::redirect("/contact" , '/hubungi')->name("call");

// Route::get("/halo" , function(){
//     echo "<a href='".route('call') . "'>" . route('call')."</a>";
// });

// Route::prefix("/dosen")->group(function(){
//     Route::get("/jadwal" , function(){
//         echo "Jadwal Dosen";
//     });
//     Route::get("/materi" , function(){
//         echo "Materi Dosen!";
//     });
// });

Route::get('/dosen' , function(){
    return view('dosen');
});

Route::get('/dosen/index' , function(){
    return view('dosen.index');
});

Route::get('/fakultas',function(){
    // return view('fakultas.index' , ["ilkom" => "Fakultas Ilmu Komputer dan Rekayasa"]);

    // return view('fakultas.index' , ["fakultas" => ["Fakultas Ilmu Komputer dan Rekayasa" , "Fakultas Ilmu Ekonomi"]]);

    // return view('fakultas.index' ) ->with("fakultas" ,["Fakultas Ilmu Komputer dan Rekayasa" , "Fakultas Ilmu Ekonomi"]);
    // $fakultas = [];
    $kampus = "Universitas Multi Data Palembang";
    $fakultas = ["Fakultas Ilmu Komputer dan Reakyasa" , "Fakultas Ilmu Ekonomi"];
    return view('fakultas.index' , compact('fakultas' , 'kampus'));

});

Route::get('/prodi' , [ProdiController::class, 'index']);

Route::resource('/kurikulum', KurikulumController::class);

Route::apiResource('/dosen' , DosenController::class);

Route::get('/prodi/all-join-facade', [ProdiController::class,'allJoinFacade']);
