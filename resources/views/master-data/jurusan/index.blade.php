@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-5">
        <div class="row">
            <h3 class="text-white">DASHBOARD</h3>
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

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('jurusan.create') }}" class="btn btn-md btn-primary mb-3 float-right">Tambah Mata Pelajaran</a>

                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Mata-Pelajaran</th>
                                    <th scope="col">Dibuat pada tanggal</th>
                                    <th class="text-center" scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jurusans as $jurusan)
                                <tr>
                                    <td>{{ $jurusan->nama }}</td>
                                    <td>{{ $jurusan->created_at->format('d-m-Y') }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('jurusan.destroy', $jurusan->id) }}" method="POST">
                                            <a href="{{ route('jurusan.edit', $jurusan->id) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt "></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data mata pelajaran tidak ada</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>


@endsection
