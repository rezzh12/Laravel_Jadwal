@extends('kepsek.layouts.master')
@section('title', 'Jadwal')
@section('judul', 'Data Jadwal')
@section('content')

@if($jadwal->isEmpty())
<div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Data Jadwal') }}</div>
            <div class="card-body">
                
    </div>
@else
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Data Jadwal') }}</div>
            <div class="card-body">
            <a href="{{ route('kepsek.print.jadwal.jadwal1') }}" target="_blank" class="btn btn-secondary"><i
                        class="fas fa-print"></i> Cetak PDF</a>
                        <hr>
            <form method="get" action="{{ route('kepsek.jadwal.jadwal1') }}" enctype="multipart/form-data">
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

    
    @stop

    @section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
$(function() {
            $(document).on('click', '#btn-edit-mapel', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ url('/admin/ajaxadmin/dataJadwal') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-mapel').val(res.mapel);
                        $('#edit-semester').val(res.semester);
                        $('#edit-id').val(res.id);
                    },
                });
            });
        });

        @if(session('status'))
            Swal.fire({
                title: 'Congratulations!',
                text: "{{ session('status') }}",
                icon: 'Success',
                timer: 3000
            })
        @endif
        @if($errors->any())
            @php
                $message = '';
                foreach($errors->all() as $error)
                {
                    $message .= $error."<br/>";
                }
            @endphp
            Swal.fire({
                title: 'Error',
                html: "{!! $message !!}",
                icon: 'error',
            })
        @endif
        function deleteConfirmation(nama)
        {
            var form = event.target.form;
            Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                html: "Anda akan menghapus data dengan nama <strong>"+nama+"</strong> dan tidak dapat mengembalikannya kembali",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus saja!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        }
    </script>

    @stop