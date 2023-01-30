@include('admin.layouts.header')
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
<nav id="navbar" class="navbar navbar-expand-lg  navbar-dark bg-dark  ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="image/WhatsApp Image 2022-09-22 at 14.37.01.jpeg" alt="Ophelia Film"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-pills ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link " aria-current="page" href="home">Home</a>
                </li>
                <li class="nav-item">
                <a  class="nav-link " aria-current="page" href="jadwal">Jadwal</a>
                </li>
                <li class="nav-item ">
                                <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off text-red"></i>
                                     {{ __('Logout') }}
                                            </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
            </ul>
            </div>
        </div>
        </nav> 

        @if($jadwal->isEmpty())
<div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Data Jadwal Mata Pelajaran') }}</div>
            <div class="card-body">
                
    </div>
@else
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Data Jadwal Mata Pelajaran') }}</div>
            <div class="card-body">
                    <hr />
                    <a href="{{ route('print.jadwal.jadwal1') }}" target="_blank" class="btn btn-secondary"><i
                        class="fas fa-print"></i> Cetak PDF</a>
                        <hr>
                        <form method="get" action="{{ route('jadwal.jadwal1') }}" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-2">
                        <select name="hari" id="hari" class="form-control filter-select" onchange="filter()">
                            <option value="">Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
</div>
<div class="col-md-2">
                        <button type="submit" class="btn btn-warning">Seleksi</button>
</form>
</div>
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($jadwal as $jdl)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center">{{ $jdl->jadwals->nip }}</td>
                                <td class="text-center">{{ $jdl->jadwals->nama_guru }}</td>
                                <td class="text-center">{{ $jdl->jadwal3->mapel}}</td>
                                <td class="text-center">{{ $jdl->jadwal2->nama_kelas}}</td>
                                <td class="text-center">{{ $jdl->hari}}</td>
                                <td class="text-center">{{ $jdl->jam_masuk}}</td>
                                <td class="text-center">{{ $jdl->jam_keluar}}</td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        let navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function(){
            let scroll = window.scrollY;

            if(scroll > 80){
                navbar.classList.add('navbar-white');
                navbar.classList.remove('navbar-dark');
            
            } else {
                navbar.classList.remove('navbar-white');
                navbar.classList.add('navbar-dark');
            }
        });
    </script>
  </body>
</html>
    @include('admin.layouts.footer')