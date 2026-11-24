@extends('layouts.app')
@section('title', 'Catat Transaksi Baru')

@section('content')
<div class="max-w-xl mx-auto">
    <!-- Back Link -->
    <a href="{{ route('transaksi.index') }}"
       class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-sky-400 mb-4 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        <span>Kembali ke Rekap Transaksi</span>
    </a>

    <!-- Form Card -->
    <div class="bg-white dark:bg-slate-900/90 rounded-3xl shadow-sm border border-slate-200/80 dark:border-slate-800 overflow-hidden">
        <div class="h-1.5 bg-gradient-to-r from-sky-400 via-blue-600 to-indigo-500"></div>

        <div class="p-6 sm:p-8">
            <div class="flex items-center gap-3.5 mb-6">
                <div class="w-11 h-11 rounded-2xl bg-sky-100 dark:bg-sky-500/15 text-blue-600 dark:text-sky-400 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-extrabold text-slate-900 dark:text-white">Catat Transaksi Baru</h1>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Total tarif dihitung otomatis berdasarkan jenis layanan dan berat.</p>
                </div>
            </div>

            <form action="{{ route('transaksi.store') }}" method="POST" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="nama_pelanggan" class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                            Nama Pelanggan
                        </label>
                        <input id="nama_pelanggan" type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" required
                               placeholder="Nama lengkap"
                               class="w-full rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-700 px-4 py-3 text-sm text-slate-800 dark:text-white placeholder-slate-400 focus:bg-white dark:focus:bg-slate-950 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition">
                        @error('nama_pelanggan')
                            <p class="text-xs font-medium text-rose-600 dark:text-rose-400 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="no_hp" class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                            Nomor HP
                        </label>
                        <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}" required
                               placeholder="08xxxxxxxxxx"
                               class="w-full rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-700 px-4 py-3 text-sm text-slate-800 dark:text-white placeholder-slate-400 focus:bg-white dark:focus:bg-slate-950 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition">
                        @error('no_hp')
                            <p class="text-xs font-medium text-rose-600 dark:text-rose-400 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="layanan_id" class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                        Jenis Layanan
                    </label>
                    <select name="layanan_id" id="layanan_id" required
                            class="w-full rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-700 px-4 py-3 text-sm text-slate-800 dark:text-white focus:bg-white dark:focus:bg-slate-950 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition">
                        <option value="">-- Pilih Paket Layanan --</option>
                        @foreach($layanans as $layanan)
                            <option value="{{ $layanan->id }}" data-harga="{{ $layanan->harga_per_kg }}"
                                    {{ old('layanan_id') == $layanan->id ? 'selected' : '' }}>
                                {{ $layanan->nama_layanan }} — Rp {{ number_format($layanan->harga_per_kg, 0, ',', '.') }}/kg ({{ $layanan->estimasi }})
                            </option>
                        @endforeach
                    </select>
                    @error('layanan_id')
                        <p class="text-xs font-medium text-rose-600 dark:text-rose-400 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="berat" class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                        Berat Cucian (Kg)
                    </label>
                    <div class="relative">
                        <input id="berat" type="number" step="0.5" min="0.5" name="berat" value="{{ old('berat', 1) }}" required
                               class="w-full rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-700 px-4 pr-12 py-3 text-sm text-slate-800 dark:text-white focus:bg-white dark:focus:bg-slate-950 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition">
                        <span class="pointer-events-none absolute inset-y-0 right-0 pr-4 flex items-center text-xs font-bold text-slate-400">KG</span>
                    </div>
                    @error('berat')
                        <p class="text-xs font-medium text-rose-600 dark:text-rose-400 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Live Kalkulator Estimasi Tarif -->
                <div class="rounded-2xl bg-gradient-to-r from-sky-50 via-blue-50 to-indigo-50 dark:from-sky-500/15 dark:via-blue-600/15 dark:to-indigo-600/15 border border-blue-200/70 dark:border-sky-400/25 p-5">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wider text-blue-700 dark:text-sky-300">Estimasi Total Tarif</p>
                            <p id="rincian_tarif" class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Pilih layanan untuk melihat rincian</p>
                        </div>
                        <p id="estimasi_total" class="text-2xl font-extrabold text-blue-700 dark:text-sky-300">Rp 0</p>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <a href="{{ route('transaksi.index') }}"
                       class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-sm font-bold text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                        Batal
                    </a>
                    <button type="submit"
                            class="bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-md shadow-blue-600/25 hover:shadow-lg transition-all">
                        Simpan Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const layananSelect = document.getElementById('layanan_id');
    const beratInput = document.getElementById('berat');
    const totalEl = document.getElementById('estimasi_total');
    const rincianEl = document.getElementById('rincian_tarif');

    function hitungTotal() {
        const selected = layananSelect.options[layananSelect.selectedIndex];
        const harga = parseFloat(selected?.dataset?.harga || 0);
        const berat = parseFloat(beratInput.value || 0);
        const total = Math.round(harga * berat);

        totalEl.textContent = 'Rp ' + total.toLocaleString('id-ID');
        rincianEl.textContent = harga > 0
            ? `Rp ${harga.toLocaleString('id-ID')}/kg × ${berat} kg`
            : 'Pilih layanan untuk melihat rincian';
    }

    layananSelect.addEventListener('change', hitungTotal);
    beratInput.addEventListener('input', hitungTotal);
    hitungTotal();
</script>
@endsection