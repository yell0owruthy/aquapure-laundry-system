<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - AquaPure Laundry</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Terapkan tema sebelum render (anti kedip) -->
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
                            '0%': { opacity: '0', transform: 'translateY(16px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    },
                    animation: {
                        'fade-slide': 'fadeSlideUp 0.45s cubic-bezier(0.16, 1, 0.3, 1) both',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#F2F6FC] dark:bg-[#060B16] text-slate-800 dark:text-slate-100 antialiased min-h-screen flex items-center justify-center p-4 sm:p-6 relative overflow-x-hidden transition-colors duration-300">

    <!-- Ambient Background Glow -->
    <div class="pointer-events-none fixed inset-0 overflow-hidden -z-10">
        <div class="absolute -top-36 -left-24 w-[32rem] h-[32rem] rounded-full bg-sky-300/30 dark:bg-sky-600/15 blur-3xl"></div>
        <div class="absolute -bottom-32 -right-20 w-[30rem] h-[30rem] rounded-full bg-blue-400/25 dark:bg-indigo-600/20 blur-3xl"></div>
    </div>

    <!-- Floating Theme Switcher -->
    <button type="button" onclick="toggleDarkMode()" title="Ganti Mode Terang / Gelap"
            class="fixed top-4 right-4 z-20 inline-flex items-center gap-1.5 p-1 rounded-xl bg-white/85 dark:bg-slate-900/85 backdrop-blur-md border border-slate-200/80 dark:border-slate-700/80 shadow-sm text-xs font-bold transition">
        <span class="flex items-center gap-1 px-2.5 py-1.5 rounded-lg bg-slate-100 text-amber-500 dark:bg-transparent dark:text-slate-400 transition-all">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
            </svg>
            <span class="hidden sm:inline">Terang</span>
        </span>
        <span class="flex items-center gap-1 px-2.5 py-1.5 rounded-lg text-slate-500 dark:bg-blue-600 dark:text-white transition-all">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
            </svg>
            <span class="hidden sm:inline">Gelap</span>
        </span>
    </button>

    <!-- Main Split Login Card -->
    <div class="w-full max-w-4xl bg-white/95 dark:bg-[#0C1427]/95 backdrop-blur-xl rounded-3xl shadow-2xl shadow-slate-900/10 dark:shadow-black/50 border border-slate-200/80 dark:border-slate-800/90 overflow-hidden grid grid-cols-1 lg:grid-cols-12 animate-fade-slide">

        <!-- Left Showcase Panel (Desktop) -->
        <div class="hidden lg:flex lg:col-span-5 relative flex-col justify-between p-8 bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 text-white overflow-hidden">
            <!-- Dekorasi Lingkaran Halus -->
            <div class="pointer-events-none absolute -top-20 -right-20 w-64 h-64 rounded-full bg-white/10 blur-2xl"></div>
            <div class="pointer-events-none absolute -bottom-24 -left-16 w-72 h-72 rounded-full bg-sky-300/20 blur-2xl"></div>

            <!-- Brand Logo -->
            <div class="relative flex items-center gap-3">
                <div class="w-11 h-11 rounded-2xl bg-white/20 backdrop-blur-md border border-white/25 flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456z" />
                    </svg>
                </div>
                <div>
                    <p class="text-lg font-extrabold tracking-tight leading-none">AquaPure</p>
                    <p class="text-xs text-sky-100/90 font-medium mt-1">Smart Laundry System</p>
                </div>
            </div>

            <!-- Copywriting & Feature Highlights -->
            <div class="relative my-8 space-y-5">
                <h2 class="text-2xl font-extrabold leading-snug tracking-tight">
                    Kelola Operasional Laundry Lebih Cepat &amp; Rapi.
                </h2>
                <p class="text-sm text-sky-100/90 leading-relaxed">
                    Pantau layanan Reguler, Ekspress, dan Superkilat hingga rekap keuangan harian dalam satu dashboard terpadu.
                </p>

                <div class="space-y-3 pt-2">
                    <div class="flex items-center gap-3 text-xs font-semibold text-white/95">
                        <span class="w-6 h-6 rounded-lg bg-white/20 flex items-center justify-center shrink-0">✓</span>
                        <span>Akses khusus untuk Admin &amp; Kasir</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs font-semibold text-white/95">
                        <span class="w-6 h-6 rounded-lg bg-white/20 flex items-center justify-center shrink-0">✓</span>
                        <span>Kalkulasi tarif per kilogram otomatis</span>
                    </div>
                    <div class="flex items-center gap-3 text-xs font-semibold text-white/95">
                        <span class="w-6 h-6 rounded-lg bg-white/20 flex items-center justify-center shrink-0">✓</span>
                        <span>Update status Proses ke Selesai 1 klik</span>
                    </div>
                </div>
            </div>

            <!-- Bottom Footnote -->
            <p class="relative text-[11px] text-sky-100/75">
                &copy; {{ date('Y') }} AquaPure Laundry
            </p>
        </div>

        <!-- Right Login Form Panel -->
        <div class="lg:col-span-7 p-6 sm:p-10 flex flex-col justify-center">
            <!-- Mobile Brand Header -->
            <div class="flex items-center gap-3 mb-6 lg:hidden">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-sky-400 via-blue-600 to-indigo-600 flex items-center justify-center text-white shadow-md">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09z" />
                    </svg>
                </div>
                <div>
                    <p class="text-lg font-extrabold text-slate-900 dark:text-white leading-none">AquaPure</p>
                    <p class="text-xs font-semibold text-blue-600 dark:text-sky-400 mt-0.5">Smart Laundry System</p>
                </div>
            </div>

            <div class="mb-7">
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                    Selamat Datang
                </h1>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1.5">
                    Silakan masuk menggunakan akun <strong>Admin</strong> atau <strong>Kasir</strong> Anda.
                </p>
            </div>

            <!-- Error Alert -->
            @if($errors->any())
                <div class="mb-5 flex items-center gap-3 rounded-2xl bg-rose-50 dark:bg-rose-950/50 border border-rose-200 dark:border-rose-800/70 text-rose-700 dark:text-rose-300 px-4 py-3 text-sm">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                        Alamat Email
                    </label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>
                        </span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                               placeholder="admin@laundry.test"
                               class="w-full rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 pl-11 pr-4 py-3 text-sm text-slate-800 dark:text-white placeholder-slate-400 focus:bg-white dark:focus:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition">
                    </div>
                </div>

                <!-- Password Field + Eye Toggle -->
                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 mb-2">
                        Password
                    </label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </span>
                        <input id="password" type="password" name="password" required placeholder="Masukkan password"
                               class="w-full rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 pl-11 pr-11 py-3 text-sm text-slate-800 dark:text-white placeholder-slate-400 focus:bg-white dark:focus:bg-slate-900 focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500 transition">
                        <button type="button" onclick="togglePassword()" aria-label="Tampilkan Password"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-blue-600 dark:hover:text-sky-400 transition">
                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white font-bold py-3.5 px-4 rounded-xl text-sm shadow-lg shadow-blue-600/25 hover:shadow-xl hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 flex items-center justify-center gap-2">
                    <span>Masuk ke Dashboard</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <script>
        function toggleDarkMode() {
            const html = document.documentElement;
            html.classList.toggle('dark');
            localStorage.setItem('theme', html.classList.contains('dark') ? 'dark' : 'light');
        }

        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>