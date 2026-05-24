@extends('layouts.app')
@section('title', 'Kelola Laporan')
@section('content')
    <h2>️ Kelola Semua Laporan</h2>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    <div class="card mt-3">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Pelapor</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint->user->name }}</td>
                            <td>{{ $complaint->judul }}</td>
                            <td><span class="badge bg-secondary">{{ $complaint->status }}</span></td>
                            <td>{{ $complaint->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.complaints.edit', $complaint->id) }}" class="btn btn-sm btn-warning">Edit Status</a>
                                <form action="{{ route('admin.complaints.destroy', $complaint->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus laporan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection