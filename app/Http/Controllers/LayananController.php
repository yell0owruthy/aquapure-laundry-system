<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::latest()->get();
        return view('layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan' => ['required', 'string', 'max:100'],
            'harga_per_kg' => ['required', 'integer', 'min:1000'],
            'estimasi' => ['required', 'string', 'max:50'],
        ]);

        Layanan::create($validated);

        return redirect()->route('layanan.index')
            ->with('success', 'Data layanan berhasil ditambahkan.');
    }

    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $validated = $request->validate([
            'nama_layanan' => ['required', 'string', 'max:100'],
            'harga_per_kg' => ['required', 'integer', 'min:1000'],
            'estimasi' => ['required', 'string', 'max:50'],
        ]);

        $layanan->update($validated);

        return redirect()->route('layanan.index')
            ->with('success', 'Data layanan berhasil diperbarui.');
    }

    public function destroy(Layanan $layanan)
    {
        if ($layanan->transaksis()->exists()) {
            return redirect()->route('layanan.index')
                ->with('error', 'Layanan tidak dapat dihapus karena masih digunakan pada transaksi.');
        }

        $layanan->delete();

        return redirect()->route('layanan.index')
            ->with('success', 'Data layanan berhasil dihapus.');
    }
}