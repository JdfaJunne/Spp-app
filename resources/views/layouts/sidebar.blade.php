<li class="menu-title">MAIN</li>
   <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fas fa-pen"></i>
            <span>Master-Data</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('mapel.index') }}"> <i class=" fas fa-list "></i>Mata Pelajaran</a></li>
            <li><a href="{{ route('jurusan.index') }}"><i class=" fas fa-list "></i>Jurusan</a></li>
        </ul>
    </li>

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fas fa-users"></i>
            <span>Master-Relasi</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('kelas.index') }}"> <i class=" fas fa-list "></i>Kelas</a></li>
            <li><a href="{{ route('guru.index') }}"><i class=" fas fa-list "></i>Guru</a></li>
        </ul>
    </li>
