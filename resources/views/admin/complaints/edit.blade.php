@extends('layouts.app')
@section('title', 'Edit Status Laporan')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Status & Tanggapan</div>
                <div class="card-body">
                    <form action="{{ route('admin.complaints.update', $complaint->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="proses" {{ $complaint->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ $complaint->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Tanggapan Admin</label>
                            <textarea name="tanggapan_admin" class="form-control" rows="3">{{ $complaint->tanggapan_admin }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('admin.complaints.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection