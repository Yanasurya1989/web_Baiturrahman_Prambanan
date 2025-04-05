@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Logo</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSliderModal">
                            Add Logo
                        </button>
                        {{-- modal --}}
                        <div class="modal fade" tabindex="-1" id="addSliderModal" aria-labelledby="addSliderModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Logo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('logos/post') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Gambar</label>
                                                <input type="file" class="form-control" id="image_path"
                                                    name="image_path">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
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
                                <th>Gambar</th>
                                <th>Name</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($logos as $data)
                                <tr>
                                    <td>{{ $data['name'] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#imageModal{{ $data['id'] }}">
                                            Lihat Gambar
                                        </button>

                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-bs-target="#imageModal{{ $data['id'] }}">
                                            Lihat Gambar
                                        </button> --}}


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
                                                        {{-- <img src="{{ asset($data['image_path']) }}" class="img-fluid"
                                                            alt=""> --}}

                                                        {{-- <img src="{{ asset('storage/' . $data->image_path) }}"
                                                            alt="" height="150" class="mt-4"> --}}

                                                        <img src="{{ asset('storage/' . $data->image_path) }}"
                                                            class="img-fluid" alt="Gambar Tidak Ditemukan">


                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/logos/edit/{{ $data->id }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ url('/logos/delete', encrypt($data['id'])) }}" class="btn btn-danger"
                                            onclick="return confirm('Yakin akan dihapus?')">Hapus</a>
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
