@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Halaman Struktur Organisasi</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Data Struktur</h6>
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addStructurModal">+ Tambah
                    Struktur</a>
            </div>
            <div class="card-body">
                {{-- Modal Tambah --}}
                <div class="modal fade" id="addStructurModal" tabindex="-1" aria-labelledby="addStructurModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ url('/structure/store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Struktur</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Sambutan</label>
                                        <input type="text" class="form-control" name="sambutan">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Link Sosmed (Opsional)</label>
                                        <input type="text" class="form-control" name="link_sosmed"
                                            placeholder="Contoh: https://instagram.com/namaakun">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Link Facebook (Opsional)</label>
                                        <input type="text" class="form-control" name="fb"
                                            placeholder="https://facebook.com/akun">
                                    </div>
                                    <div class="form-group">
                                        <label>Link Twitter (Opsional)</label>
                                        <input type="text" class="form-control" name="twitter"
                                            placeholder="https://twitter.com/akun">
                                    </div>
                                    <div class="form-group">
                                        <label>Link Instagram (Opsional)</label>
                                        <input type="text" class="form-control" name="instagram"
                                            placeholder="https://instagram.com/akun">
                                    </div>
                                    <div class="form-group">
                                        <label>Link Youtube (Opsional)</label>
                                        <input type="text" class="form-control" name="youtube"
                                            placeholder="https://youtube.com/akun">
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" class="form-control" name="gambar" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Tabel Data --}}
                <div class="table-responsive mt-4">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Sambutan</th>
                                {{-- <th>Link Sosmed</th> --}}
                                <th>Gambar</th>
                                <th>Link Sosmed Facebook</th>
                                <th>Link Sosmed Twitter</th>
                                <th>Link Sosmed Instagram</th>
                                <th>Link Sosmed Youtube</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($structures as $data)
                                <tr>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->jabatan }}</td>
                                    <td>{{ $data->sambutan }}</td>
                                    {{-- <td>
                                        @if ($data->link_sosmed)
                                            <a href="{{ $data->link_sosmed }}" target="_blank">Lihat</a>
                                        @else
                                            -
                                        @endif
                                    </td> --}}
                                    <td>
                                        <button class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#modalLihatGambar{{ $data->id }}">
                                            Lihat
                                        </button>

                                        {{-- Modal Gambar --}}
                                        <div class="modal fade" id="modalLihatGambar{{ $data->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Gambar Struktur</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset($data->gambar) }}" class="img-fluid"
                                                            alt="Struktur Gambar">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $data->fb ?? '-' }}</td>
                                    <td>{{ $data->twitter ?? '-' }}</td>
                                    <td>{{ $data->instagram ?? '-' }}</td>
                                    <td>{{ $data->youtube ?? '-' }}</td>
                                    <td>
                                        {{-- Edit Button --}}
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editStructurModal{{ $data->id }}">
                                            Edit
                                        </button>

                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="editStructurModal{{ $data->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ url('/structure/update', encrypt($data->id)) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Struktur</h5>
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <input type="text" class="form-control" name="nama"
                                                                    value="{{ $data->nama }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jabatan</label>
                                                                <input type="text" class="form-control" name="jabatan"
                                                                    value="{{ $data->jabatan }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Sambutan</label>
                                                                <input type="text" class="form-control"
                                                                    name="sambutan" value="{{ $data->sambutan }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Link Sosmed</label>
                                                                <input type="text" class="form-control"
                                                                    name="link_sosmed" value="{{ $data->link_sosmed }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Link Facebook</label>
                                                                <input type="text" class="form-control" name="fb"
                                                                    value="{{ $data->fb }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Link Twitter</label>
                                                                <input type="text" class="form-control" name="twitter"
                                                                    value="{{ $data->twitter }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Link Instagram</label>
                                                                <input type="text" class="form-control"
                                                                    name="instagram" value="{{ $data->instagram }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Link Youtube</label>
                                                                <input type="text" class="form-control" name="youtube"
                                                                    value="{{ $data->youtube }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Gambar</label>
                                                                <input type="file" class="form-control"
                                                                    name="gambar">
                                                                <img src="{{ asset($data->gambar) }}" class="mt-2"
                                                                    height="100" alt="Preview">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        {{-- Tombol Hapus --}}
                                        <a href="{{ url('/structure/delete', encrypt($data->id)) }}"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
