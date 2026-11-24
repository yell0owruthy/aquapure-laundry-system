<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AquaPure Laundry')</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Terapkan tema sebelum halaman dirender (anti kedip) -->
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    keyframes: {
                        fadeSlideUp: {
                            '0%': { opacity: '0', transform: 'translateY(12px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        shrinkBar: {
                            '0%': { width: '100%' },
                            '100%': { width: '0%' },
                        }
                    },
                    animation: {
                        'fade-slide': 'fadeSlideUp 0.35s cubic-bezier(0.16, 1, 0.3, 1) both',
                        'shrink-bar': 'shrinkBar 4.5s linear forwards',
                    }
                }
            }
        }
    </script>

    <style>
        /* Scrollbar halus */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(148, 163, 184, 0.35); border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(56, 189, 248, 0.7); }

        /* Penyesuaian otomatis kartu & tabel halaman anak saat Dark Mode aktif */
        html.dark main .bg-white { background-color: rgba(15, 23, 42, 0.85) !important; }
        html.dark main .bg-slate-50 { background-color: rgba(30, 41, 59, 0.7) !important; }
        html.dark main .border-slate-200,
        html.dark main .border-slate-300,
        html.dark main .divide-slate-200 > :not([hidden]) ~ :not([hidden]) { border-color: rgba(51, 65, 85, 0.8) !important; }
        html.dark main .text-slate-800,
        html.dark main .text-slate-700 { color: #f1f5f9 !important; }
        html.dark main .text-slate-600,
        html.dark main .text-slate-500 { color: #94a3b8 !important; }
        html.dark main input,
        html.dark main select { background-color: #0f172a !important; color: #f8fafc !important; border-color: #334155 !important; }
    </style>
</head>
<body class="bg-[#F2F6FC] dark:bg-[#060B16] text-slate-800 dark:text-slate-100 antialiased min-h-screen flex transition-colors duration-300 relative overflow-x-hidden">

    <!-- Ambient Background Glow (Berubah Sesuai Mode) -->
    <div class="pointer-events-none fixed inset-0 overflow-hidden -z-10">
        <div class="absolute -top-32 right-0 w-[34rem] h-[34rem] rounded-full bg-sky-300/25 dark:bg-sky-600/15 blur-3xl"></div>
        <div class="absolute bottom-0 left-1/4 w-[28rem] h-[28rem] rounded-full bg-blue-300/20 dark:bg-indigo-600/15 blur-3xl"></div>
    </div>

    <!-- Backdrop Mobile Sidebar -->
    <div id="sidebar-backdrop"
         class="fixed inset-0 z-40 bg-slate-950/50 backdrop-blur-sm hidden lg:hidden transition-opacity"
         onclick="toggleSidebar(false)">
    </div>

    <!-- Floating Adaptive Sidebar (Light: Crisp Glass White | Dark: Deep Midnight) -->
    <aside id="sidebar"
           class="fixed inset-y-0 left-0 lg:inset-y-3 lg:left-3 z-50 w-72 bg-white/95 dark:bg-[#0C1427]/95 backdrop-blur-xl text-slate-700 dark:text-slate-200 shadow-2xl shadow-slate-900/10 dark:shadow-black/40 lg:rounded-3xl border-r lg:border border-slate-200/80 dark:border-slate-800/90 transform -translate-x-full lg:translate-x-0 transition-all duration-300 ease-out flex flex-col overflow-hidden">

        <!-- Dekorasi Garis Aksen Atas -->
        <div class="h-1 w-full bg-gradient-to-r from-sky-400 via-blue-600 to-indigo-500"></div>

        <!-- Brand Header -->
        <div class="h-20 px-6 flex items-center justify-between border-b border-slate-100 dark:border-slate-800/80">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3.5 group">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-sky-400 via-blue-600 to-indigo-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/30 group-hover:scale-105 group-hover:rotate-3 transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456z" />
                    </svg>
                </div>
                <div>
                    <span class="block text-lg font-extrabold tracking-tight text-slate-900 dark:text-white leading-none">AquaPure</span>
                    <span class="block text-[11px] font-semibold text-blue-600 dark:text-sky-400 mt-1">Smart Laundry System</span>
                </div>
            </a>

            <!-- Close Button (Mobile Only) -->
            <button type="button" onclick="toggleSidebar(false)"
                    class="lg:hidden p-2 rounded-xl text-slate-400 hover:text-slate-700 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-800 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-4 py-5 space-y-1.5 overflow-y-auto">
            <p class="px-3 mb-2.5 text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400 dark:text-slate-500">Menu Utama</p>

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
               class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-sky-500 to-blue-600 text-white shadow-lg shadow-blue-500/25' : 'text-slate-600 dark:text-slate-300 hover:bg-sky-50 dark:hover:bg-slate-800/80 hover:text-blue-700 dark:hover:text-white' }}">
                <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('dashboard') ? 'text-white' : 'text-slate-400 dark:text-slate-400 group-hover:text-blue-600 dark:group-hover:text-sky-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>Dashboard</span>
                @if(request()->routeIs('dashboard'))
                    <span class="ml-auto w-2 h-2 rounded-full bg-white shadow"></span>
                @endif
            </a>

            <!-- Data Layanan (Admin Only) -->
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('layanan.index') }}"
                   class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('layanan.*') ? 'bg-gradient-to-r from-sky-500 to-blue-600 text-white shadow-lg shadow-blue-500/25' : 'text-slate-600 dark:text-slate-300 hover:bg-sky-50 dark:hover:bg-slate-800/80 hover:text-blue-700 dark:hover:text-white' }}">
                    <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('layanan.*') ? 'text-white' : 'text-slate-400 dark:text-slate-400 group-hover:text-blue-600 dark:group-hover:text-sky-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                    </svg>
                    <span>Data Layanan</span>
                    @if(request()->routeIs('layanan.*'))
                        <span class="ml-auto w-2 h-2 rounded-full bg-white shadow"></span>
                    @endif
                </a>
            @endif

            <!-- Rekap Transaksi Laundry -->
            <a href="{{ route('transaksi.index') }}"
               class="group flex items-center gap-3.5 px-4 py-3 rounded-2xl text-sm font-semibold transition-all duration-200 {{ request()->routeIs('transaksi.*') ? 'bg-gradient-to-r from-sky-500 to-blue-600 text-white shadow-lg shadow-blue-500/25' : 'text-slate-600 dark:text-slate-300 hover:bg-sky-50 dark:hover:bg-slate-800/80 hover:text-blue-700 dark:hover:text-white' }}">
                <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('transaksi.*') ? 'text-white' : 'text-slate-400 dark:text-slate-400 group-hover:text-blue-600 dark:group-hover:text-sky-400' }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Rekap Transaksi</span>
                @if(request()->routeIs('transaksi.*'))
                    <span class="ml-auto w-2 h-2 rounded-full bg-white shadow"></span>
                @endif
            </a>

            <!-- Quick Action Card Adaptive -->
            <div class="pt-5">
                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-sky-50 via-blue-50 to-indigo-50 dark:from-sky-500/15 dark:via-blue-600/15 dark:to-indigo-600/20 border border-blue-200/70 dark:border-sky-400/20 p-4">
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="w-2 h-2 rounded-full bg-blue-600 dark:bg-sky-400"></span>
                        <p class="text-xs font-extrabold text-slate-800 dark:text-white">Order Masuk Baru?</p>
                    </div>
                    <p class="text-[11px] text-slate-600 dark:text-slate-300/80 mb-3.5 leading-relaxed">
                        Catat pelanggan dan hitung tarif laundry otomatis dalam hitungan detik.
                    </p>
                    <a href="{{ route('transaksi.create') }}"
                       class="w-full inline-flex items-center justify-center gap-1.5 bg-blue-600 hover:bg-blue-700 dark:bg-white dark:text-blue-700 dark:hover:bg-sky-50 text-white text-xs font-bold py-2.5 px-3 rounded-xl shadow-sm transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Catat Transaksi</span>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Adaptive User Profile & Logout Footer -->
        <div class="p-4 border-t border-slate-100 dark:border-slate-800/80 bg-slate-50/80 dark:bg-slate-900/50">
            <div class="flex items-center gap-3 p-2.5 rounded-2xl bg-white dark:bg-slate-800/80 border border-slate-200/70 dark:border-slate-700/70 shadow-xs mb-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sky-400 to-blue-600 text-white flex items-center justify-center font-extrabold text-sm shadow shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-sm font-bold text-slate-800 dark:text-white truncate">{{ auth()->user()->name }}</p>
                    <span class="inline-flex items-center gap-1.5 text-[10px] font-bold uppercase tracking-wider text-blue-600 dark:text-sky-300">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        {{ auth()->user()->role }}
                    </span>
                </div>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="w-full flex items-center justify-center gap-2 px-3 py-2.5 rounded-xl text-xs font-bold text-rose-600 dark:text-rose-300 bg-rose-50 dark:bg-rose-500/10 hover:bg-rose-600 hover:text-white dark:hover:bg-rose-500 border border-rose-200/70 dark:border-rose-500/20 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Keluar Akun</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="flex-1 flex flex-col min-w-0 lg:pl-[19rem]">

        <!-- Floating Glassmorphism Sticky Topbar -->
        <div class="sticky top-0 z-30 px-4 sm:px-6 lg:px-8 pt-3">
            <header class="h-16 sm:h-[4.5rem] bg-white/80 dark:bg-[#0C1427]/80 backdrop-blur-xl rounded-2xl border border-slate-200/80 dark:border-slate-800/90 shadow-sm shadow-slate-900/5 px-4 sm:px-6 flex items-center justify-between gap-3 transition-colors">
                <div class="flex items-center gap-3 min-w-0">
                    <!-- Hamburger Button (Mobile Only) -->
                    <button type="button" onclick="toggleSidebar(true)"
                            class="lg:hidden p-2 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-blue-50 hover:text-blue-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <div class="min-w-0">
                        <h2 class="text-base sm:text-lg font-extrabold tracking-tight text-slate-900 dark:text-white truncate">
                            @yield('title', 'Dashboard')
                        </h2>
                        <p id="live-greeting" class="text-xs text-slate-500 dark:text-slate-400 truncate hidden sm:block">
                            Selamat datang kembali, {{ auth()->user()->name }}
                        </p>
                    </div>
                </div>

                <!-- Right Controls: Mode Pill Switch + CTA -->
                <div class="flex items-center gap-2 sm:gap-3">
                    <!-- Segmented Light / Dark Mode Switch -->
                    <button type="button" onclick="toggleDarkMode()" title="Ganti Mode Terang / Gelap"
                            class="inline-flex items-center gap-1.5 p-1 rounded-xl bg-slate-100 dark:bg-slate-800/90 border border-slate-200/80 dark:border-slate-700 text-xs font-bold transition">
                        <span class="flex items-center gap-1 px-2.5 py-1.5 rounded-lg bg-white text-amber-500 shadow-xs dark:bg-transparent dark:text-slate-400 dark:shadow-none transition-all">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                            </svg>
                            <span class="hidden md:inline">Terang</span>
                        </span>
                        <span class="flex items-center gap-1 px-2.5 py-1.5 rounded-lg text-slate-500 dark:bg-blue-600 dark:text-white dark:shadow-xs transition-all">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                            </svg>
                            <span class="hidden md:inline">Gelap</span>
                        </span>
                    </button>
                </div>
            </header>
        </div>

        <!-- Main Page Content -->
        <main class="flex-1 px-4 sm:px-6 lg:px-8 py-6">
            <div class="max-w-6xl mx-auto animate-fade-slide">

                <!-- Toast-Style Flash Alert: Success -->
                @if(session('success'))
                    <div class="flash-alert relative overflow-hidden mb-6 rounded-2xl bg-white dark:bg-slate-800 border border-emerald-200 dark:border-emerald-800/70 shadow-lg shadow-emerald-500/10 px-5 py-4">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-emerald-100 dark:bg-emerald-900/50 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400">Berhasil</p>
                                    <p class="text-sm font-medium text-slate-700 dark:text-slate-200">{{ session('success') }}</p>
                                </div>
                            </div>
                            <button type="button" onclick="this.closest('.flash-alert').remove()"
                                    class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                                &times;
                            </button>
                        </div>
                        <div class="absolute bottom-0 left-0 h-1 bg-emerald-500 animate-shrink-bar"></div>
                    </div>
                @endif

                <!-- Toast-Style Flash Alert: Error -->
                @if(session('error'))
                    <div class="flash-alert relative overflow-hidden mb-6 rounded-2xl bg-white dark:bg-slate-800 border border-rose-200 dark:border-rose-800/70 shadow-lg shadow-rose-500/10 px-5 py-4">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-rose-100 dark:bg-rose-900/50 text-rose-600 dark:text-rose-400 flex items-center justify-center shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-wider text-rose-600 dark:text-rose-400">Perhatian</p>
                                    <p class="text-sm font-medium text-slate-700 dark:text-slate-200">{{ session('error') }}</p>
                                </div>
                            </div>
                            <button type="button" onclick="this.closest('.flash-alert').remove()"
                                    class="p-1.5 rounded-lg text-slate-400 hover:text-slate-700 dark:hover:text-white hover:bg-slate-100 dark:hover:bg-slate-700 transition">
                                &times;
                            </button>
                        </div>
                        <div class="absolute bottom-0 left-0 h-1 bg-rose-500 animate-shrink-bar"></div>
                    </div>
                @endif

                <!-- Konten Halaman -->
                @yield('content')
            </div>
        </main>

        <!-- Clean Subtle Footer -->
        <footer class="px-4 sm:px-6 lg:px-8 pb-4 pt-2">
            <div class="max-w-6xl mx-auto rounded-2xl bg-white/70 dark:bg-[#0C1427]/70 backdrop-blur-sm border border-slate-200/70 dark:border-slate-800/80 px-5 py-3.5 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-slate-500 dark:text-slate-400">
                <p>&copy; {{ date('Y') }} <span class="font-bold text-slate-700 dark:text-slate-200">AquaPure Laundry</span> &middot; Sistem Informasi Manajemen Laundry</p>
                <p class="inline-flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Aktif sebagai <strong class="text-blue-600 dark:text-sky-400 capitalize">{{ auth()->user()->role }}</strong></span>
                </p>
            </div>
        </footer>
    </div>

    <!-- UX Scripts: Mobile Drawer, Dark Mode, Live Greeting & Auto-Dismiss Toast -->
    <script>
        function toggleSidebar(open) {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            if (open) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            }
        }

        function toggleDarkMode() {
            const html = document.documentElement;
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        }

        (function updateGreeting() {
            const el = document.getElementById('live-greeting');
            if (!el) return;
            const now = new Date();
            const jam = now.getHours();
            const sapa = jam < 11 ? 'Selamat Pagi' : jam < 15 ? 'Selamat Siang' : jam < 18 ? 'Selamat Sore' : 'Selamat Malam';
            const tanggal = now.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
            el.textContent = `${sapa}, {{ auth()->user()->name }} • ${tanggal}`;
        })();

        setTimeout(() => {
            document.querySelectorAll('.flash-alert').forEach((alert) => {
                alert.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                alert.style.opacity = '0';
                alert.style.transform = 'translateY(-6px)';
                setTimeout(() => alert.remove(), 400);
            });
        }, 4500);
    </script>
</body>
</html>