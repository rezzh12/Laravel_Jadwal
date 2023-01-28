@extends('admin.layouts.master')
@section('title', 'Mata Pelajaran')
@section('judul', 'Data Mata Pelajaran')
@section('content')
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">{{ __('Pengelolaan Mata Pelajaran') }}</div>
            <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahJadwalModal"><i class="fa fa-plus"></i>
                    Tambah Data</button>
                    <hr />
                <table id="table-data" class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>Nama Mata Prlajaran</th>
                            <th>Semester</th>
                            <th>Jurusan</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no=1; @endphp
                        @foreach ($mapel as $mpl)
                            <tr>
                                <td class="text-center">{{ $no++ }}</td>
                                <td class="text-center">{{ $mpl->mapel}}</td>
                                <td class="text-center">{{ $mpl->semester}}</td>
                                <td>{{ $mpl->jurusans->jurusan }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-mapel" class="btn btn-success"
                                            data-toggle="modal" data-target="#editJadwalModal"
                                            data-id="{{ $mpl->id }}" style="margin-right:20px;">UBAH</button>
                                            
                                            {!! Form::open(['url' => 'admin/mapel/delete/'.$mpl->id, 'method' => 'POST']) !!}
                                        {{ Form::button('HAPUS', ['class' => 'btn btn-danger', 'onclick' => "deleteConfirmation('".$mpl->mapel."')"]) }}
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.mapel.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="mapel">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" name="mapel" id="mapel" required />
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input type="number" class="form-control" name="semester" id="semester" required />
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                           <select class="form-control" name="id_jurusan" id="jurusan">
                            @foreach($jurusan as $jr)
                            <option value="{{$jr->id}}">{{$jr->jurusan}}</option>
                            @endforeach
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
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.mapel.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                                <div class="form-group">
                                    <label for="edit-nama">Nama Mata Pelajaran</label>
                                    <input type="text" class="form-control" name="mapel" id="edit-mapel"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-jenis">Semester</label>
                                    <input type="number" class="form-control" name="semester" id="edit-semester"
                                        required />
                                </div>
                                <div class="form-group">
                            <label for="edit-jurusan">Jurusan</label>
                           <select class="form-control" name="id_jurusan" id="edit-jurusan">
                            @foreach($jurusan as $jr)
                            <option value="{{$jr->id}}">{{$jr->jurusan}}</option>
                            @endforeach
                           </select>
                               
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
            $(document).on('click', '#btn-edit-mapel', function() {
                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{ url('/admin/ajaxadmin/dataMapel') }}/" + id,
                    dataType: 'json',
                    success: function(res) {
                        $('#edit-mapel').val(res.mapel);
                        $('#edit-semester').val(res.semester);
                        $('#edit-jurusan').val(res.jurusan_id);
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
        function deleteConfirmation(mapel)
        {
            var form = event.target.form;
            Swal.fire({
                title: 'Apakah anda yakin?',
                icon: 'warning',
                html: "Anda akan menghapus data dengan nama <strong>"+mapel+"</strong> dan tidak dapat mengembalikannya kembali",
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
    </script>
    @stop