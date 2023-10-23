<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insert(){
        $result = DB::insert('insert into mahasiswas(npm, nama, tempat_lahir, tanggal_lahir, created_at, updated_at) values(?, ?, ?, ?, ?, ?)', ['1922110006', 'Ahmad', 'Palembang', '2000-01-01' , now(), now()]);
        dump($result);
    }

    public function update(){
        $result = DB::update('update mahasiswas set nama = "Ali", updated_at = now() where npm = ?' , ['1922110006']);
        dump($result);
    }

    public function delete(){
        $result = DB::delete('delete from mahasiswa where npm = ?' , ['1922110006']);
        dump($result);
    }

    public function select(){
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswas');
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertElq(){
        // $mahasiswa = new Mahasiswa;
        // $mahasiswa->npm = '1923240001';
        // $mahasiswa->nama = 'Zainab';
        // $mahasiswa->tempat_lahir = 'Bandung';
        // $mahasiswa->tanggal_lahir = '2002-01-01';
        // $mahasiswa->created_at = now();
        // $mahasiswa->updated_at = now();
        // $mahasiswa->save();

        $mhs = Mahasiswa::insert(
        [
            ['nama' => 'Rachmat Nur',
            'npm' => '2009250033',
            'tempat_lahir' => 'Palembang',
            'tanggal_lahir' => date("Y-m-d"),
            'created_at' => now(),
            'updated_at' => now()
        ],['nama' => 'Rachmat' ,
            'npm' => '2009250044',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => date("Y-m-d"),
                        'created_at' => now(),
            'updated_at' => now()
            ]
         ]
    );
        dump($mhs);
}

    public function updateElq(){
        $mahasiswa = Mahasiswa::where('npm' , '1923240001')->first();
        $mahasiswa->nama = 'Khadijah';
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function deleteElq(){
        $mahasiswa = Mahasiswa::where('npm' , '1923240001')->first();
        $mahasiswa->delete();
        dump($mahasiswa);
    }

    public function selectElq(){
        $kampus = "Universitas Multi Data Palembang";
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'kampus' => $kampus]);
    }

}
