
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <h1 class="text-center">Data Jadwal</h1>
    <p class="text-center">Laporan Jadwal Tahun 2022</p>
    <br />
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
                    </tbody>
                </table>
            </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
  </body>
</html>