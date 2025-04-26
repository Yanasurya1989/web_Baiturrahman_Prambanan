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
                                    <td>{{ $data->short_title }}</td>
                                    <td>{{ $data->short_description }}</td>
                                    <td>
                                        <iframe width="200" height="100" src="{{ $data->video_url }}" frameborder="0"
                                            allowfullscreen></iframe>
                                    </td>
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
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#editAboutModal{{ $data->id }}">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editAboutModal{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="editAboutModalLabel{{ $data->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form action="{{ route('about.update', $data->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editAboutModalLabel{{ $data->id }}">Edit About
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="judul">Judul</label>
                                                                <input type="text" class="form-control" name="title"
                                                                    value="{{ $data->title }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi">Deskripsi</label>
                                                                <textarea class="form-control" name="description" rows="3">{{ $data->description }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="video_url">Video URL</label>
                                                                <input type="text" class="form-control"
                                                                    name="video_url" value="{{ $data->video_url }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="gambar">Gambar</label>
                                                                <input type="file" class="form-control"
                                                                    name="image">
                                                                <img src="{{ asset($data->image) }}" alt=""
                                                                    height="100" class="mt-2">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <form action="{{ route('about.destroy', $data->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Yakin akan dihapus?')">Hapus</button>
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
