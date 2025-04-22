@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Pengaturan Tampilan Section</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered" id="section-table">
            <thead>
                <tr>
                    <th>Urutan</th>
                    <th>Nama Section</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="sortable-section">
                @foreach ($sections->sortBy('order') as $name => $section)
                    <tr data-section="{{ $name }}">
                        <td class="handle" style="cursor: grab;">☰</td>
                        <td>{{ ucfirst($name) }}</td>
                        <td>
                            <span id="status-{{ $name }}"
                                class="badge bg-{{ $section->status === 'active' ? 'success' : 'secondary' }}">
                                {{ $section->status }}
                            </span>
                        </td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" class="toggle-switch" data-section="{{ $name }}"
                                    {{ $section->status === 'active' ? 'checked' : '' }}>
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $('#sortable-section').sortable({
                handle: '.handle',
                update: function() {
                    let order = [];
                    $('#sortable-section tr').each(function() {
                        order.push($(this).data('section'));
                    });

                    fetch("{{ route('section-settings.order') }}", {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                order
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                console.log("Urutan berhasil diperbarui");
                            }
                        });
                }
            });

            $('.toggle-switch').on('change', function() {
                const section = $(this).data('section');

                fetch("{{ route('section-settings.toggle') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            section_name: section
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const statusEl = $('#status-' + data.section_name);
                            statusEl.text(data.new_status);
                            statusEl.removeClass('bg-success bg-secondary')
                                .addClass(data.new_status === 'active' ? 'bg-success' : 'bg-secondary');
                        } else {
                            alert('Gagal mengubah status.');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert('Terjadi kesalahan.');
                    });
            });
        });
    </script>
@endpush

@push('styles')
    <style>
        .handle {
            cursor: grab;
            font-size: 20px;
            text-align: center;
            width: 30px;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 24px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.slider {
            background-color: #28a745;
        }

        input:checked+.slider:before {
            transform: translateX(16px);
        }
    </style>
@endpush
