<?php
// Mulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">
    <?php
    // Tampilkan menu navigasi sesuai jenis pengguna
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true): 
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?c=produk&page=list">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?c=pelanggan&page=list">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?c=penjualan&page=list">Penjualan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?c=penjualan&page=keranjang">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?c=penjualan&page=riwayat">Riwayat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?c=login&page=logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php else: ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Toko Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?c=penjualan&page=list">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?c=penjualan&page=keranjang">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?c=penjualan&page=riwayat">Riwayat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?c=login&page=logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php endif; ?>

    <h1 class="mb-4">Riwayat Pembelian</h1>
    
    <?php if (empty($riwayat)): ?>
    <div class="alert alert-info">
        Anda belum memiliki riwayat pembelian. <a href="index.php?c=penjualan&page=list" class="alert-link">Mulai berbelanja</a>.
    </div>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($riwayat as $item): 
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= date('d-m-Y', strtotime($item['tanggalpenjualan'])) ?></td>
                    <td>Rp <?= number_format($item['totalharga'], 0, ',', '.') ?></td>
                    <td>
                        <a href="index.php?c=penjualan&page=detail_riwayat&id=<?= $item['penjualanid'] ?>" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
    
    <div class="mt-3">
        <a href="index.php?c=penjualan&page=list" class="btn btn-primary">Kembali ke Produk</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
