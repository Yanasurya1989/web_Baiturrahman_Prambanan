@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <h1 class="h3 mb-4 text-gray-800">News List</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">News Management</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{ url('news/create') }}" class="btn btn-primary">Add News</a>
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
                                    <td>{{ \Illuminate\Support\Str::limit($data->judul, 30) }}</td>
                                    <td
                                        style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ \Illuminate\Support\Str::limit($data->deskripsi, 50) }}
                                    </td>
                                    <td>
                                        @if ($data->gambar)
                                            {{-- <img src="{{ $data->gambar }}" alt="Gambar" class="img-thumbnail"
                                                style="max-width: 100px;"> --}}

                                            <img src="{{ asset('storage/' . $data->gambar) }}" alt="Gambar"
                                                class="img-thumbnail" style="max-width: 100px;">
                                        @else
                                            <p>No Image</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('news/edit/' . $data->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ url('news/delete/' . $data->id) }}" method="POST"
                                            style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
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
