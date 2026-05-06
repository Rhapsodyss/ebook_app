<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h3 class="mb-4">Admin - Tambah dan Kelola Cerita</h3>

    <div class="row">

        <!-- 🔹 FORM KIRI -->
        <div class="col-md-6">
            <div class="card shadow-sm p-4">

                <h5>
                    <?= isset($edit) ? 'Edit Cerita' : 'Tambah Cerita'; ?>
                </h5>

                <form action="<?= isset($edit) ? '/admin/update/'.$edit['id'] : '/admin/store'; ?>" 
                      method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control"
                               value="<?= isset($edit) ? $edit['title'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label>Penulis</label>
                        <input type="text" name="author" class="form-control"
                               value="<?= isset($edit) ? $edit['author'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label>Gambar</label>
                        <input type="file" name="image" class="form-control">

                        <?php if(isset($edit) && $edit['image']): ?>
                            <img src="/uploads/<?= $edit['image']; ?>" width="100" class="mt-2">
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>Gambar Latar Belakang</label>
                        <input type="file" name="background_image" class="form-control">

                        <?php if(isset($edit) && $edit['background_image']): ?>
                            <img src="/uploads/<?= $edit['background_image']; ?>" width="100" class="mt-2">
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control"><?= isset($edit) ? $edit['description'] : ''; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Detail Cerita</label>
                        <textarea name="story_detail" class="form-control" rows="5"><?= isset($edit) ? $edit['story_detail'] : ''; ?></textarea>
                    </div>

                    <button class="btn btn-primary">
                        <?= isset($edit) ? 'Update Cerita' : 'Tambahkan Cerita'; ?>
                    </button>

                    <?php if(isset($edit)): ?>
                        <a href="/admin" class="btn btn-secondary ms-2">Cancel</a>
                    <?php endif; ?>

                </form>
            </div>
        </div>

        <!-- 🔹 LIST KANAN -->
        <div class="col-md-6">
            <div class="card shadow-sm p-4">

                <h5>Daftar Cerita</h5>

                <?php foreach($stories as $s): ?>
                    <div class="border-bottom py-2">

                        <strong><?= $s['title']; ?></strong><br>

                        <a href="/admin/edit/<?= $s['id']; ?>" class="text-primary">Edit</a>
                        <a href="/admin/delete/<?= $s['id']; ?>" class="text-danger" onclick="return confirm('Hapus?')">Hapus</a>

                    </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>
</div>

</body>
</html>