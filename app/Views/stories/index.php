<!DOCTYPE html>
<html>
<head>
    <title>Story App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { margin: 0; }

        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: white;
            text-align: center;
            position: relative;
        }

        .overlay {
            background: rgba(0,0,0,0.5);
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .card-book {
            width: 200px;
            border-radius: 10px;
            overflow: hidden;
        }

        .card-book img { width: 100%; }

        .navbar-custom {
            position: absolute;
            width: 100%;
            z-index: 10;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-light bg-light px-4 navbar-custom">
    <span class="navbar-brand">💡 Light's on</span>

    <form action="/search" method="get" style="display:flex;">
        <input type="text" name="keyword" placeholder="Cari Buku"
               style="border:none; outline:none;">
    </form>

    <span>Read on with <b>Light's on</b></span>
</nav>

<?php if(!isset($keyword)): ?>

<!-- 🔥 HERO (HANYA SAAT TIDAK SEARCH) -->
<?php $hero = $stories[0] ?? null; ?>
<?php if($hero): ?>
<div class="hero" style="background: url('/uploads/<?= $hero['background_image']; ?>') center/cover;">
    
    <div class="overlay"></div>

    <div class="hero-content">
        <h1><?= $hero['title']; ?></h1>
        <p><?= $hero['author']; ?></p>

        <div class="card-book mx-auto my-3">
            <img src="/uploads/<?= $hero['image']; ?>">
        </div>

        <p><?= $hero['description']; ?></p>

        <a href="/read/<?= $hero['id']; ?>" class="btn btn-light">
            Baca Sekarang
        </a>
    </div>
</div>
<?php endif; ?>

<?php endif; ?>


<!-- 🔍 HASIL SEARCH -->
<div class="container mt-5">

<?php if(isset($keyword)): ?>
    <h5>Hasil pencarian: <b><?= $keyword; ?></b></h5>
<?php endif; ?>

<div class="d-flex flex-wrap gap-3">

<?php if(!empty($stories)): ?>
    <?php foreach($stories as $story): ?>

        <div class="card" style="width: 200px;">
            <img src="/uploads/<?= $story['image']; ?>" 
                 style="height:250px; object-fit:cover;">

            <div class="card-body">
                <h6><?= $story['title']; ?></h6>

                <a href="/read/<?= $story['id']; ?>" class="btn btn-sm btn-primary">
                    Read
                </a>
            </div>
        </div>

    <?php endforeach; ?>
<?php else: ?>
    <div class="text-center mt-5">
        <h5>Tidak ada cerita ditemukan</h5>
    </div>
<?php endif; ?>

</div>
</div>

</body>
</html>