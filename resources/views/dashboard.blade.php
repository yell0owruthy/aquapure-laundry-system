@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<!-- Hero Welcome Banner -->
<div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-sky-500 via-blue-600 to-indigo-600 p-6 sm:p-8 text-white shadow-xl shadow-blue-600/20 mb-7">
    <div class="pointer-events-none absolute -top-16 -right-16 w-60 h-60 rounded-full bg-white/10 blur-2xl"></div>
    <div class="pointer-events-none absolute -bottom-20 left-1/3 w-56 h-56 rounded-full bg-sky-300/20 blur-2xl"></div>

    <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-5">
        <div>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/15 backdrop-blur-sm text-[11px] font-bold uppercase tracking-wider text-sky-50 mb-3">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-300 animate-pulse"></span>
                AquaPure Laundry &middot; {{ auth()->user()->role }}
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                Halo, {{ auth()->user()->name }}!
            </h1>
            <p class="text-sm text-sky-100/90 mt-1.5 max-w-xl">
                Pantau seluruh layanan cuci, status pengerjaan cucian, serta ringkasan pendapatan harian Anda di sini.
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2.5">
            <a href="{{ route('transaksi.create') }}"
               class="inline-flex items-center gap-2 bg-white text-blue-700 hover:bg-sky-50 font-bold text-xs sm:text-sm px-4 py-2.5 rounded-xl shadow-md transition-all hover:-translate-y-0.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                <span>Catat Transaksi</span>
            </a>

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('layanan.index') }}"
                   class="inline-flex items-center gap-2 bg-white/15 hover:bg-white/25 backdrop-blur-sm text-white border border-white/25 font-bold text-xs sm:text-sm px-4 py-2.5 rounded-xl transition-all">
                    <span>Kelola Layanan</span>
                </a>
            @endif
        </div>
    </div>
</div>

<!-- 4 KPI Stat Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-5 mb-7">
    <!-- Card 1: Jenis Layanan -->
    <div class="group bg-white dark:bg-slate-900/90 rounded-2xl p-5 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
        <div class="flex items-start justify-between gap-3">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400">Jenis Layanan</p>
                <p class="text-3xl font-extrabold text-slate-900 dark:text-white mt-2">{{ $totalLayanan }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Paket cuci tersedia</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-sky-100 dark:bg-sky-500/15 text-sky-600 dark:text-sky-400 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Card 2: Sedang Proses -->
    <div class="group bg-white dark:bg-slate-900/90 rounded-2xl p-5 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
        <div class="flex items-start justify-between gap-3">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400">Sedang Proses</p>
                <p class="text-3xl font-extrabold text-amber-600 dark:text-amber-400 mt-2">{{ $transaksiProses }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Cucian belum selesai</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-100 dark:bg-amber-500/15 text-amber-600 dark:text-amber-400 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Card 3: Transaksi Selesai -->
    <div class="group bg-white dark:bg-slate-900/90 rounded-2xl p-5 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
        <div class="flex items-start justify-between gap-3">
            <div>
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400">Transaksi Selesai</p>
                <p class="text-3xl font-extrabold text-emerald-600 dark:text-emerald-400 mt-2">{{ $transaksiSelesai }}</p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Siap diambil / lunas</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-100 dark:bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Card 4: Pendapatan Selesai -->
    <div class="group bg-white dark:bg-slate-900/90 rounded-2xl p-5 border border-slate-200/80 dark:border-slate-800 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200">
        <div class="flex items-start justify-between gap-3">
            <div class="min-w-0">
                <p class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-400">Pendapatan Selesai</p>
                <p class="text-2xl font-extrabold text-blue-600 dark:text-sky-400 mt-2 truncate">
                    Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                </p>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Total omzet terkonfirmasi</p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-100 dark:bg-blue-500/15 text-blue-600 dark:text-sky-400 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Transaksi Terbaru -->
<div class="bg-white dark:bg-slate-900/90 rounded-3xl shadow-sm border border-slate-200/80 dark:border-slate-800 overflow-hidden">
    <div class="px-6 py-5 border-b border-slate-100 dark:border-slate-800 flex flex-wrap items-center justify-between gap-3">
        <div>
            <h2 class="text-base sm:text-lg font-extrabold text-slate-900 dark:text-white">Transaksi Terbaru</h2>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">5 pesanan laundry terakhir yang masuk ke sistem.</p>
        </div>
        <a href="{{ route('transaksi.index') }}"
           class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-blue-50 dark:bg-blue-500/15 text-blue-700 dark:text-sky-400 hover:bg-blue-100 dark:hover:bg-blue-500/25 text-xs font-bold transition">
            <span>Lihat Semua</span>
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50/80 dark:bg-slate-800/60 text-slate-500 dark:text-slate-400 uppercase text-[11px] font-bold tracking-wider">
                <tr>
                    <th class="px-6 py-3.5">Pelanggan</th>
                    <th class="px-6 py-3.5">Layanan</th>
                    <th class="px-6 py-3.5">Berat</th>
                    <th class="px-6 py-3.5">Total Tarif</th>
                    <th class="px-6 py-3.5">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                @forelse($transaksiTerbaru as $trx)
                    <tr class="hover:bg-sky-50/40 dark:hover:bg-slate-800/40 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-sky-100 to-blue-100 dark:from-sky-900/60 dark:to-blue-900/60 text-blue-700 dark:text-sky-300 font-extrabold text-xs flex items-center justify-center shrink-0">
                                    {{ strtoupper(substr($trx->nama_pelanggan, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-slate-800 dark:text-white">{{ $trx->nama_pelanggan }}</p>
                                    <p class="text-xs text-slate-500 dark:text-slate-400">{{ $trx->no_hp }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-xs font-semibold">
                                {{ $trx->layanan->nama_layanan }}
                            </span>
                        </td>
                        <td class="px-6 py-4 font-semibold text-slate-700 dark:text-slate-300">
                            {{ $trx->berat }} kg
                        </td>
                        <td class="px-6 py-4 font-extrabold text-slate-900 dark:text-white">
                            Rp {{ number_format($trx->total_harga, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            @if($trx->status === 'Selesai')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 dark:bg-emerald-500/15 text-emerald-700 dark:text-emerald-300">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                    Selesai
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 dark:bg-amber-500/15 text-amber-700 dark:text-amber-300">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-pulse"></span>
                                    Proses
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="max-w-xs mx-auto">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-400 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <p class="text-sm font-bold text-slate-700 dark:text-slate-200">Belum ada transaksi masuk</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 mb-4">Mulai catat pesanan laundry pertama pelanggan Anda sekarang.</p>
                                <a href="{{ route('transaksi.create') }}"
                                   class="inline-flex items-center gap-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-4 py-2 rounded-xl transition">
                                    + Catat Transaksi Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection