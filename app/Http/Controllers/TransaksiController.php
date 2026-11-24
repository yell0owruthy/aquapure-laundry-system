<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $query = Transaksi::with(['layanan', 'user'])->latest();

        if (in_array($status, ['Proses', 'Selesai'])) {
            $query->where('status', $status);
        }

        $transaksis = $query->get();
        $totalPendapatanSelesai = Transaksi::where('status', 'Selesai')->sum('total_harga');
        $totalPendapatanSemua = Transaksi::sum('total_harga');

        return view('transaksi.index', compact(
            'transaksis',
            'status',
            'totalPendapatanSelesai',
            'totalPendapatanSemua'
        ));
    }

    public function create()
    {
        $layanans = Layanan::orderBy('harga_per_kg')->get();
        return view('transaksi.create', compact('layanans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => ['required', 'string', 'max:100'],
            'no_hp' => ['required', 'string', 'max:20'],
            'layanan_id' => ['required', 'exists:layanans,id'],
            'berat' => ['required', 'numeric', 'min:0.5'],
        ]);

        $layanan = Layanan::findOrFail($validated['layanan_id']);
        $totalHarga = (int) round($layanan->harga_per_kg * $validated['berat']);

        Transaksi::create([
            'layanan_id' => $layanan->id,
            'user_id' => Auth::id(),
            'nama_pelanggan' => $validated['nama_pelanggan'],
            'no_hp' => $validated['no_hp'],
            'berat' => $validated['berat'],
            'total_harga' => $totalHarga,
            'status' => 'Proses',
        ]);

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi laundry berhasil dicatat.');
    }

    public function selesai(Transaksi $transaksi)
    {
        $transaksi->update(['status' => 'Selesai']);

        return redirect()->route('transaksi.index')
            ->with('success', 'Status transaksi berhasil diubah menjadi Selesai.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Data transaksi berhasil dihapus.');
    }

    public function struk(Transaksi $transaksi)
    {
        $transaksi->load(['layanan', 'user']);
        return view('transaksi.struk', compact('transaksi'));
    }
}
