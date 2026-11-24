@extends('layouts.app')
@section('title', 'Rekap Transaksi Laundry')

@section('content')
<!-- Header Section -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 dark:text-white">Rekap Transaksi Laundry</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Pantau pesanan masuk, perbarui status cucian, dan cek laporan keuangan.</p>
    </div>
    <a href="{{ route('transaksi.create') }}"
       class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl shadow-md shadow-blue-600/25 hover:shadow-lg hover:-translate-y-0.5 transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        <span>Transaksi Baru</span>
    </a>
</div>

<!-- Ringkasan Laporan Keuangan -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5 mb-6">
    <div class="bg-white dark:bg-slate-900/90 rounded-2xl p-5 border border-slate-200/80 dark:border-slate-800 shadow-sm flex items-center justify-between gap-4">
        <div>
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Pendapatan (Status Selesai)</p>
            <p class="text-2xl sm:text-3xl font-extrabold text-emerald-600 dark:text-emerald-400 mt-1.5">
                Rp {{ number_format($totalPendapatanSelesai, 0, ',', '.') }}
            </p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-emerald-100 dark:bg-emerald-500/15 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-900/90 rounded-2xl p-5 border border-slate-200/80 dark:border-slate-800 shadow-sm flex items-center justify-between gap-4">
        <div>
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Total Nilai Semua Transaksi</p>
            <p class="text-2xl sm:text-3xl font-extrabold text-blue-600 dark:text-sky-400 mt-1.5">
                Rp {{ number_format($totalPendapatanSemua, 0, ',', '.') }}
            </p>
        </div>
        <div class="w-12 h-12 rounded-2xl bg-blue-100 dark:bg-blue-500/15 text-blue-600 dark:text-sky-400 flex items-center justify-center shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </div>
    </div>
</div>

<!-- Toolbar Filter Status + Pencarian Cepat -->
<div class="bg-white dark:bg-slate-900/90 rounded-3xl shadow-sm border border-slate-200/80 dark:border-slate-800 overflow-hidden">
    <div class="p-4 sm:p-5 border-b border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <!-- Filter Pills -->
        <div class="inline-flex items-center p-1 rounded-xl bg-slate-100 dark:bg-slate-800/90 text-xs font-bold w-fit">
            <a href="{{ route('transaksi.index') }}"
               class="px-3.5 py-2 rounded-lg transition {{ !$status ? 'bg-white dark:bg-blue-600 text-blue-700 dark:text-white shadow-xs' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white' }}">
                Semua
            </a>
            <a href="{{ route('transaksi.index', ['status' => 'Proses']) }}"
               class="px-3.5 py-2 rounded-lg transition {{ $status === 'Proses' ? 'bg-amber-500 text-white shadow-xs' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white' }}">
                Proses
            </a>
            <a href="{{ route('transaksi.index', ['status' => 'Selesai']) }}"
               class="px-3.5 py-2 rounded-lg transition {{ $status === 'Selesai' ? 'bg-emerald-600 text-white shadow-xs' : 'text-slate-600 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white' }}">
                Selesai
            </a>
        </div>

        <!-- Live Search Input -->
        <div class="relative w-full sm:w-64">
            <span class="pointer-events-none absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </span>
            <input type="text" id="search-transaksi" placeholder="Cari pelanggan / layanan..."
                   class="w-full rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-700 pl-10 pr-3.5 py-2 text-xs sm:text-sm text-slate-700 dark:text-slate-200 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition">
        </div>
    </div>

    <!-- Tabel Transaksi -->
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50/80 dark:bg-slate-800/60 text-slate-500 dark:text-slate-400 uppercase text-[11px] font-bold tracking-wider">
                <tr>
                    <th class="px-5 py-3.5">Tanggal</th>
                    <th class="px-5 py-3.5">Pelanggan</th>
                    <th class="px-5 py-3.5">Layanan (Relasi)</th>
                    <th class="px-5 py-3.5">Berat</th>
                    <th class="px-5 py-3.5">Total Tarif</th>
                    <th class="px-5 py-3.5">Status</th>
                    <th class="px-5 py-3.5 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody id="transaksi-tbody" class="divide-y divide-slate-100 dark:divide-slate-800">
                @forelse($transaksis as $trx)
                    <tr class="trx-row hover:bg-sky-50/40 dark:hover:bg-slate-800/40 transition-colors">
                        <td class="px-5 py-4 text-xs text-slate-500 dark:text-slate-400 whitespace-nowrap">
                            <p class="font-semibold text-slate-700 dark:text-slate-300">{{ $trx->created_at->format('d M Y') }}</p>
                            <p>{{ $trx->created_at->format('H:i') }} WIB</p>
                        </td>
                        <td class="px-5 py-4">
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
                        <td class="px-5 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-lg bg-blue-50 dark:bg-blue-500/15 text-blue-700 dark:text-sky-300 text-xs font-bold">
                                {{ $trx->layanan->nama_layanan }}
                            </span>
                            <p class="text-[11px] text-slate-500 dark:text-slate-400 mt-1">
                                Rp {{ number_format($trx->layanan->harga_per_kg, 0, ',', '.') }}/kg &middot; {{ $trx->layanan->estimasi }}
                            </p>
                        </td>
                        <td class="px-5 py-4 font-semibold text-slate-700 dark:text-slate-300 whitespace-nowrap">
                            {{ $trx->berat }} kg
                        </td>
                        <td class="px-5 py-4 font-extrabold text-slate-900 dark:text-white whitespace-nowrap">
                            Rp {{ number_format($trx->total_harga, 0, ',', '.') }}
                        </td>
                        <td class="px-5 py-4 whitespace-nowrap">
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
                        <td class="px-5 py-4 text-right whitespace-nowrap space-x-1.5">
                            @if($trx->status === 'Proses')
                                <form action="{{ route('transaksi.selesai', $trx) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                            class="inline-flex items-center gap-1 bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded-xl text-xs font-bold shadow-xs transition">
                                        <span>✓ Selesai</span>
                                    </button>
                                </form>
                            @endif
                            <a href="{{ route('transaksi.struk', $trx) }}" target="_blank"
                            class="inline-flex items-center px-3 py-1.5 rounded-xl bg-sky-50 dark:bg-sky-500/15 text-blue-700 dark:text-sky-300 hover:bg-blue-600 hover:text-white border border-sky-200/70 dark:border-sky-500/25 text-xs font-bold transition">
                                Struk
                            </a>
                            <form action="{{ route('transaksi.destroy', $trx) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Hapus data transaksi milik {{ $trx->nama_pelanggan }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center px-3 py-1.5 rounded-xl bg-rose-50 dark:bg-rose-500/15 text-rose-600 dark:text-rose-300 hover:bg-rose-600 hover:text-white border border-rose-200/70 dark:border-rose-500/25 text-xs font-bold transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-5 py-12 text-center text-slate-500 dark:text-slate-400">
                            Belum ada transaksi yang tercatat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Script Live Search Tabel -->
<script>
    const searchInput = document.getElementById('search-transaksi');
    if (searchInput) {
        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase();
            document.querySelectorAll('.trx-row').forEach((row) => {
                row.style.display = row.textContent.toLowerCase().includes(keyword) ? '' : 'none';
            });
        });
    }
</script>
@endsection