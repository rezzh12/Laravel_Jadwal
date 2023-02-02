@extends('admin.layouts.master')
@section('title', 'Jadwal')
@section('judul', 'Data Jadwal')
@section('content')
@foreach ($user->unreadNotifications as $notification)
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      {{ $notification->data['pesan']}} <strong> {{ $notification->data['name']}} </strong>
                      {!! Form::open(['url' => 'admin/jadwal/markAsRead/'.$notification->id, 'method' => 'POST']) !!}
                                        {{ Form::button('Baca', ['class' => 'btn btn-danger', 'onclick' => "markAsRead('".$notification->id."')"]) }}
                                    {!! Form::close() !!}
                      </div>
                      {{-- {{ $notification->markAsRead() }} --}}
                    @endforeach
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Data Jadwal') }}
            </div>
            <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahJadwalModal"><i class="fa fa-plus"></i>
                    Tambah Data</button>
                    <a href="{{ route('admin.print.jadwal.jadwal1') }}" target="_blank" class="btn btn-secondary"><i
                        class="fas fa-print"></i> Cetak PDF</a>
                        <hr>
                        <form method="get" action="{{ route('admin.guru.kelas.mapel.jadwal.jadwal1') }}" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-md-2">
                        <select name="hari" id="hari" class="form-control filter-select" onchange="filter()">
                            <option value="">Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                </div>
                <div class="col-md-2">
                                        <button type="submit" class="btn btn-warning">Seleksi</button>
                </form>
                </div>
                <table id="datatable" class="table table-bordered">
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
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
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
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" id="btn-edit-jadwal" class="btn btn-success"
                                            data-toggle="modal" data-target="#editJadwalModal"
                                            data-id="{{ $jdl->id }}" style="margin-right:20px;">UBAH</button>
                                            
                                            {!! Form::open(['url' => 'admin/jadwal/delete/'.$jdl->id, 'method' => 'POST']) !!}
                                        {{ Form::button('HAPUS', ['class' => 'btn btn-danger', 'onclick' => "deleteConfirmation('".$jdl->jadwals->nama_guru."')"]) }}
                                    {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tambah Jadwal -->
    <div class="modal fade" id="tambahJadwalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.jadwal.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="guru">Guru</label>
                           <select class="form-control" name="guru" id="guru">
                            @foreach($guru as $gr)
                            <option value="{{$gr->id}}">{{$gr->nama_guru}}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="mapel">Mata Pelajaran</label>
                           <select class="form-control" name="mapel" id="mapel">
                            @foreach($mapel as $mpl)
                            <option value="{{$mpl->id}}">{{$mpl->mapel}}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas">kelas</label>
                           <select class="form-control" name="kelas" id="kelas">
                            @foreach($kelas as $kls)
                            <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                            @endforeach
                           </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select name="hari" id="hari" class="form-control filter-select">
                            <option value="">Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="jam_masuk">Jam Masuk</label>
                            <input type="time" class="form-control" name="jam_masuk" id="jam_masuk" required />
                        </div>
                        <div class="form-group">
                            <label for="jam_keluar">Jam Keluar</label>
                            <input type="time" class="form-control" name="jam_keluar" id="jam_keluar" required />
                        </div>
                        </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Ubah Data-->
     <!-- UBAH DATA -->
     <div class="modal fade" id="editJadwalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <form method="post" action="{{ route('admin.jadwal.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-guru">Guru</label>
                           <select class="form-control" name="guru" id="edit-guru">
                            @foreach($guru as $gr)
                            <option value="{{$gr->id}}">{{$gr->nama_guru}}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-mapel">Mata Pelajaran</label>
                           <select class="form-control" name="mapel" id="edit-mapel">
                            @foreach($mapel as $mpl)
                            <option value="{{$mpl->id}}">{{$mpl->mapel}}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-kelas">kelas</label>
                           <select class="form-control" name="kelas" id="edit-kelas">
                            @foreach($kelas as $kls)
                            <option value="{{$kls->id}}">{{$kls->nama_kelas}}</option>
                            @endforeach
                           </select>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="edit-hari">Hari</label>
                            <input type="day" class="form-control" name="hari" id="edit-hari" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-jam_masuk">Jam Masuk</label>
                            <input type="time" class="form-control" name="jam_masuk" id="edit-jam_masuk" required />
                        </div>
                        <div class="form-group">
                            <label for="edit-jam_keluar">Jam Keluar</label>
                            <input type="time" class="form-control" name="jam_keluar" id="edit-jam_keluar" required />
                        </div>
                     </div>
                        

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="edit-id" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
$(function() {
            $(document).on('click', '#btn-edit-jadwal', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ url('/admin/ajaxadmin/dataJadwals') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-guru').val(res.guru_id);
                        $('#edit-mapel').val(res.mapel_id);
                        $('#edit-kelas').val(res.kelas_id);
                        $('#edit-id').val(res.id);
                        $('#edit-hari').val(res.hari);
                        $('#edit-jam_masuk').val(res.jam_masuk);
                        $('#edit-jam_keluar').val(res.jam_keluar);
                    },
                });
            });
        });

        @if(session('status'))
            Swal.fire({
                title: 'Selamat!',
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
                title: 'kesalahan',
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
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus saja!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        }
        function markAsRead(id)
        {
            var form = event.target.form;
            Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                html: "Anda akan mambaca data dengan id <strong>"+id+"</strong> dan tidak dapat mengembalikannya kembali",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, baca saja saja!',
            }). then((result) => {
                if(result.value) {
                    form.submit();
                }
            });
        }

    </script>

    @stop