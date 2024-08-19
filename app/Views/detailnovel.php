<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Detail Novel</title>
    <link rel="icon" type="image/x-icon" href="/bansal.ico">
    <link rel="stylesheet" href="/css/detail.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <div class="navbar-brand ms-3 py-3 d-flex align-items-center">
                <a href="<?= base_url('/customerview') ?>" class="d-flex align-items-center text-decoration-none">
                    <img src="/img/logo.png" alt="Logo" class="logo">
                    <h3 class="mb-0 ms-2 text-white">XXI.V Novel Store</h3>
                </a>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="text-white">
            <div class="ps-4 pt-4">
                <ul class="list-unstyled components">
                    <li class="active my-3">
                        <a href="#"><i class="fas fa-home"></i> Detail Novel</a>
                    </li>
                    <li>
                        <a href="/" onclick="return confirm('Yakin Ingin Logout?');"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="content" class="container mt-5 pt-5">
            <div class="card position-absolute top-50 start-50 translate-middle" style="max-width: 1000px;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex"> <!-- Menambahkan d-flex untuk menyesuaikan gambar dengan card -->
                        <img src="<?= base_url('/img/' . $novel['sampul']) ?>" class="img-fluid rounded-start custom-img-size" alt="Sampul Novel">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body fs-6 my-2">
                            <h4 class="card-title text-uppercase"><?= esc($novel['judul']); ?></h4>
                            <p class="card-text my-4"><b>Penulis Novel:</b> <?= esc($novel['penulis']); ?></p>
                            <p class="card-text my-4"><b>Penerbit Novel:</b> <?= esc($novel['penerbit']); ?></p>
                            <p class="card-text my-4"><b>Tahun Terbit:</b> <?= esc($novel['tahun_terbit']); ?></p>
                            <p class="card-text my-4"><b>Jumlah Halaman:</b> <?= esc($novel['jumlah_halaman']); ?> Halaman</p>
                            <p class="card-text my-4"><b>Stok Novel:</b> <?= esc($novel['stok']); ?> Novel</p>
                            <p class="card-text"><b>Harga Novel:</b> Rp <?= number_format($novel['harga'], 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="text-center mt-6" style="position: relative;">
        <div class="container">
            <p class="mb-0">Copyright &copy; Irsan Achmad Maulidan 2025</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>