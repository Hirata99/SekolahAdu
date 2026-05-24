@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('content')

    <form action="{{ route('complaints.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" 
                    placeholder="Cari judul laporan..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary w-100">🔍 Filter</button>
            </div>
        </div>
    </form>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📋 Laporan Saya</h2>
        <a href="{{ route('complaints.create') }}" class="btn btn-primary">+ Buat Laporan</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($complaints as $complaint)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $complaint->judul }}</td>
                            <td>{{ $complaint->lokasi }}</td>
                            <td>
                                <span class="badge bg-{{ $complaint->status === 'selesai' ? 'success' : ($complaint->status === 'proses' ? 'info' : 'warning') }}">
                                    {{ ucfirst($complaint->status) }}
                                </span>
                            </td>
                            <td>{{ $complaint->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('complaints.show', $complaint->id) }}" class="btn btn-sm btn-info">Detail</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada laporan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $complaints->links('pagination::bootstrap-5') }}
    </div>
@endsection
@push('scripts')
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                timer: 3000,
            });
        </script>
    @endif
@endpush