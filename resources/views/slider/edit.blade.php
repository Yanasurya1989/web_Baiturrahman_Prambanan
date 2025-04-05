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
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                {{-- <form action="{{ url('/slider/update', encrypt($data['id'])) }}" --}}
                <form action="{{ url('slider/update/' . $header->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id"
                            value="{{ $header['id'] }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            value="{{ $header['judul'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                            value="{{ $header['deskripsi'] }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                        <img src="{{ asset($header['gambar']) }}" alt="" height="150" class="mt-4">
                    </div>
                    <button type="submit" class="btn btn-warning form-control">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
