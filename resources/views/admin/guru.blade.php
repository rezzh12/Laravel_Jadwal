@extends('admin.layouts.master')
@section('title', 'Guru')
@section('judul', 'Data Guru')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Data Guru') }}</div>
            <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahJadwalModal"><i class="fa fa-plus"></i>
                    Tambah Data</button>
                    <hr />
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($guru as $gr)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center">{{ $gr->nip }}</td>
                                <td class="text-center">{{ $gr->nama_guru}}</td>
                                <td class="text-center">{{ $gr->alamat}}</td>
                                <td class="text-center">{{ $gr->jenis_kelamin}}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-jadwal" class="btn btn-success"
                                            data-toggle="modal" data-target="#editJadwalModal"
                                            data-id="{{ $gr->id }}" style="margin-right:20px;">UBAH</button>
                                            
                                            {!! Form::open(['url' => 'admin/guru/delete/'.$gr->id, 'method' => 'POST']) !!}
                                        {{ Form::button('HAPUS', ['class' => 'btn btn-danger', 'onclick' => "deleteConfirmation('".$gr->nama."')"]) }}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.guru.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="jenis_kegiatan">NIP</label>
                            <input type="number" class="form-control" name="nip" id="nip" required />
                        </div>
                        <div class="form-group">
                            <label for="nama_kegiatan">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" required />
                        </div>
                        <div class="form-group">
                            <label for="nama_kegiatan">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required />
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jenis Kelamin</label>
                           <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                           </select>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.guru.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="jenis_kegiatan">NIP</label>
                            <input type="number" class="form-control" name="nip" id="edit-nip" required />
                        </div>
                        <div class="form-group">
                            <label for="nama_kegiatan">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="edit-nama" required />
                        </div>
                        <div class="form-group">
                            <label for="nama_kegiatan">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="edit-alamat" required />
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jenis Kelamin</label>
                           <select class="form-control" name="jenis_kelamin" id="edit-jenis_kelamin">
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                           </select>
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
                    url: "{{ url('/admin/ajaxadmin/dataGuru') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-nip').val(res.nip);
                        $('#edit-nama').val(res.nama_guru);
                        $('#edit-alamat').val(res.alamat);
                        $('#edit-jenis_kelamin').val(res.jenis_kelamin);
                        $('#edit-id').val(res.id);
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