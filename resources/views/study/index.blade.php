@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addUnitModal">
                            Add Kajian
                        </button>
                        {{-- modal --}}
                        <div class="modal fade" tabindex="-1" id="addUnitModal" aria-labelledby="addUnitModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Kajian</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('study/store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Judul</label>
                                                <input type="text" class="form-control" id="judul" name="judul">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Link</label>
                                                <input type="text" class="form-control" id="link" name="link">
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
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Link</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studies as $data)
                                <tr>
                                    <td>{{ $data['judul'] }}</td>
                                    <td>{{ $data['deskripsi'] }}</td>
                                    {{-- <td>{{ $data['link'] }}</td> --}}
                                    <td>
                                        <iframe width="200" height="100" src="{{ $data->link }}" frameborder="0"
                                            allowfullscreen></iframe>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#editSliderModal">
                                            Edit
                                        </button>

                                        {{-- Modal --}}
                                        <div class="modal fade" tabindex="-1" id="editSliderModal"
                                            aria-labelledby="editSliderModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ url('/slider/update', encrypt($data['id'])) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Slider</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Judul</label>
                                                                <input type="text" class="form-control" id="judul"
                                                                    name="judul" value="{{ $data['judul'] }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Deskripsi</label>
                                                                <input type="text" class="form-control" id="deskripsi"
                                                                    name="deskripsi" value="{{ $data['deskripsi'] }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label">Gambar</label>
                                                                <input type="file" class="form-control" id="gambar"
                                                                    name="gambar">
                                                                <img src="{{ asset($data['gambar']) }}" alt=""
                                                                    height="100">
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <a href="{{ url('/study/delete', encrypt($data['id'])) }}" class="btn btn-danger"
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
