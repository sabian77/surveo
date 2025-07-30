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
        // Cek apakah user sudah mengisi survei
        if (!session('sudah_isi_survei')) {
            return redirect('/')->with('error', 'Anda harus mengisi survei terlebih dahulu.');
        }
        
        // Ambil data survei yang baru saja diisi (opsional)
        $survei = Kepuasan::find(session('sudah_isi_survei'));
        
        return view('result', compact('survei'));
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
    $validated = $request->validate([
            'kepuasan' => 'required',
            'masukan' => 'nullable|min:5|max:255',
            'bidang_id' => 'required',
        ], [
            'kepuasan.required' => 'Silakan pilih penilaian Anda.',
            'masukan.min' => 'Kritik dan saran minimal 5 karakter.',
            'masukan.max' => 'Kritik dan saran maksimal 255 karakter.',
            'bidang_id.required' => 'Silakan pilih bidang layanan.',
        ], [
            'kepuasan' => 'penilaian',
            'masukan' => 'kritik dan saran',
            'bidang_id' => 'bidang layanan',
        ]);


        // dd($validated);
        $kepuasan = Kepuasan::create($validated);
        
        // Set session dengan ID data yang baru dibuat
        session(['sudah_isi_survei' => $kepuasan->id]);


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
