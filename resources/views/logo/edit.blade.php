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
                <form action="{{ route('logos.update', $logo) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label>Nama Logo</label>
                        <input type="text" name="name" class="form-control" value="{{ $logo->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label>Ganti Logo (Opsional)</label>
                        <input type="file" name="image" class="form-control">
                        <br>
                        <img src="{{ asset('storage/' . $logo->image_path) }}" width="100">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('logos.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection
