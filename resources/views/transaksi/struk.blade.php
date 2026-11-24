<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk #AQP-{{ str_pad($transaksi->id, 4, '0', STR_PAD_LEFT) }} - AquaPure Laundry</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', ui-sans-serif, system-ui, sans-serif; }
        @media print {
            body { background: #ffffff !important; padding: 0 !important; }
            .no-print { display: none !important; }
            .receipt-card {
                box-shadow: none !important;
                border: 1px dashed #cbd5e1 !important;
                max-width: 100% !important;
                margin: 0 auto !important;
            }
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen py-8 px-4 flex flex-col items-center justify-center">

    <!-- Tombol Navigasi & Cetak (Otomatis Hilang Saat Diprint) -->
    <div class="no-print w-full max-w-md flex items-center justify-between gap-3 mb-5">
        <a href="{{ route('transaksi.index') }}"
           class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:text-blue-600 hover:border-blue-300 text-xs font-bold shadow-xs transition">
            &larr; Kembali
        </a>
        <button type="button" onclick="window.print()"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white text-xs font-bold shadow-md shadow-blue-600/25 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
            </svg>
            <span>Cetak / Simpan PDF</span>
        </button>
    </div>

    <!-- Kartu Struk Laundry -->
    <div class="receipt-card w-full max-w-md bg-white rounded-3xl shadow-xl border border-slate-200/80 overflow-hidden">
        <!-- Header Brand -->
        <div class="bg-gradient-to-r from-sky-500 to-blue-600 text-white px-6 py-5 text-center">
            <h1 class="text-xl font-extrabold tracking-tight">AquaPure Laundry</h1>
            <p class="text-xs text-sky-100 mt-0.5">Bersih, Wangi, Cepat &amp; Terpercaya</p>
        </div>

        <div class="p-6 space-y-5 text-sm">
            <!-- Info Nota -->
            <div class="flex items-center justify-between border-b border-dashed border-slate-200 pb-4">
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">No. Nota</p>
                    <p class="font-extrabold text-slate-800">#AQP-{{ str_pad($transaksi->id, 4, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div class="text-right">
                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Tanggal</p>
                    <p class="font-semibold text-slate-700">{{ $transaksi->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>

            <!-- Info Pelanggan & Kasir -->
            <div class="space-y-2 border-b border-dashed border-slate-200 pb-4 text-xs sm:text-sm">
                <div class="flex justify-between gap-2">
                    <span class="text-slate-500">Pelanggan</span>
                    <span class="font-bold text-slate-800">{{ $transaksi->nama_pelanggan }}</span>
                </div>
                <div class="flex justify-between gap-2">
                    <span class="text-slate-500">No. HP</span>
                    <span class="font-medium text-slate-700">{{ $transaksi->no_hp }}</span>
                </div>
                <div class="flex justify-between gap-2">
                    <span class="text-slate-500">Petugas</span>
                    <span class="font-medium text-slate-700">{{ $transaksi->user->name ?? 'Admin/Kasir' }}</span>
                </div>
                <div class="flex justify-between gap-2 items-center">
                    <span class="text-slate-500">Status</span>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-bold {{ $transaksi->status === 'Selesai' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                        {{ $transaksi->status }}
                    </span>
                </div>
            </div>

            <!-- Rincian Layanan -->
            <div class="space-y-2 border-b border-dashed border-slate-200 pb-4">
                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Rincian Layanan</p>
                <div class="flex justify-between items-start gap-3">
                    <div>
                        <p class="font-bold text-slate-800">{{ $transaksi->layanan->nama_layanan }}</p>
                        <p class="text-xs text-slate-500">
                            {{ $transaksi->berat }} kg &times; Rp {{ number_format($transaksi->layanan->harga_per_kg, 0, ',', '.') }}/kg
                        </p>
                        <p class="text-xs text-slate-400 mt-0.5">Estimasi: {{ $transaksi->layanan->estimasi }}</p>
                    </div>
                    <p class="font-bold text-slate-800 whitespace-nowrap">
                        Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                    </p>
                </div>
            </div>

            <!-- Total Bayar -->
            <div class="flex items-center justify-between bg-sky-50 border border-sky-100 rounded-2xl px-4 py-3.5">
                <span class="text-xs font-extrabold uppercase tracking-wider text-blue-700">Total Bayar</span>
                <span class="text-xl font-extrabold text-blue-700">
                    Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}
                </span>
            </div>

            <!-- Catatan Bawah -->
            <div class="text-center pt-2 text-[11px] text-slate-400 space-y-1">
                <p class="font-semibold text-slate-600">Terima kasih telah mempercayakan cucian Anda!</p>
                <p>Harap bawa struk ini saat pengambilan cucian.</p>
            </div>
        </div>
    </div>

</body>
</html>