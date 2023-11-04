<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherFormRequest;
use App\Models\Mapel;
use App\Models\teacher;
use Illuminate\Http\Request;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view('master-relasi.guru.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapels = Mapel::latest()->get();
        return view('master-relasi.guru.create', compact('mapels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherFormRequest $request)
    {
        $teachers = $request->validated();

        $teachers = Teacher::create([
            'name' => $request->name,
            'mapel_id' => $request->mapel_id,
        ]);

        if ($teachers) {
            return redirect()
                ->route('guru.index')
                ->with([
                    'success' => 'Data Guru berhasil ditambahkan'
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       #Not Using This Functions ttd:Juna
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::findOrFail($id);
        $mapels = Mapel::latest()->get();
        return view('master-relasi.guru.edit', compact('teachers','mapels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherFormRequest $request, $id)
    {
        $teachers = $request->validated();

        $teachers = Teacher::findOrFail($id);

        $teachers->update([
            'name' => $request->name,
            'mapel_id' => $request->mapel_id,
        ]);

        if ($teachers) {
            return redirect()
                ->route('guru.index')
                ->with([
                    'success' => 'Data guru telah di update'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Error, Coba lagi'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teachers = Teacher::findOrFail($id);
        $teachers->delete();

        if ($teachers) {
            return redirect()
                ->route('guru.index')
                ->with([
                    'success' => 'Data guru telah dihapus '
                ]);
        } else {
            return redirect()
                ->route('guru.index')
                ->with([
                    'error' => 'Error, coba lagi'
                ]);
        }
    }
}
