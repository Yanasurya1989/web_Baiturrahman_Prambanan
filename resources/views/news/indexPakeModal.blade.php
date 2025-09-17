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
                            Add News
                        </button>

                        {{-- Modal Add News --}}
                        <div class="modal fade" tabindex="-1" id="addUnitModal" aria-labelledby="addUnitModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add News</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('news/store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="judul">Judul</label>
                                                <input type="text" class="form-control" id="judul" name="judul">
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                                            </div>
                                            <div class="form-group">
                                                <label for="gambar">Gambar</label>
                                                <input type="file" class="form-control" id="gambar" name="gambar">
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
                        {{-- End Modal --}}
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $data)
                                <tr>
                                    <td>{{ $data->judul }}</td>
                                    <td style="position: relative; max-width: 200px; overflow: hidden;">
                                        <p style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-bottom: 0;"
                                            onmouseover="this.nextElementSibling.style.display='block';"
                                            onmouseout="this.nextElementSibling.style.display='none';">
                                            {{ \Illuminate\Support\Str::limit($data->deskripsi, 10) }}
                                        </p>
                                        <span
                                            style="display: none;
                                           position: absolute;
                                           background: rgba(0, 0, 0, 0.85);
                                           color: #fff;
                                           padding: 8px;
                                           border-radius: 4px;
                                           top: 100%;
                                           left: 0;
                                           width: max-content;
                                           max-width: 300px;
                                           z-index: 999;
                                           white-space: normal;">
                                            {{ $data->deskripsi }}
                                        </span>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#imageModal{{ $data->id }}">
                                            Lihat Gambar
                                        </button>

                                        {{-- Modal View Image --}}
                                        <div class="modal fade" tabindex="-1" id="imageModal{{ $data->id }}"
                                            aria-labelledby="imageModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">View Image</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        @if ($data->gambar)
                                                            <img src="{{ asset('storage/' . $data->gambar) }}"
                                                                alt="Gambar" class="img-fluid">
                                                        @else
                                                            <p>No Image Uploaded</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- End Modal --}}
                                    </td>
                                    <td>
                                        <!-- Add edit/delete logic if needed -->
                                        <form action="{{ url('news/delete/' . $data->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?');">
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
