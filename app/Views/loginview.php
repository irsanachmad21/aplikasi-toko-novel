<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login Page</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/bansal.ico">
    <style>
        body {
            background-color: #3572EF;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            display: flex;
            flex-direction: row;
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 1000px;
            width: 50%;
            transform: translateY(-18%);
        }

        .poster-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #3572EF;
            padding: 0;
        }

        .poster {
            max-width: 100%;
            height: 100%;
        }

        .login-box {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            margin-bottom: 5px;
        }

        .hide {
            display: none;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="poster-container d-none d-md-flex">
            <img src="/img/poster.jpg" class="poster" alt="Poster Novel">
        </div>
        <div class="login-box">
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-info">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url('UserController/auth') ?>">
                <h1 id="welcome-text" class="h3 mb-4 font-weight-normal text-center">Selamat Datang</h1>
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" class="form-control" name="username" required="" placeholder="Masukkan Username" autofocus autocomplete="off">
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" id="password" name="password" required="" placeholder="Masukkan Password">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="togglePassword">
                        <label class="form-check-label" for="togglePassword">Show Password</label>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-primary btn-block w-100 btn-login" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if there's an alert
            const alert = document.querySelector('.alert');
            if (alert) {
                // Hide the welcome text if there's an alert
                document.getElementById('welcome-text').classList.add('hide');
            }
        });

        document.getElementById('togglePassword').addEventListener('change', function() {
            var passwordField = document.getElementById('password');
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</body>

</html>