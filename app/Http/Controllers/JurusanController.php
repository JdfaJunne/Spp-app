<?php

namespace App\Http\Controllers;

use App\Http\Requests\JurusanFormRequest;
use App\Models\jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jurusans = jurusan::latest()->get();
        return view('master-data.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('master-data.jurusan.create');
    }

    public function store(JurusanFormRequest $request)
    {
        $ $jurusans = $request->validated();

        $jurusans = jurusan::create([
            'nama' => $request->nama,
        ]);

        if ($jurusans) {
            return redirect()
                ->route('jurusan.index')
                ->with([
                    'success' => 'Data Jurusan sudah ditambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'error coba lagi'
                ]);
        }

    }

    public function edit($id)
    {
        $jurusans = jurusan::findOrFail($id);
        return view('master-data. jurusan.edit', compact('jurusans'));
    }

    public function update(JurusanFormRequest $request, $id)
    {
        $jurusans = $request->validated();

        $jurusans = jurusan::findOrFail($id);

        $jurusans->update([
            'nama' => $request->nama,
        ]);

        if ($jurusans) {
            return redirect()
                ->route('jurusan.index')
                ->with([
                    'success' => 'Data jurusan telah di update'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Coba sesaat lagi'
                ]);
        }
    }
    public function destroy($id)
    {
        $jurusans = jurusan::findOrFail($id);
        $jurusans->delete();

        if ($jurusans) {
            return redirect()
                ->route('jurusan.index')
                ->with([
                    'success' => 'Data jurusan telah dihapus '
                ]);
        } else {
            return redirect()
                ->route('jurusan.index')
                ->with([
                    'error' => 'Error, coba lagi'
                ]);
        }
    }
}



