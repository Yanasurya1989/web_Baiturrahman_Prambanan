@extends('layouts.master') {{-- sesuaikan jika pakai layout lain --}}

@section('content')
    <div class="container">
        <h2>Daftar Program</h2>

        {{-- Flash message --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tombol Tambah Program --}}
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProgramModal">+ Tambah Program</button>

        {{-- Grid Layout --}}
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($programs as $program)
                    <div class="col-md-4 mb-4 d-flex">
                        <div class="card w-100" style="box-shadow: 0 2px 6px rgba(0,0,0,0.1); border-radius: 10px;">
                            <img src="{{ asset('storage/' . $program->image) }}" class="card-img-top"
                                style="height: 200px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;">

                            <div class="card-body">
                                <h5 class="card-title">{{ $program->title }}</h5>
                                <p class="card-text">{{ $program->subtitle }}</p>

                                <p style="margin-bottom: 5px;">
                                    <strong>Status:</strong>
                                    @if ($program->status === 'active')
                                        <span class="badge" style="background-color: #198754; color: white;">Active</span>
                                    @else
                                        <span class="badge"
                                            style="background-color: #dc3545; color: white;">Inactive</span>
                                    @endif
                                </p>

                                <span class="badge"
                                    style="background-color: 
                                  {{ $program->layout === 'big' ? '#0d6efd' : ($program->layout === 'half' ? '#ffc107' : '#0dcaf0') }}; 
                                   color: white;">
                                    {{ ucfirst($program->layout) }}
                                </span>

                                <form action="{{ route('programs.destroy', $program->id) }}" method="POST" class="mt-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm"
                                        style="background-color: #dc3545; color: white;">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                            <!-- Tombol Edit -->
                            <button class="btn btn-sm btn-warning mt-2" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $program->id }}">
                                Edit
                            </button>

                        </div>
                    </div>
                @endforeach
                @foreach ($programs as $program)
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal{{ $program->id }}" tabindex="-1"
                        aria-labelledby="editModalLabel{{ $program->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('programs.update', $program->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $program->id }}">Edit Program</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Title -->
                                        <div class="mb-3">
                                            <label class="form-label">Judul</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $program->title }}" required>
                                        </div>

                                        <!-- Subtitle -->
                                        <div class="mb-3">
                                            <label class="form-label">Sub Judul</label>
                                            <input type="text" name="subtitle" class="form-control"
                                                value="{{ $program->subtitle }}">
                                        </div>

                                        <!-- Status -->
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-select">
                                                <option value="active"
                                                    {{ $program->status == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="inactive"
                                                    {{ $program->status == 'inactive' ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Layout -->
                                        <div class="mb-3">
                                            <label class="form-label">Layout</label>
                                            <select name="layout" class="form-select">
                                                <option value="big" {{ $program->layout == 'big' ? 'selected' : '' }}>
                                                    Big</option>
                                                <option value="half" {{ $program->layout == 'half' ? 'selected' : '' }}>
                                                    Half</option>
                                                <option value="full" {{ $program->layout == 'full' ? 'selected' : '' }}>
                                                    Full</option>
                                            </select>
                                        </div>

                                        <!-- Gambar -->
                                        <div class="mb-3">
                                            <label class="form-label">Ganti Gambar (opsional)</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>

    {{-- Modal Tambah Program --}}
    <div class="modal fade" id="addProgramModal" tabindex="-1" aria-labelledby="addProgramModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('programs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProgramModalLabel">Tambah Program</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Sub Judul</label>
                            <input type="text" name="subtitle" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Gambar</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Layout</label>
                            <select name="layout" class="form-control" required>
                                <option value="big">Big</option>
                                <option value="half">Half</option>
                                <option value="full">Full</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="non-active">Non Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
