<?php

namespace App\Http\Controllers;

use App\Models\LayananPosyandu;
use Illuminate\Http\Request;

class LayananPosyanduController extends Controller
{
    public function index()
    {
        // Ambil semua data layanan posyandu
        $layanans = LayananPosyandu::latest()->get();

        // Hitung ringkasan statistik
        $total = $layanans->count();
        $rataBerat = $layanans->avg('berat') ?? 0;
        $rataTinggi = $layanans->avg('tinggi') ?? 0;
        $totalVitamin = $layanans->where('vitamin', '!=', 'Tidak Diberikan')->count();

        // Kirim data ke view
        return view('guest.index', compact('layanans', 'total', 'rataBerat', 'rataTinggi', 'totalVitamin'));
    }

    public function create()
    {
        // Tampilkan form tambah layanan
        return view('guest.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jadwal_id' => 'required|numeric',
            'warga_id' => 'required|numeric',
            'berat' => 'required|numeric',
            'tinggi' => 'required|numeric',
            'vitamin' => 'required|string|max:100',
            'konseling' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        LayananPosyandu::create([
            'jadwal_id' => $request->jadwal_id,
            'warga_id' => $request->warga_id,
            'berat' => $request->berat,
            'tinggi' => $request->tinggi,
            'vitamin' => $request->vitamin,
            'konseling' => $request->konseling,
        ]);

        return redirect()->route('layanan.index')->with('success', 'Data layanan posyandu berhasil ditambahkan!');
    }

    public function edit($layanan_id)
    {
        $layanan = LayananPosyandu::findOrFail($layanan_id);
        return view('guest.edit', compact('layanan'));
    }

    public function update(Request $request, $layanan_id)
    {
        $layanan = LayananPosyandu::findOrFail($layanan_id);

        $request->validate([
            'berat' => 'required|numeric',
            'tinggi' => 'required|numeric',
            'vitamin' => 'required|string|max:100',
            'konseling' => 'required|string|max:255',
        ]);

        $layanan->update([
            'berat' => $request->berat,
            'tinggi' => $request->tinggi,
            'vitamin' => $request->vitamin,
            'konseling' => $request->konseling,
        ]);

        return redirect()->route('layanan.index')->with('success', 'Data layanan posyandu berhasil diperbarui!');
    }

    public function destroy($layanan_id)
    {
        $layanan = LayananPosyandu::findOrFail($layanan_id);
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Data layanan posyandu berhasil dihapus!');
    }
}
