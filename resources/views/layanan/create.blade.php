@extends('layouts.app')
@section('title', 'Tambah Layanan')

@section('content')
<div class="max-w-xl mx-auto">
    <!-- Back Link -->
    <a href="{{ route('layanan.index') }}"
       class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 dark:text-slate-400 hover:text-blue-600 dark:hover:text-sky-400 mb-4 transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        <span>Kembali ke Data Layanan</span>
    </a>

    <!-- Form Card -->
    <div class="bg-white dark:bg-slate-900/90 rounded-3xl shadow-sm border border-slate-200/80 dark:border-slate-800 overflow-hidden">
        <div class="h-1.5 bg-gradient-to-r from-sky-400 via-blue-600 to-indigo-500"></div>

        <div class="p-6 sm:p-8">
            <div class="flex items-center gap-3.5 mb-6">
                <div class="w-11 h-11 rounded-2xl bg-sky-100 dark:bg-sky-500/15 text-blue-600 dark:text-sky-400 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-extrabold text-slate-900 dark:text-white">Tambah Jenis Layanan</h1>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Isi detail paket cuci baru untuk AquaPure Laundry.</p>
                </div>
            </div>

            <form action="{{ route('layanan.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="nama_layanan" class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                        Nama Layanan
                    </label>
                    <input id="nama_layanan" type="text" name="nama_layanan" value="{{ old('nama_layanan') }}" required
                           placeholder="Contoh: Reguler, Ekspress, Superkilat"
                           class="w-full rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-700 px-4 py-3 text-sm text-slate-800 dark:text-white placeholder-slate-400 focus:bg-white dark:focus:bg-slate-950 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition">
                    @error('nama_layanan')
                        <p class="text-xs font-medium text-rose-600 dark:text-rose-400 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="harga_per_kg" class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                        Harga per Kg
                    </label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center text-sm font-bold text-slate-400">Rp</span>
                        <input id="harga_per_kg" type="number" name="harga_per_kg" value="{{ old('harga_per_kg') }}" required min="1000"
                               placeholder="7000"
                               class="w-full rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-700 pl-11 pr-4 py-3 text-sm text-slate-800 dark:text-white placeholder-slate-400 focus:bg-white dark:focus:bg-slate-950 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition">
                    </div>
                    @error('harga_per_kg')
                        <p class="text-xs font-medium text-rose-600 dark:text-rose-400 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="estimasi" class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                        Estimasi Pengerjaan
                    </label>
                    <input id="estimasi" type="text" name="estimasi" value="{{ old('estimasi') }}" required
                           placeholder="Contoh: 3-4 hari atau 5 jam selesai"
                           class="w-full rounded-xl bg-slate-50 dark:bg-slate-950 border border-slate-200 dark:border-slate-700 px-4 py-3 text-sm text-slate-800 dark:text-white placeholder-slate-400 focus:bg-white dark:focus:bg-slate-950 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition">
                    @error('estimasi')
                        <p class="text-xs font-medium text-rose-600 dark:text-rose-400 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-slate-800">
                    <a href="{{ route('layanan.index') }}"
                       class="px-5 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 text-sm font-bold text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                        Batal
                    </a>
                    <button type="submit"
                            class="bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white px-6 py-2.5 rounded-xl text-sm font-bold shadow-md shadow-blue-600/25 hover:shadow-lg transition-all">
                        Simpan Layanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection