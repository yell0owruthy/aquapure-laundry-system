@extends('layouts.app')
@section('title', 'Data Layanan')

@section('content')
<!-- Header Section -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-7">
    <div>
        <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 dark:text-white">Data Layanan Cuci</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">Kelola daftar paket layanan, tarif per kilogram, dan estimasi waktu pengerjaan.</p>
    </div>
    <a href="{{ route('layanan.create') }}"
       class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl shadow-md shadow-blue-600/25 hover:shadow-lg hover:-translate-y-0.5 transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        <span>Tambah Layanan</span>
    </a>
</div>

<!-- Grid Kartu Layanan -->
@if($layanans->count())
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($layanans as $index => $layanan)
            <div class="group relative bg-white dark:bg-slate-900/90 rounded-3xl border border-slate-200/80 dark:border-slate-800 p-6 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-200 flex flex-col justify-between overflow-hidden">
                <!-- Garis Aksen Atas -->
                <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-sky-400 via-blue-500 to-indigo-500 opacity-80 group-hover:opacity-100 transition"></div>

                <div>
                    <div class="flex items-start justify-between gap-3 mb-4">
                        <div class="w-11 h-11 rounded-2xl bg-sky-100 dark:bg-sky-500/15 text-blue-600 dark:text-sky-400 flex items-center justify-center font-extrabold text-sm">
                            #{{ $index + 1 }}
                        </div>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-xs font-semibold">
                            <svg class="w-3.5 h-3.5 text-sky-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ $layanan->estimasi }}
                        </span>
                    </div>

                    <h2 class="text-lg font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ $layanan->nama_layanan }}
                    </h2>

                    <div class="mt-3 flex items-baseline gap-1">
                        <span class="text-2xl font-extrabold text-blue-600 dark:text-sky-400">
                            Rp {{ number_format($layanan->harga_per_kg, 0, ',', '.') }}
                        </span>
                        <span class="text-xs font-semibold text-slate-400">/ kg</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center gap-2.5">
                    <a href="{{ route('layanan.edit', $layanan) }}"
                       class="flex-1 inline-flex items-center justify-center gap-1.5 px-3.5 py-2 rounded-xl bg-amber-50 dark:bg-amber-500/15 text-amber-700 dark:text-amber-300 hover:bg-amber-500 hover:text-white border border-amber-200/70 dark:border-amber-500/25 text-xs font-bold transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z" />
                        </svg>
                        <span>Edit</span>
                    </a>

                    <form action="{{ route('layanan.destroy', $layanan) }}" method="POST" class="flex-1"
                          onsubmit="return confirm('Yakin ingin menghapus layanan {{ $layanan->nama_layanan }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-full inline-flex items-center justify-center gap-1.5 px-3.5 py-2 rounded-xl bg-rose-50 dark:bg-rose-500/15 text-rose-600 dark:text-rose-300 hover:bg-rose-600 hover:text-white border border-rose-200/70 dark:border-rose-500/25 text-xs font-bold transition-all">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            <span>Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="bg-white dark:bg-slate-900/90 rounded-3xl border border-slate-200/80 dark:border-slate-800 p-12 text-center shadow-sm">
        <div class="w-14 h-14 rounded-2xl bg-sky-100 dark:bg-sky-500/15 text-blue-600 dark:text-sky-400 flex items-center justify-center mx-auto mb-4">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
        </div>
        <h3 class="text-base font-bold text-slate-800 dark:text-white">Belum ada data layanan</h3>
        <p class="text-sm text-slate-500 dark:text-slate-400 mt-1 mb-5">Tambahkan jenis layanan seperti Reguler, Ekspress, atau Superkilat.</p>
        <a href="{{ route('layanan.create') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl transition">
            + Tambah Layanan Pertama
        </a>
    </div>
@endif
@endsection