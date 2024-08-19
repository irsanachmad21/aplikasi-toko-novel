<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Customer Page</title>
    <link rel="icon" type="image/x-icon" href="/bansal.ico">
    <link rel="stylesheet" href="/css/customer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <div class="navbar-brand ms-3 py-3 d-flex align-items-center">
                <a href="/index.php/customerview" class="d-flex align-items-center text-decoration-none">
                    <img src="/img/logo.png" alt="Logo" class="logo">
                    <h3 class="mb-0 ms-2 text-white">XXI.V Novel Store</h3>
                </a>
                <div class="d-flex align-items-center ms-auto me-5 text-white position-absolute top-50 end-0 translate-middle-y opacity-75">
                    <i class="fas fa-user me-2"></i>
                    <span>Customer</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <nav id="sidebar" class="text-white">
            <div class="ps-4 pt-4">
                <ul class="list-unstyled components">
                    <li class="active my-3">
                        <a href="/index.php/customerview"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="mb-3">
                        <a href="#" id="cartLink"><i class="fas fa-shopping-cart"></i> Cart</a>
                    </li>
                    <li>
                        <a href="/" onclick="return confirm('Beneran nih mau Logout?');"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="content" class="container mt-5 pt-5">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h4 class="mt-3 mb-4 ms-3">DAFTAR NOVEL</h4>
                        <form action="" method="get">
                            <div class="input-group mb-3" style="max-width: 250px; margin-right: 50px;">
                                <input type="text" class="form-control" placeholder="Mau Cari Apa?" name="cari" autocomplete="off" value="<?= esc($cari) ?>">
                                <button class="btn btn-secondary" type="submit" name="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                    <table class="table">
                        <thead>
                            <tr class="fs-5">
                                <th scope="col">No</th>
                                <th scope="col">Sampul</th>
                                <th scope="col">Judul Novel</th>
                                <th scope="col">Penulis Novel</th>
                                <th scope="col">Harga Novel</th>
                                <th scope="col" class="aksi-tengah">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($novel)) : ?>
                                <?php
                                $currentPage = (int) $currentPage ?: 1;
                                $i = 1 + (5 * ($currentPage - 1));
                                ?>
                                <?php foreach ($novel as $n) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><img src="<?= base_url('/img/' . $n['sampul']) ?>" class="sampul" alt="Sampul"></td>
                                        <td><?= esc($n['judul']); ?></td>
                                        <td><?= esc($n['penulis']); ?></td>
                                        <td><?= 'Rp ' . number_format($n['harga'], 0, ',', '.'); ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/NovelController/<?= esc($n['slug']); ?>" class="btn btn-success">
                                                    Detail
                                                </a>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-secondary add-to-cart" data-id="<?= esc($n['id']); ?>" data-title="<?= esc($n['judul']); ?>" data-price="<?= esc($n['harga']); ?>" data-image="<?= base_url('/img/' . $n['sampul']) ?>">
                                                        <i class="fas fa-shopping-cart"></i>
                                                    </button>
                                                </div>
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

    <div id="cartSidebar">
        <div class="cart-sidebar-header">
            <h4>Keranjang Saya</h4>
            <button id="closeCart" class="btn btn-light">Close</button>
        </div>
        <div class="container">
            <div class="mb-3">
                <button id="clearCart" class="btn btn-danger fw-bolder">Hapus Semua</button>
            </div>
            <ul id="cartItems" class="list-unstyled">
                <!-- Cart items will be populated here -->
            </ul>
            <div class="text-center my-4">
                <div>
                    <span class="fw-bold">Total Belanja : </span>
                    <span class="item-price">Rp 0</span>
                </div>
                <div class="mt-3">
                    <button id="checkoutBtn" class="btn btn-success w-100 fw-bolder">Checkout</button>
                </div>
            </div>
        </div>
    </div>

    <div id="overlay"></div> <!-- Overlay element -->

    <div id="checkoutPopup" class="popup">
        <div class="popup-header">
            <h5>Checkout Berhasil!</h5>
            <button id="closePopup">&times;</button>
        </div>
        <div class="popup-body">
            <h6>Daftar Novel yang Dibeli:</h6>
            <ul id="checkoutList" class="list-unstyled">
                <!-- Items will be populated here -->
            </ul>
            <div class="text-end">
                <h6>Total Harga: <span id="checkoutTotal">Rp 0</span></h6>
            </div>
            <div class="text-center mt-4">
                <button id="confirmCheckout" class="btn btn-primary w-100 fw-bold">Oke</button>
            </div>
        </div>
    </div>

    <footer class="text-center">
        <div class="container">
            <p class="mb-0">Copyright &copy; Irsan Achmad Maulidan 2025</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add to cart functionality
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.dataset.id;
                    const title = this.dataset.title;
                    const price = this.dataset.price;
                    const image = this.dataset.image;

                    const cartItem = {
                        id,
                        title,
                        price,
                        image,
                        quantity: 1
                    };

                    let cart = JSON.parse(localStorage.getItem('cart')) || [];
                    const exists = cart.find(item => item.id === id);
                    if (!exists) {
                        cart.push(cartItem);
                        localStorage.setItem('cart', JSON.stringify(cart));
                        this.classList.add('checked');
                        this.querySelector('i').classList.replace('fa-shopping-cart', 'fa-check');
                        updateCartItems();
                    }
                });
            });

            // Show cart sidebar
            const cartLink = document.getElementById('cartLink');
            const cartSidebar = document.getElementById('cartSidebar');
            cartLink.addEventListener('click', function(e) {
                e.preventDefault();
                cartSidebar.classList.toggle('active');
                updateCartItems();
            });

            // Close cart sidebar
            const closeCart = document.getElementById('closeCart');
            closeCart.addEventListener('click', function() {
                cartSidebar.classList.remove('active');
            });

            // Clear all items from cart
            const clearCartButton = document.getElementById('clearCart');
            clearCartButton.addEventListener('click', function() {
                localStorage.removeItem('cart');
                updateCartItems();
            });

            // Update cart items in sidebar
            function updateCartItems() {
                const cartItemsContainer = document.getElementById('cartItems');
                cartItemsContainer.innerHTML = '';
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                let totalPrice = 0;
                cart.forEach(item => {
                    totalPrice += item.price * item.quantity;
                    const li = document.createElement('li');
                    li.classList.add('mb-3');
                    li.innerHTML = `
                        <div class="d-flex align-items-center">
                            <img src="${item.image}" alt="${item.title}" class="img-thumbnail me-3" style="width: 50px; height: 75px;">
                            <div class="flex-grow-1">
                                <h6>${item.title}</h6>
                                <p class="mb-0">Rp ${parseInt(item.price).toLocaleString('id-ID')}</p>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-secondary btn-sm decrease-quantity" data-id="${item.id}">-</button>
                                    <input type="text" class="form-control text-center mx-2" value="${item.quantity}" style="width: 60px;" readonly>
                                    <button class="btn btn-secondary btn-sm increase-quantity" data-id="${item.id}">+</button>
                                </div>
                            </div>
                            <button class="btn btn-danger btn-sm remove-from-cart ms-2" data-id="${item.id}">&times;</button>
                        </div>
                    `;
                    cartItemsContainer.appendChild(li);
                });

                // Update total price
                const totalPriceElement = document.querySelector('#cartSidebar .item-price');
                totalPriceElement.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;

                // Add event listeners for quantity buttons
                const increaseQuantityButtons = document.querySelectorAll('.increase-quantity');
                const decreaseQuantityButtons = document.querySelectorAll('.decrease-quantity');

                increaseQuantityButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.dataset.id;
                        let cart = JSON.parse(localStorage.getItem('cart')) || [];
                        const item = cart.find(item => item.id === id);
                        item.quantity += 1;
                        localStorage.setItem('cart', JSON.stringify(cart));
                        updateCartItems();
                    });
                });

                decreaseQuantityButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.dataset.id;
                        let cart = JSON.parse(localStorage.getItem('cart')) || [];
                        const item = cart.find(item => item.id === id);
                        if (item.quantity > 1) {
                            item.quantity -= 1;
                            localStorage.setItem('cart', JSON.stringify(cart));
                            updateCartItems();
                        }
                    });
                });

                // Show checkout popup
                const checkoutBtn = document.getElementById('checkoutBtn');
                const checkoutPopup = document.getElementById('checkoutPopup');
                const closePopup = document.getElementById('closePopup');
                const confirmCheckoutBtn = document.getElementById('confirmCheckout');
                const overlay = document.getElementById('overlay');

                checkoutBtn.addEventListener('click', function() {
                    const cart = JSON.parse(localStorage.getItem('cart')) || [];
                    const checkoutList = document.getElementById('checkoutList');
                    const checkoutTotal = document.getElementById('checkoutTotal');
                    checkoutList.innerHTML = '';
                    let totalPrice = 0;

                    cart.forEach(item => {
                        totalPrice += item.price * item.quantity;
                        const li = document.createElement('li');
                        li.classList.add('mb-3');
                        li.innerHTML = `
                            <div class="d-flex align-items-center">
                                <img src="${item.image}" alt="${item.title}" class="img-thumbnail me-3" style="width: 50px; height: 75px;">
                                <div class="flex-grow-1">
                                    <h6>${item.title}</h6>
                                    <p class="mb-0">Jumlah: ${item.quantity}</p>
                                    <p class="mb-0">Harga per item: Rp ${parseInt(item.price).toLocaleString('id-ID')}</p>
                                </div>
                            </div>
                        `;
                        checkoutList.appendChild(li);
                    });

                    checkoutTotal.textContent = `Rp ${totalPrice.toLocaleString('id-ID')}`;
                    overlay.classList.add('active'); // Show overlay
                    checkoutPopup.classList.add('active');
                });

                closePopup.addEventListener('click', function() {
                    overlay.classList.remove('active'); // Hide overlay
                    checkoutPopup.classList.remove('active');
                });

                // Confirm checkout and clear cart
                confirmCheckoutBtn.addEventListener('click', function() {
                    localStorage.removeItem('cart');
                    updateCartItems();
                    overlay.classList.remove('active'); // Hide overlay
                    checkoutPopup.classList.remove('active');
                    window.location.href = '/index.php/customerview';
                });

                // Add event listener to remove buttons
                const removeFromCartButtons = document.querySelectorAll('.remove-from-cart');
                removeFromCartButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const id = this.dataset.id;
                        let cart = JSON.parse(localStorage.getItem('cart')) || [];
                        cart = cart.filter(item => item.id !== id);
                        localStorage.setItem('cart', JSON.stringify(cart));
                        updateCartItems();
                    });
                });
            }
            
            updateCartItems();
        });
    </script>
</body>

</html>