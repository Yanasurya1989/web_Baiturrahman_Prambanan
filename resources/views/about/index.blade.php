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
                            Add Halaman About
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
                                        <form action="{{ url('about/store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="form-label">Judul</label>
                                                <input type="text" class="form-control" id="title" name="title">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                                                <input type="text" class="form-control" id="description"
                                                    name="description">
                                            </div>

                                            <div class="mb-3">
                                                <label for="header_image" class="form-label">Image</label>
                                                <input type="file" class="form-control" id="header_image"
                                                    name="header_image" accept="image/*">
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Link</label>
                                                <input type="text" class="form-control" id="video_url" name="video_url">
                                            </div>

                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="active">Active</option>
                                                    <option value="non-active">Non-Active</option>
                                                </select>
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
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($abouts as $data)
                                <tr>
                                    <td>{{ $data['title'] }}</td>
                                    <td>{{ $data['description'] }}</td>
                                    <td>{{ $data['video_url'] }}</td>
                                    <td>
                                        <form action="{{ route('about.toggleStatus', $data->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn btn-sm {{ $data->status == 'active' ? 'btn-success' : 'btn-danger' }}">
                                                {{ $data->status == 'active' ? 'Active' : 'Non-Active' }}
                                            </button>
                                        </form>
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
                                                <form action="#" method="POST" enctype="multipart/form-data">
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
                                        <a href="#" class="btn btn-danger"
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
