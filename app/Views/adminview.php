<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Page</title>
    <link rel="icon" type="image/x-icon" href="/bansal.ico">
    <link rel="stylesheet" href="/css/customer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <div class="navbar-brand ms-3 py-3 d-flex align-items-center">
                <a href="/index.php/adminview" class="d-flex align-items-center text-decoration-none">
                    <img src="/img/logo.png" alt="Logo" class="logo">
                    <h3 class="mb-0 ms-2 text-white">XXI.V Novel Store</h3>
                </a>
                <!-- Add user icon and text -->
                <div class="d-flex align-items-center ms-auto me-5 text-white position-absolute top-50 end-0 translate-middle-y opacity-75">
                    <i class="fas fa-user me-2"></i>
                    <span>Admin</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="text-white">
            <div class="ps-4 pt-4">
                <ul class="list-unstyled components">
                    <li class="active my-3">
                        <a href="/index.php/adminview"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="mb-3">
                        <a href="/NovelController/create"><i class="fas fa-plus"></i> Tambah Novel</a>
                    </li>
                    <li>
                        <a href="/" onclick="return confirm('Beneran nih mau Logout?');"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="content" class="container mt-5 pt-5">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h4 class="mt-2 mb-4 ms-3">DAFTAR NOVEL</h4>
                        <form action="" method="get">
                            <div class="input-group mb-3" style="max-width: 250px; margin-right: 50px;">
                                <input type="text" class="form-control" placeholder="Mau Cari Apa?" name="cari" autocomplete="off" value="<?= esc($cari) ?>">
                                <button class="btn btn-secondary" type="submit" name="submit">Cari</button>
                            </div>
                        </form>
                    </div>

                    <?php if (session()->getFlashdata('pesan',)) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>

                    <table class="table">
                        <thead>
                            <tr class="fs-5">
                                <th scope="col">No</th>
                                <th scope="col">Sampul</th>
                                <th scope="col">Judul Novel</th>
                                <th scope="col">Penulis Novel</th>
                                <th scope="col" class="aksi-tengah">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($novel)) : ?>
                                <?php
                                // Memastikan $currentPage adalah nilai numerik
                                $currentPage = (int) $currentPage ?: 1;
                                $i = 1 + (5 * ($currentPage - 1));
                                ?>
                                <?php foreach ($novel as $n) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><img src="<?= base_url('/img/' . $n['sampul']) ?>" class="sampul" alt="Sampul"></td>
                                        <td><?= esc($n['judul']); ?></td>
                                        <td><?= esc($n['penulis']); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/NovelController/<?= esc($n['slug']); ?>" class="btn btn-success">Detail</a>
                                                <a href="/NovelController/edit/<?= esc($n['slug']); ?>" class="btn btn-warning">Edit</a>
                                                <form action="/NovelController/<?= esc($n['id']); ?>" method="post">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Novelnya mau dihapus nih?');">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" style="text-align: center;">Barang yang dicari belum ada nih :&#40;</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="pager ms-3">
                        <?= $pager->links('novel', 'novel_pagination') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center">
        <div class="container">
            <p class="mb-0">Copyright &copy; Irsan Achmad Maulidan 2025</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>