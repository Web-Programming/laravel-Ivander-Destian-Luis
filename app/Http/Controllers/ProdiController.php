<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function allJoinFacade()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select mahasiswas.* , prodis.name as nama_prodi from prodis, mahasiswas where prodis.id = mahasiswas.prodi_id');
        return view('prodi.index', ['allmahasiswaprodi' => $result, 'kampus' => $kampus]);
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        // echo $request->nama;

        $validateData = $request->validate([
            'name' => 'required|min:5|max:20',
        ]);
        // dump($validateData);
        // echo $validateData['nama'];

        $prodi = new Prodi();
        $prodi->name = $validateData['name'];
        $prodi->save();

        session()->flash('info', "Data prodi $prodi->name berhasil disimpan ke database");

        return redirect('prodi/create');
    }

    public function index()
    {
        $prodis = Prodi::all();
        return view('prodi.index', ['prodis' => $prodis, 'kampus' => 'Universitas Multi Data Palembang']);
    }

    public function show(Prodi $prodi)
    {
        return view('prodi.show', ['prodi' => $prodi, 'kampus' => 'Universitas Multi Data Palembang']);
    }

    public function edit(Prodi $prodi)
    {
        return view('prodi.edit', ['prodi' => $prodi,]);
    }

    public function update(Request $request, Prodi $prodi)
    {
        $validateData = $request->validate([
            'name' => 'required|min:5|max:20',
        ]);

        Prodi::where('id', $prodi->id)->update($validateData);
        session()->flash('info', "Data prodi $prodi->name berhasil diubah");
        return redirect()->route('prodi.index');
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route('prodi.index')->with("info", "Prodi $prodi->name Berhasil Dihapus");
    }
}
