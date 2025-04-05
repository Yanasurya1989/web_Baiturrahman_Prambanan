@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Logo</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <h2>Daftar Logo</h2>
            <a href="{{ route('logos.create') }}" class="btn btn-primary">Tambah Logo</a>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                            data-target="#addSliderModal">
                            Add Slider
                        </button>
                        {{-- modal --}}
                        <div class="modal fade" tabindex="-1" id="addSliderModal" aria-labelledby="addSliderModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Slider</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('logos.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label>Nama Logo</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            <div class="mb-3">
                                                <label>Upload Logo</label>
                                                <input type="file" name="image" class="form-control" required>
                                            </div>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                            <a href="{{ route('logos.index') }}" class="btn btn-secondary">Kembali</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Logo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logos as $logo)
                                <tr>
                                    <td>{{ $logo->name }}</td>
                                    <td><img src="{{ asset('storage/' . $logo->image_path) }}" width="100"></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#imageModal{{ $data['id'] }}">
                                            Lihat Gambar
                                        </button>

                                        {{-- Modal --}}
                                        <div class="modal fade" tabindex="-1" id="imageModal{{ $data['id'] }}"
                                            aria-labelledby="addSliderModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">View Slider</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset($data['gambar']) }}" class="img-fluid"
                                                            alt="">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>

                                        {{-- <a href="/slider/edit/{{ $data->id }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ url('/slider/delete', encrypt($data['id'])) }}" class="btn btn-danger"
                                            onclick="return confirm('Yakin akan dihapus?')">Hapus</a> --}}

                                        <a href="{{ route('logos.edit', $logo) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('logos.destroy', $logo) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Hapus logo ini?')">Hapus</button>
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
