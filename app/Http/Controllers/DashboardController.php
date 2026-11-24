<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLayanan = Layanan::count();
        $transaksiProses = Transaksi::where('status', 'Proses')->count();
        $transaksiSelesai = Transaksi::where('status', 'Selesai')->count();
        $totalPendapatan = Transaksi::where('status', 'Selesai')->sum('total_harga');
        $transaksiTerbaru = Transaksi::with('layanan')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalLayanan',
            'transaksiProses',
            'transaksiSelesai',
            'totalPendapatan',
            'transaksiTerbaru'
        ));
    }
}