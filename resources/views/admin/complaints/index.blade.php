@extends('layouts.app')

@section('title', 'Daftar Laporan')

@section('content')
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
@endsection