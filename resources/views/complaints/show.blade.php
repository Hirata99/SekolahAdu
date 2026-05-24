@extends('layouts.app')

@section('title', 'Detail Laporan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ $complaint->judul }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $complaint->lokasi }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $complaint->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge bg-{{ $complaint->status === 'selesai' ? 'success' : ($complaint->status === 'proses' ? 'info' : 'warning') }}">
                                    {{ ucfirst($complaint->status) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $complaint->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                        @if($complaint->tanggapan_admin)
                            <tr>
                                <th>Tanggapan Admin</th>
                                <td>{{ $complaint->tanggapan_admin }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="col-md-4">
                    @if($complaint->foto)
                        <img src="{{ asset('storage/' . $complaint->foto) }}" class="img-fluid rounded" alt="Foto Kerusakan">
                    @else
                        <div class="alert alert-secondary">Tidak ada foto</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('complaints.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection