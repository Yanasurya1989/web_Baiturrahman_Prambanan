@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">Data</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Yayasan</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addLogoModal">
                            Add Logo Identity
                        </button>

                        {{-- Modal Add --}}
                        <div class="modal fade" id="addLogoModal" tabindex="-1" aria-labelledby="addLogoModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg"> {{-- pakai modal-lg biar muat --}}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Logo Identity</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('logos') }}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="name">Nama Institusi</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label for="image_path">Logo</label>
                                                <input type="file" class="form-control" id="image_path" name="image_path"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label for="address">Alamat</label>
                                                <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="phone">Nomor Telepon</label>
                                                <input type="text" class="form-control" id="phone" name="phone">
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email">
                                            </div>

                                            <div class="form-group">
                                                <label for="facebook">Facebook</label>
                                                <input type="text" class="form-control" id="facebook" name="facebook">
                                            </div>

                                            <div class="form-group">
                                                <label for="twitter">Twitter</label>
                                                <input type="text" class="form-control" id="twitter" name="twitter">
                                            </div>

                                            <div class="form-group">
                                                <label for="instagram">Instagram</label>
                                                <input type="text" class="form-control" id="instagram" name="instagram">
                                            </div>

                                            <div class="form-group">
                                                <label for="youtube">YouTube</label>
                                                <input type="text" class="form-control" id="youtube" name="youtube">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Table --}}
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Telp</th>
                                <th>Email</th>
                                <th>Facebook</th>
                                <th>Twitter</th>
                                <th>Instagram</th>
                                <th>Youtube</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logos as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#imageModal{{ $item->id }}">
                                            Lihat Foto
                                        </button>

                                        {{-- Modal Foto --}}
                                        <div class="modal fade" id="imageModal{{ $item->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Foto Testimonial</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('storage/' . $item->image_path) }}"
                                                            class="img-fluid" alt="Foto">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->facebook }}</td>
                                    <td>{{ $item->twitter }}</td>
                                    <td>{{ $item->instagram }}</td>
                                    <td>{{ $item->youtube }}</td>
                                    <td>
                                        <a href="{{ url('/logos/edit/' . $item->id) }}"
                                            class="btn btn-warning btn-sm mb-1">Edit</a>

                                        <form action="{{ url('/logos/delete/' . encrypt($item->id)) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
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
