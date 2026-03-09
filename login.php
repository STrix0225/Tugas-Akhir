<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: index.php");
    exit;
}

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    if ($username === 'admin' && $password === 'admin123') {

        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;

        if ($remember) {
            setcookie('remember_username', $username, time() + (86400 * 30), "/"); 
        } else {
            if(isset($_COOKIE['remember_username'])) {
                setcookie('remember_username', '', time() - 3600, "/");
            }
        }

        header("Location: index.php");
        exit;
    } else {
        $error_message = "Username atau password salah!";
    }
}

$saved_username = isset($_COOKIE['remember_username']) ? $_COOKIE['remember_username'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sisfor Gym</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 form-card rounded-3">
                    <div class="card-header bg-dark-gym text-white text-center py-4">
                        <h4 class="mb-0 text-accent"><i class="bi bi-activity"></i> Sisfor Gym</h4>
                        <p class="mb-0 mt-2 small">Sistem Manajemen Admin</p>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        <h5 class="fw-bold mb-4 text-center">Silakan Login</h5>
                        
                        <?php if(!empty($error_message)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-triangle-fill"></i> <?= $error_message ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label fw-semibold">Username</label>
                                <input type="text" class="form-control bg-light" id="username" name="username" value="<?= htmlspecialchars($saved_username) ?>" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control bg-light" id="password" name="password" required>
                            </div>
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input border-accent" id="remember" name="remember" <?= !empty($saved_username) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-gym w-100 py-2">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>