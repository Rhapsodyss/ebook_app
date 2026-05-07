<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us — Light's On</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;0,900;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['"Playfair Display"', 'serif'],
                        body: ['"DM Sans"', 'sans-serif'],
                    },
                    colors: {
                        cream: '#F5F0E8',
                        ink: '#1A1A1A',
                        amber: '#C9943A',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
        }

        .member-card:hover .member-img {
            transform: scale(1.05);
        }

        .member-img {
            transition: transform 0.4s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fadeUp 0.8s ease forwards;
        }

        .delay-1 { animation-delay: 0.15s; opacity: 0; }
        .delay-2 { animation-delay: 0.3s; opacity: 0; }
        .delay-3 { animation-delay: 0.45s; opacity: 0; }
        .delay-4 { animation-delay: 0.6s; opacity: 0; }
    </style>
</head>

<body class="bg-ink text-cream">

    <!-- ═══════════════════════════════════════════
         NAVBAR
    ═══════════════════════════════════════════ -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-b from-black/70 to-transparent">
        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between px-3 py-4 gap-3">
            <a href="/" class="font-display text-xl md:text-2xl font-bold tracking-tight text-cream">
                💡 Light's on
            </a>

            <form action="/search" method="get"
                class="flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 w-full md:w-auto">
                <svg class="w-5 h-5 text-white/60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z" />
                </svg>
                <input type="text" name="keyword" placeholder="Cari judul..."
                    class="bg-transparent text-base text-white w-full md:w-64 placeholder-white/50 focus:outline-none">
            </form>

            <span class="hidden md:flex items-center text-lg font-medium tracking-wide">
                <span class="text-white/60 mr-3">Read on with</span>
                <span class="text-amber font-semibold relative">
                    Light's on
                    <span class="absolute left-0 -bottom-1.5 w-full h-[2px] bg-amber/70"></span>
                </span>
            </span>
        </div>
    </nav>

    <!-- ═══════════════════════════════════════════
         PAGE HEADER
    ═══════════════════════════════════════════ -->
    <header class="relative pt-32 pb-20 px-8 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-amber/10 to-transparent"></div>
        <div class="relative z-10 max-w-4xl mx-auto text-center">
            <p class="fade-up text-amber text-xs font-medium uppercase tracking-[0.25em] mb-4">
                ✦ Tim Kami
            </p>
            <h1 class="fade-up delay-1 font-display text-5xl md:text-7xl font-black leading-none mb-6">
                About Us
            </h1>
            <p class="fade-up delay-2 text-white/60 text-lg max-w-2xl mx-auto leading-relaxed">
                Tim pengembang <span class="text-amber font-semibold">Light's On</span> — platform ebook yang mengembalikan kegembiraan membaca.
            </p>
        </div>
    </header>

    <!-- ═══════════════════════════════════════════
         TEAM GRID
    ═══════════════════════════════════════════ -->
    <main class="max-w-7xl mx-auto px-8 pb-32">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="member-card group fade-up delay-1">
                <div class="relative overflow-hidden rounded-2xl bg-white/5 border border-white/10 aspect-[3/4] mb-4">
                    <div class="absolute inset-0 bg-gradient-to-b from-amber/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="member-img w-full h-full flex items-center justify-center">
                        <div class="text-8xl opacity-30">👨‍💻</div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-ink to-transparent p-6 pt-16">
                        <h3 class="font-display text-2xl font-bold text-amber">Muhammad Fadhil<br>Alwan</h3>
                        <p class="text-white/50 text-sm mt-1"><?= htmlspecialchars($role1 ?? 'Developer') ?></p>
                    </div>
                </div>

            </div>

            <div class="member-card group fade-up delay-2">
                <div class="relative overflow-hidden rounded-2xl bg-white/5 border border-white/10 aspect-[3/4] mb-4">
                    <div class="absolute inset-0 bg-gradient-to-b from-amber/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="member-img w-full h-full flex items-center justify-center">
                        <div class="text-8xl opacity-30">👨‍💻</div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-ink to-transparent p-6 pt-16">
                        <h3 class="font-display text-2xl font-bold text-amber">Muhammad<br>Izzudin</h3>
                        <p class="text-white/50 text-sm mt-1"><?= htmlspecialchars($role2 ?? 'Developer') ?></p>
                    </div>
                </div>

            </div>

            <div class="member-card group fade-up delay-3">
                <div class="relative overflow-hidden rounded-2xl bg-white/5 border border-white/10 aspect-[3/4] mb-4">
                    <div class="absolute inset-0 bg-gradient-to-b from-amber/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="member-img w-full h-full flex items-center justify-center">
                        <div class="text-8xl opacity-30">🐔</div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-ink to-transparent p-6 pt-16">
                        <h3 class="font-display text-2xl font-bold text-amber">Rayakha<br>Reza</h3>
                        <p class="text-white/50 text-sm mt-1"><?= htmlspecialchars($role3 ?? 'Developer') ?></p>
                    </div>
                </div>

            </div>

            <div class="member-card group fade-up delay-4">
                <div class="relative overflow-hidden rounded-2xl bg-white/5 border border-white/10 aspect-[3/4] mb-4">
                    <div class="absolute inset-0 bg-gradient-to-b from-amber/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="member-img w-full h-full flex items-center justify-center">
                        <div class="text-8xl opacity-30">🐤</div>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-ink to-transparent p-6 pt-16">
                        <h3 class="font-display text-2xl font-bold text-amber">Arjuna<br>Hardy</h3>
                        <p class="text-white/50 text-sm mt-1"><?= htmlspecialchars($role4 ?? 'Developer') ?></p>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <!-- ═══════════════════════════════════════════
         FOOTER
    ═══════════════════════════════════════════ -->
    <footer class="border-t border-white/10 px-8 py-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-white/30 text-xs text-center md:text-left">
                © <?= date('Y') ?> Light's on — Read more, feel more.
            </p>
            <a href="/"
                class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-medium tracking-wide text-ink bg-amber rounded-full hover:bg-amber/80 transition">
                Kembali ke Beranda
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </footer>

</body>
</html>
