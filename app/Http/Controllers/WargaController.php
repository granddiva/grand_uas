<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wargas = Warga::latest()->get();
        return view('guest/warga.index', compact('wargas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guest/warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|unique:wargas,nik|max:16',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'nullable|string|max:15',
        ]);

        Warga::create($request->all());

        return redirect()->route('warga.index')
            ->with('success', 'Data Warga berhasil ditambahkan.');
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
        return view('warga.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warga $warga)
    {
        $request->validate([
            // nik harus unik, kecuali NIK milik warga yang sedang diedit
            'nik' => 'required|string|max:16|unique:wargas,nik,' . $warga->id,
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'nullable|string|max:15',
        ]);

        $warga->update($request->all());

        return redirect()->route('warga.index')
            ->with('success', 'Data Warga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warga $warga)
    {
        $warga->delete();

        return redirect()->route('warga.index')
            ->with('success', 'Data Warga berhasil dihapus.');
    }
}
