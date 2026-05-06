<!DOCTYPE html>
<html>
<head>
    <title><?= $story['title']; ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <!-- 🔵 HEADER -->
    <div class="card bg-primary text-white p-4 mb-4 shadow-sm">
        <h2><?= $story['title']; ?></h2>
        <p class="mb-1">Written by <strong><?= $story['author']; ?></strong></p>
        <small>
            Published on <?= date('j/n/Y', strtotime($story['created_at'])); ?>
        </small>
    </div>

    <!-- 🖼️ GAMBAR -->
    <div class="mb-3">
        <img src="/uploads/<?= $story['image']; ?>" 
     class="img-fluid rounded d-block mx-auto shadow-sm " 
     style="max-width: 400px;">
    </div>

    <!-- 📖 ISI CERITA -->
    <div class="card shadow-sm p-4">
        <p style="white-space: pre-line;">
            <?= $story['story_detail']; ?>
        </p>
    </div>

</div>

</body>
</html>