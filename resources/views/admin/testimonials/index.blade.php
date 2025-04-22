@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Data Testimonial</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Testimonial</h6>
                <a href="{{ route('testimonials.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Tambah Testimonial
                </a>
            </div>

            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Profesi</th>
                                <th>Pesan</th>
                                <th class="text-center" style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testimonials as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="Foto"
                                            class="img-thumbnail" style="width: 70px; height: 70px; object-fit: cover;">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->profession }}</td>
                                    <td>{{ $item->message }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('testimonials.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('testimonials.destroy', $item->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus testimonial ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data testimonial.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-3">
                    {{ $testimonials->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
