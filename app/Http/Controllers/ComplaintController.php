<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = auth()->user()->complaints()->latest()->get();
        return view('complaints.index', compact('complaints'));
    }

    public function adminIndex()
    {
        $complaints = Complaint::with('user')->latest()->get();
        return view('admin.complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('complaints.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'lokasi' => 'required|max:100',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|max:2048', // Max 2MB
        ]);

        // 2. Handle Upload Foto (Jika ada)
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        // 3. Tambahkan data otomatis
        $validated['user_id'] = Auth::id();
        $validated['status'] = 'pending';

        // 4. Simpan ke Database
        Complaint::create($validated);

        // 5. Redirect dengan pesan sukses
        return redirect()->route('complaints.index')->with('success', 'Laporan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        return view('complaints.show', compact('complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
