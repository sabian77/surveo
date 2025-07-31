<?php

namespace App\Http\Controllers;

use App\Models\kepuasan;
use Illuminate\Http\Request;

class SurveiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!session('sudah_isi_survei')) {
            return redirect('/')->with('error', 'Anda harus mengisi survei terlebih dahulu.');
        }
    

        return view('result');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Ambil IP address dan tanggal hari ini
        $ipAddress = $request->ip();
        $today = date('Y-m-d');
        
        // 2. Cek apakah IP ini sudah mengisi survei hari ini
        $sudahIsi = Kepuasan::where('ip_address', $ipAddress)
                        ->where('tanggal_isi', $today)
                        ->exists();
        
        // 3. Jika sudah pernah isi, tolak
        if ($sudahIsi) {
            return redirect()->back()->with('error', 'Anda sudah mengisi survei hari ini. Silakan coba lagi besok.');
        }
        
        // 4. Validasi form
        $validated = $request->validate([
            'kepuasan' => 'required',
            'masukan' => 'nullable|min:5|max:255',
            'bidang_id' => 'required',
        ], [
            'kepuasan.required' => 'Silakan pilih penilaian Anda.',
            'masukan.min' => 'Kritik dan saran minimal 5 karakter.',
            'masukan.max' => 'Kritik dan saran maksimal 255 karakter.',
            'bidang_id.required' => 'Silakan pilih bidang layanan.',
        ]);

        // 5. Tambahkan IP dan tanggal
        $validated['ip_address'] = $ipAddress;
        $validated['tanggal_isi'] = $today;

        // 6. Simpan ke database
        Kepuasan::create($validated);
        
        // 7. Set session
        session(['sudah_isi_survei' => true]);
        
        return redirect('/result');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
