<?php

/*
|--------------------------------------------------------------------------
| Pagination Cerita per Halaman
|--------------------------------------------------------------------------
|
| Cerita dibagi berdasarkan paragraf agar terasa seperti membaca buku.
|
*/

$content = $story['story_detail'];

$paragraphs = explode("\n", $content);

$pages = [];
$temp = '';

foreach ($paragraphs as $paragraph) {

    if (strlen($temp . $paragraph) > 1800) {
        $pages[] = $temp;
        $temp = '';
    }

    $temp .= $paragraph . "\n";
}

if (!empty($temp)) {
    $pages[] = $temp;
}

$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$totalPages = count($pages);

if ($currentPage < 1) {
    $currentPage = 1;
}

if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

$currentContent = $pages[$currentPage - 1];

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($story['title']) ?> — Light's On</title>

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

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-up {
            animation: fadeUp 0.7s ease forwards;
        }

        .delay-1 {
            animation-delay: 0.1s;
            opacity: 0;
        }

        .delay-2 {
            animation-delay: 0.25s;
            opacity: 0;
        }

        .delay-3 {
            animation-delay: 0.4s;
            opacity: 0;
        }
    </style>
</head>

<body class="bg-ink text-cream min-h-screen">

    <!-- NAVBAR -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-ink/80 backdrop-blur-sm border-b border-white/10">

        <div class="max-w-7xl mx-auto px-3 py-4 flex items-center justify-between">

            <a href="/" class="font-display text-xl md:text-2xl font-bold tracking-tight text-cream hover:text-amber transition-colors">
                💡 Light's on
            </a>

            <a href="/" class="text-sm text-white/50 hover:text-amber transition-colors flex items-center gap-2">
                <span class="text-lg leading-none">←</span>
                <span class="hidden sm:inline">Kembali</span>
            </a>

        </div>

    </nav>

    <main class="max-w-2xl mx-auto px-6 pt-28 pb-20">

        <!-- META -->
        <div class="fade-up mb-3">
            <p class="text-amber text-xs uppercase tracking-[0.25em]">
                ✦ Buku
            </p>
        </div>

        <!-- TITLE -->
        <h1 class="fade-up delay-1 font-display text-4xl md:text-5xl font-black leading-tight mb-4">
            <?= htmlspecialchars($story['title']) ?>
        </h1>

        <!-- AUTHOR -->
        <div class="fade-up delay-1 flex items-center gap-3 text-white/40 text-sm mb-10 pb-6 border-b border-white/10">

            <span>
                by
                <span class="text-cream/70 font-medium">
                    <?= htmlspecialchars($story['author']) ?>
                </span>
            </span>

            <span class="w-1 h-1 rounded-full bg-white/20"></span>

            <span>
                <?= date('j F Y', strtotime($story['created_at'])) ?>
            </span>

        </div>

        <!-- COVER IMAGE -->
        <?php if (!empty($story['image'])): ?>
            <div class="fade-up delay-2 mb-10">

                <div class="rounded-xl overflow-hidden shadow-2xl shadow-black/60 ring-1 ring-white/10 max-w-xs mx-auto">

                    <img
                        src="/uploads/<?= htmlspecialchars($story['image']) ?>"
                        alt="<?= htmlspecialchars($story['title']) ?>"
                        class="w-full object-cover">

                </div>

            </div>
        <?php endif; ?>

        <!-- STORY CONTENT -->
        <article class="fade-up delay-3 text-cream/80 text-base leading-8 font-body text-justify max-w-2xl mx-auto">

            <?php
            $lines = explode("\n", $currentContent);
            $paragraphs = [];
            $currentParagraph = '';

            foreach ($lines as $line) {
                $line = trim($line);

                if ($line === '') {
                    // kosong = paragraf baru
                    if ($currentParagraph !== '') {
                        $paragraphs[] = $currentParagraph;
                        $currentParagraph = '';
                    }
                } else {
                    // gabung baris
                    $currentParagraph .= ($currentParagraph ? ' ' : '') . $line;
                }
            }

            // terakhir
            if ($currentParagraph !== '') {
                $paragraphs[] = $currentParagraph;
            }

            // render
            foreach ($paragraphs as $p) {
                echo "<p class='mb-5 text-justify indent-8'>" . htmlspecialchars($p) . "</p>";
            }
            ?>

        </article>

        <!-- PAGINATION -->
        <div class="mt-14 grid grid-cols-3 items-center border-t border-white/10 pt-8">

            <!-- PREVIOUS -->
            <div class="justify-self-start">
                <?php if ($currentPage > 1): ?>
                    <a
                        href="?page=<?= $currentPage - 1 ?>"
                        class="px-5 py-2 rounded-full border border-white/10 text-sm text-cream hover:bg-white/5 transition">
                        ← Previous
                    </a>
                <?php endif; ?>
            </div>

            <!-- PAGE INFO (CENTER PERFECT) -->
            <div class="text-center text-white/40 text-xs tracking-[0.2em] uppercase">
                Page <?= $currentPage ?> / <?= $totalPages ?>
            </div>

            <!-- NEXT -->
            <div class="justify-self-end">
                <?php if ($currentPage < $totalPages): ?>
                    <a
                        href="?page=<?= $currentPage + 1 ?>"
                        class="px-5 py-2 rounded-full bg-amber text-black text-sm font-medium hover:opacity-90 transition">
                        Next →
                    </a>
                <?php endif; ?>
            </div>

        </div>

        <!-- FOOTER -->
        <div class="mt-20 text-center">
            <a href="/"
                class="inline-flex items-center gap-2 text-sm text-white/60 hover:text-amber transition">

                <span class="text-lg leading-none">←</span>
                <span>Baca buku lainnya</span>
            </a>
        </div>

    </main>

    <footer class="border-t border-white/10 px-8 py-6 text-center text-white/30 text-xs">

        © <?= date('Y') ?> Light's on — Read more, feel more.

    </footer>

</body>

</html>