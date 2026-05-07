<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Light's On — Read More, Feel More</title>
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

        .hero-bg {
            background-attachment: fixed;
        }

        .book-card:hover .book-cover {
            transform: translateY(-6px) rotate(-1deg);
        }

        .book-cover {
            transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .search-input::placeholder {
            color: #9CA3AF;
        }

        .search-input:focus {
            outline: none;
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

        .delay-1 {
            animation-delay: 0.15s;
            opacity: 0;
        }

        .delay-2 {
            animation-delay: 0.3s;
            opacity: 0;
        }

        .delay-3 {
            animation-delay: 0.45s;
            opacity: 0;
        }

        .delay-4 {
            animation-delay: 0.6s;
            opacity: 0;
        }
    </style>
</head>

<body class="bg-ink text-cream">

    <!-- ═══════════════════════════════════════════
     NAVBAR
═══════════════════════════════════════════ -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-b from-black/70 to-transparent">

        <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between px-3 py-4 gap-3">

            <!-- LEFT -->
            <a href="/" class="font-display text-xl md:text-2xl font-bold tracking-tight text-cream">
                💡 Light's on
            </a>

            <!-- CENTER -->
            <form action="/search" method="get"
                class="flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-2 w-full md:w-auto">

                <svg class="w-5 h-5 text-white/60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z" />
                </svg>

                <input
                    type="text"
                    name="keyword"
                    placeholder="Cari judul..."
                    value="<?= htmlspecialchars($keyword ?? '') ?>"
                    class="bg-transparent text-base text-white w-full md:w-64 placeholder-white/50 focus:outline-none">
            </form>

            <!-- RIGHT -->
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
     HERO SLIDER ═══════════════════════════════════════════ -->
    <?php if (!isset($keyword) && !empty($stories)): ?>

        <div id="hero-slider" class="relative overflow-hidden min-h-screen">

            <?php foreach ($stories as $index => $hero): ?>
                <section
                    class="hero-slide absolute inset-0 min-h-screen flex items-end pb-24 px-8 md:px-16 transition-opacity duration-700 <?= $index === 0 ? 'opacity-100 z-10' : 'opacity-0' ?>"
                    style="background: url('/uploads/<?= htmlspecialchars($hero['background_image']) ?>') center/cover no-repeat;">

                    <!-- overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-ink via-ink/60 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-ink/70 to-transparent"></div>

                    <!-- CONTENT -->
                    <div class="relative z-10 max-w-2xl">

                        <p class="fade-up text-amber text-xs font-medium uppercase tracking-[0.25em] mb-4">
                            ✦ Featured Book
                        </p>

                        <h1 class="fade-up delay-1 font-display text-5xl md:text-7xl font-black leading-none mb-3">
                            <?= htmlspecialchars($hero['title']) ?>
                        </h1>

                        <p class="fade-up delay-2 text-white/60 text-sm uppercase tracking-widest mb-6">
                            by <?= htmlspecialchars($hero['author']) ?>
                        </p>

                        <p class="fade-up delay-3 text-white/70 text-base leading-relaxed mb-8 max-w-lg">
                            <?= htmlspecialchars($hero['description']) ?>
                        </p>

                        <div class="fade-up delay-4 flex items-center gap-6">

                            <a
                                href="/read/<?= $hero['id'] ?>"
                                class="group inline-flex items-center gap-2 px-8 py-4 text-sm font-medium tracking-wide text-ink bg-amber rounded-full hover:bg-amber/80 transition">

                                Baca Sekarang

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>

                            <span class="w-16 h-[1px] bg-gradient-to-r from-white/40 to-transparent"></span>

                        </div>
                    </div>

                    <!-- COVER -->
                    <div class="absolute right-16 bottom-24 hidden lg:block fade-up delay-2">
                        <div class="w-40 shadow-2xl shadow-black/80 rounded-lg overflow-hidden rotate-3 ring-1 ring-white/10">
                            <img src="/uploads/<?= htmlspecialchars($hero['image']) ?>" alt="<?= htmlspecialchars($hero['title']) ?>" class="w-full">
                        </div>
                    </div>

                </section>
            <?php endforeach; ?>

            <!-- NAV SLIDE BUTTON -->
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex gap-3 z-20">
                <?php foreach ($stories as $i => $hero): ?>
                    <button
                        onclick="goToSlide(<?= $i ?>)"
                        id="dot-<?= $i ?>"
                        class="w-3 h-3 rounded-full bg-white/40 hover:bg-white transition">
                    </button>
                <?php endforeach; ?>
            </div>

        </div>

    <?php endif; ?>


    <!-- ═══════════════════════════════════════════
     BOOK GRID
═══════════════════════════════════════════ -->
    <main class="max-w-7xl mx-auto px-8 py-16">

        <?php if (isset($keyword)): ?>
            <div class="mb-10 border-b border-white/10 pb-6">
                <p class="text-white/40 text-xs uppercase tracking-widest mb-1">Hasil pencarian</p>
                <h2 class="font-display text-3xl font-bold">
                    "<?= htmlspecialchars($keyword) ?>"
                </h2>
            </div>
        <?php else: ?>
            <div class="mb-10">
                <p class="text-amber text-xs uppercase tracking-widest mb-2">✦ Koleksi</p>
                <h2 class="font-display text-3xl font-bold">Semua Buku</h2>
            </div>
        <?php endif; ?>


        <?php if (!empty($stories)): ?>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                <?php foreach ($stories as $i => $story): ?>

                    <div class="book-card group flex flex-col gap-3">

                        <a href="/read/<?= $story['id'] ?>" class="block">
                            <div class="book-cover relative aspect-[2/3] rounded-lg overflow-hidden shadow-xl shadow-black/50 bg-white/5">
                                <img
                                    src="/uploads/<?= htmlspecialchars($story['image']) ?>"
                                    alt="<?= htmlspecialchars($story['title']) ?>"
                                    class="w-full h-full object-cover"
                                    loading="lazy">
                                <!-- Hover overlay -->
                                <div class="absolute inset-0 bg-amber/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white text-xs font-medium bg-black/60 px-3 py-1 rounded-full backdrop-blur-sm">
                                        Baca →
                                    </span>
                                </div>
                            </div>
                        </a>

                        <div>
                            <h3 class="text-sm font-medium leading-snug line-clamp-2 text-cream/90 group-hover:text-amber transition-colors">
                                <?= htmlspecialchars($story['title']) ?>
                            </h3>
                            <?php if (!empty($story['author'])): ?>
                                <p class="text-xs text-white/40 mt-0.5"><?= htmlspecialchars($story['author']) ?></p>
                            <?php endif; ?>
                        </div>

                    </div>

                <?php endforeach; ?>
            </div>

        <?php else: ?>

            <div class="flex flex-col items-center justify-center py-32 text-center">
                <h3 class="font-display text-2xl font-bold mb-2">Buku tidak tersedia</h3>
                <p class="text-white/40 text-sm">Coba kata kunci lain atau jelajahi koleksi kami.</p>
                <a href="/" class="mt-6 text-amber text-sm hover:underline">← Kembali ke beranda</a>
            </div>

        <?php endif; ?>

    </main>

    <!-- Footer -->
    <footer class="border-t border-white/10 px-8 py-8">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-white/30 text-xs text-center md:text-left">
                © <?= date('Y') ?> Light's on — Read more, feel more.
            </p>
            <a href="/about"
                class="inline-flex items-center gap-2 px-6 py-2.5 text-sm font-medium tracking-wide text-ink bg-amber rounded-full hover:bg-amber/80 transition">
                About Us
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </footer>

    <!-- Slide -->
    <script>
        let current = 0;

        function getSlides() {
            return document.querySelectorAll('.hero-slide');
        }

        function updateDots() {
            const slides = getSlides();

            slides.forEach((_, i) => {
                const dot = document.getElementById(`dot-${i}`);
                if (!dot) return;

                dot.classList.remove('bg-white');
                dot.classList.add('bg-white/40');
            });

            const activeDot = document.getElementById(`dot-${current}`);
            if (activeDot) {
                activeDot.classList.remove('bg-white/40');
                activeDot.classList.add('bg-white');
            }
        }

        function showSlide(index) {
            const slides = getSlides();

            slides.forEach(slide => {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0');
            });

            slides[index].classList.remove('opacity-0');
            slides[index].classList.add('opacity-100', 'z-10');

            updateDots();
        }

        function goToSlide(index) {
            current = index;
            showSlide(current);
        }

        function nextSlide() {
            const slides = getSlides();
            current = (current + 1) % slides.length;
            showSlide(current);
        }

        function prevSlide() {
            const slides = getSlides();
            current = (current - 1 + slides.length) % slides.length;
            showSlide(current);
        }

        setInterval(() => {
            nextSlide();
        }, 5000);

        // pertama kali load
        updateDots();
    </script>
</body>

</html>