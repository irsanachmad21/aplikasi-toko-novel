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
                    <li>
                        <a href="/" onclick="return confirm('Yakin Ingin Logout?');"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        <main id="content" class="container position-absolute top-50 start-0 translate-middle-y mt-2">
            <h2 style="margin-bottom:30px;">Form Ubah Data Novel</h2>
            <?php $validation->listErrors(); ?>
            <form action="/NovelController/update/<?= esc($novel['id']); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= esc($novel['slug']); ?>">
                <input type="hidden" name="sampulLama" value="<?= esc($novel['sampul']); ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Novel</label>
                            <input type="text" class="form-control input-short" id="judul" name="judul" required value="<?= esc($novel['judul']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control input-short" id="penulis" name="penulis" required value="<?= esc($novel['penulis']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit Novel</label>
                            <input type="text" class="form-control input-short" id="penerbit" name="penerbit" required value="<?= esc($novel['penerbit']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="text" class="form-control input-short" id="tahun_terbit" name="tahun_terbit" required value="<?= esc($novel['tahun_terbit']); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
                            <input type="text" class="form-control input-short" id="jumlah_halaman" name="jumlah_halaman" required value="<?= esc($novel['jumlah_halaman']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok Novel</label>
                            <input type="text" inputmode="numeric" class="form-control input-short" id="stok" name="stok" required value="<?= esc($novel['stok']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Novel</label>
                            <input type="text" class="form-control input-short" id="harga" name="harga" required value="<?= esc($novel['harga']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="sampul" class="form-label">Sampul <i style="font-size: 12px;">(ukuran maksimal 2MB)</i></label>
                            <input type="file" class="form-control" id="sampul" name="sampul" onchange="previewImg();" style="max-width: 500px;">
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-start">
                    <div class="tombol d-flex flex-column me-3 mt-3">
                        <button type="submit" class="btn btn-primary btn-margin-top p-2" style="width: 230px; text-align: center">Ubah Novel</button>
                    </div>
                    <div class="col-sm-2">
                        <img src="/img/<?= esc($novel['sampul']); ?>" class="img-thumbnail img-preview" style="width: 100px; margin-left: 340px;">
                    </div>
                </div>
            </form>
        </main>
    </div>

    <footer class="text-center">
        <div class="container">
            <p class="mb-0">Copyright &copy; Irsan Achmad Maulidan 2025</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImg() {
            const sampul = document.querySelector('#sampul');
            const imgPreview = document.querySelector('.img-preview');

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>