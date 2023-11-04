@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <h5 class="text-white font-weight-bold">DASHBOARD</h5>
            <div class="col-md-12 mt-3">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('kelas.create') }}" class="btn btn-md btn-primary mb-3 float-right">Tambah Mata Pelajaran</a>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($classrooms as $classroom)
                                    <tr>
                                        <td>{{ $classroom->name }}</td>
                                        <td>{{ $classroom->jurusan->nama }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('kelas.destroy', $classroom->id) }}" method="POST">
                                                <a href="{{ route('kelas.edit', $classroom->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt "></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="4">Data kelas tidak ada</td>
                                    </tr>
                                    @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>
        </div>
    </div>

@endsection
