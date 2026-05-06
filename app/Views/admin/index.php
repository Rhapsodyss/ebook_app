admin

```<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Light's On</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
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
                        inklight: '#2A2A2A',
                        amber: '#C9943A',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'DM Sans', sans-serif; }

        .field input, .field textarea, .field input[type="file"] {
            background: #222;
            border: 1px solid rgba(255,255,255,0.1);
            color: #F5F0E8;
            border-radius: 8px;
            width: 100%;
            padding: 10px 14px;
            font-size: 14px;
            transition: border-color 0.2s;
            outline: none;
        }

        .field input:focus, .field textarea:focus {
            border-color: #C9943A;
        }

        .field input[type="file"] {
            padding: 8px 12px;
            cursor: pointer;
        }

        .field textarea {
            resize: vertical;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #1A1A1A; }
        ::-webkit-scrollbar-thumb { background: #333; border-radius: 3px; }
    </style>
</head>

<body class="bg-ink text-cream min-h-screen">

<!-- NAVBAR -->
<nav class="border-b border-white/10 px-8 py-4 flex items-center justify-between bg-ink/90 backdrop-blur-sm sticky top-0 z-50">
    <a href="/" class="font-display text-xl font-bold hover:text-amber transition-colors">
        💡 Light's on
    </a>
    <span class="text-white/30 text-xs uppercase tracking-widest">Admin Panel</span>
    <a href="/" class="text-sm text-white/40 hover:text-amber transition-colors">← Lihat Site</a>
</nav>


<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- PAGE TITLE -->
    <div class="mb-8">
        <p class="text-amber text-xs uppercase tracking-[0.25em] mb-1">✦ Dashboard</p>
        <h1 class="font-display text-3xl font-black">
            <?= isset($edit) ? 'Edit Cerita' : 'Kelola Cerita' ?>
        </h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- ═══════════════════════════
             FORM
        ═══════════════════════════ -->
        <div class="bg-inklight rounded-2xl p-6 border border-white/10">

            <h2 class="font-display text-lg font-bold mb-6 pb-4 border-b border-white/10">
                <?= isset($edit) ? '✏️ Edit Cerita' : '＋ Tambah Cerita' ?>
            </h2>

            <form
                action="<?= isset($edit) ? '/admin/update/'.$edit['id'] : '/admin/store' ?>"
                method="post"
                enctype="multipart/form-data"
                class="space-y-4"
            >

                <div class="field">
                    <label class="block text-xs text-white/40 uppercase tracking-wider mb-1.5">Judul</label>
                    <input type="text" name="title"
                           value="<?= htmlspecialchars($edit['title'] ?? '') ?>"
                           placeholder="Judul cerita...">
                </div>

                <div class="field">
                    <label class="block text-xs text-white/40 uppercase tracking-wider mb-1.5">Penulis</label>
                    <input type="text" name="author"
                           value="<?= htmlspecialchars($edit['author'] ?? '') ?>"
                           placeholder="Nama penulis...">
                </div>

                <div class="grid grid-cols-2 gap-4">

                    <div class="field">
                        <label class="block text-xs text-white/40 uppercase tracking-wider mb-1.5">Cover</label>
                        <input type="file" name="image" accept="image/*">
                        <?php if (!empty($edit['image'])): ?>
                            <img src="/uploads/<?= htmlspecialchars($edit['image']) ?>"
                                 class="mt-2 w-full h-24 object-cover rounded-lg opacity-70">
                        <?php endif; ?>
                    </div>

                    <div class="field">
                        <label class="block text-xs text-white/40 uppercase tracking-wider mb-1.5">Background</label>
                        <input type="file" name="background_image" accept="image/*">
                        <?php if (!empty($edit['background_image'])): ?>
                            <img src="/uploads/<?= htmlspecialchars($edit['background_image']) ?>"
                                 class="mt-2 w-full h-24 object-cover rounded-lg opacity-70">
                        <?php endif; ?>
                    </div>

                </div>

                <div class="field">
                    <label class="block text-xs text-white/40 uppercase tracking-wider mb-1.5">Deskripsi</label>
                    <textarea name="description" rows="2"
                              placeholder="Sinopsis singkat..."><?= htmlspecialchars($edit['description'] ?? '') ?></textarea>
                </div>

                <div class="field">
                    <label class="block text-xs text-white/40 uppercase tracking-wider mb-1.5">Detail Cerita</label>
                    <textarea name="story_detail" rows="8"
                              placeholder="Isi cerita lengkap..."><?= htmlspecialchars($edit['story_detail'] ?? '') ?></textarea>
                </div>

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                            class="bg-amber text-ink font-medium text-sm px-6 py-2.5 rounded-full hover:bg-amber/90 transition-colors">
                        <?= isset($edit) ? 'Simpan Perubahan' : 'Tambahkan Cerita' ?>
                    </button>

                    <?php if (isset($edit)): ?>
                        <a href="/admin"
                           class="text-sm text-white/40 hover:text-cream transition-colors px-4 py-2.5">
                            Batal
                        </a>
                    <?php endif; ?>
                </div>

            </form>
        </div>


        <!-- ═══════════════════════════
             LIST
        ═══════════════════════════ -->
        <div class="bg-inklight rounded-2xl p-6 border border-white/10">

            <h2 class="font-display text-lg font-bold mb-6 pb-4 border-b border-white/10">
                📚 Daftar Cerita
                <span class="text-white/30 font-body font-normal text-sm ml-2">(<?= count($stories) ?>)</span>
            </h2>

            <div class="space-y-2 max-h-[600px] overflow-y-auto pr-1">

                <?php if (!empty($stories)): ?>
                    <?php foreach ($stories as $s): ?>

                    <div class="flex items-center justify-between gap-3 p-3 rounded-xl hover:bg-white/5 transition-colors group <?= isset($edit) && $edit['id'] == $s['id'] ? 'bg-amber/10 border border-amber/20' : '' ?>">

                        <div class="flex items-center gap-3 min-w-0">
                            <?php if (!empty($s['image'])): ?>
                                <img src="/uploads/<?= htmlspecialchars($s['image']) ?>"
                                     class="w-10 h-10 rounded-lg object-cover flex-shrink-0 opacity-80">
                            <?php else: ?>
                                <div class="w-10 h-10 rounded-lg bg-white/10 flex-shrink-0 flex items-center justify-center text-white/30 text-xs">
                                    ?
                                </div>
                            <?php endif; ?>

                            <div class="min-w-0">
                                <p class="text-sm font-medium truncate <?= isset($edit) && $edit['id'] == $s['id'] ? 'text-amber' : 'text-cream/80' ?>">
                                    <?= htmlspecialchars($s['title']) ?>
                                </p>
                                <p class="text-xs text-white/30 truncate"><?= htmlspecialchars($s['author'] ?? '') ?></p>
                            </div>
                        </div>

                        <div class="flex items-center gap-1 flex-shrink-0">
                            <a href="/admin/edit/<?= $s['id'] ?>"
                               class="text-xs px-3 py-1.5 rounded-full border border-white/10 text-white/50 hover:border-amber hover:text-amber transition-colors">
                                Edit
                            </a>
                            <a href="/admin/delete/<?= $s['id'] ?>"
                               onclick="return confirm('Hapus cerita ini?')"
                               class="text-xs px-3 py-1.5 rounded-full border border-white/10 text-white/50 hover:border-red-500 hover:text-red-400 transition-colors">
                                Hapus
                            </a>
                        </div>

                    </div>

                    <?php endforeach; ?>

                <?php else: ?>
                    <div class="text-center py-16 text-white/20">
                        <p class="text-4xl mb-3">📭</p>
                        <p class="text-sm">Belum ada cerita</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    </div>
</div>

</body>
</html>```