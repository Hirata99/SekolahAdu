@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h2>👨‍ Dashboard Admin</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h3>{{ \App\Models\Complaint::where('status', 'pending')->count() }}</h3>
                    <p>Pending</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h3>{{ \App\Models\Complaint::where('status', 'proses')->count() }}</h3>
                    <p>Proses</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h3>{{ \App\Models\Complaint::where('status', 'selesai')->count() }}</h3>
                    <p>Selesai</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.complaints.index') }}" class="btn btn-primary">Kelola Semua Laporan</a>
    </div>
@endsection