<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapelFormRequest;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MapelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mapels = Mapel::latest()->get();
        return view('master-data.mapel.index', compact('mapels'));
    }

    public function create()
    {
        return view('master-data.mapel.create');
    }

    public function store(MapelFormRequest $request)
    {
        $mapels = $request->validated();

        $mapels = Mapel::create([
            'nama' => $request->nama,
        ]);

        if ($mapels) {
            return redirect()
                ->route('mapel.index')
                ->with([
                    'success' => 'Data mata pelajaran sudah ditambahkan'
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
        $mapels = Mapel::findOrFail($id);
        return view('master-data.mapel.edit', compact('mapels'));
    }

    public function update(MapelFormRequest $request, $id)
    {

        $mapels = $request->validated();

        $mapels = Mapel::findOrFail($id);

        $mapels->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama)
        ]);

        if ($mapels) {
            return redirect()
                ->route('mapel.index')
                ->with([
                    'success' => 'Mata pelajaran telah di update'
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
        $mapels = Mapel::findOrFail($id);
        $mapels->delete();

        if ($mapels) {
            return redirect()
                ->route('mapel.index')
                ->with([
                    'success' => 'Mata pelajaran telah dihapus '
                ]);
        } else {
            return redirect()
                ->route('mapel.index')
                ->with([
                    'error' => 'Error, coba lagi'
                ]);
        }
    }
}



