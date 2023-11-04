<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomFormRequest;
use App\Models\Classroom;
use App\Models\jurusan;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classrooms = Classroom::latest()->get();
        return view('master-relasi.kelas.index', compact('classrooms'));
    }

    public function create()
    {
        $jurusans = jurusan::latest()->get();
        return view('master-relasi.kelas.create', compact('jurusans'));
    }

    public function store(ClassroomFormRequest $request)
    {
        $classrooms = $request->validated();

        $classrooms = Classroom::create([
            'name' => $request->name,
            'jurusan_id' => $request->jurusan_id,
        ]);

        if ($classrooms) {
            return redirect()
                ->route('kelas.index')
                ->with([
                    'success' => 'Data kelas berhasil ditambahkan'
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
        $classrooms = Classroom::findOrFail($id);
        $jurusans = jurusan::latest()->get();
        return view('master-relasi.kelas.edit', compact('classrooms','jurusans'));
    }

    public function update(ClassroomFormRequest $request, $id)
    {
        $classrooms = $request->validated();

        $classrooms = Classroom::findOrFail($id);

        $classrooms->update([
            'name' => $request->name,
            'jurusan_id' => $request->jurusan_id,
        ]);

        if ($classrooms) {
            return redirect()
                ->route('kelas.index')
                ->with([
                    'success' => 'Data Kelas telah di update'
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
        $classrooms = Classroom::findOrFail($id);
        $classrooms->delete();

        if ($classrooms) {
            return redirect()
                ->route('kelas.index')
                ->with([
                    'success' => 'Data kelas telah dihapus '
                ]);
        } else {
            return redirect()
                ->route('kelas.index')
                ->with([
                    'error' => 'Error, coba lagi'
                ]);
        }
    }
}
