<?php
session_start();

require_once "config/database.php";

if (isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username'] ?? '');
    $password = md5($_POST['password'] ?? '');

    if ($username == '') {
        $error = "Username wajib diisi!";
    } else {

        $stmt = $koneksi->prepare(
            "SELECT id_user, nama, username, password, role
             FROM user
             WHERE username = ?"
        );

        if (!$stmt) {
            die("Query gagal: " . $koneksi->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $data = $result->fetch_assoc();

            if (hash_equals($data['password'], $password)) {

                session_regenerate_id(true);

                $_SESSION['id_user'] = $data['id_user'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['role'] = $data['role'];

                header("Location: index.php");
                exit;

            } else {
                $error = "Password yang Anda masukkan salah!";
            }

        } else {
            $error = "Username tidak ditemukan dalam sistem!";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Aplikasi Penjualan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f1f4f9;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 15px;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="card login-card shadow">

        <div class="card-body p-4 p-md-5">

            <div class="text-center mb-4">

                <h3 class="fw-bold text-primary">
                    Masuk Sistem
                </h3>

                <p class="text-muted small">
                    Aplikasi Penjualan & Kasir Modern
                </p>

            </div>

            <?php if ($error != ''): ?>

                <div class="alert alert-danger">
                    <?= htmlspecialchars($error) ?>
                </div>

            <?php endif; ?>

            <form action="login.php" method="POST">

                <div class="mb-3">

                    <label class="form-label fw-bold">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Masukkan username"
                        required
                    >

                </div>

                <div class="mb-4">

                    <label class="form-label fw-bold">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password"
                        required
                    >

                </div>

                <button type="submit"
                        class="btn btn-primary w-100 py-2 rounded-pill fw-bold">

                    Masuk Sekarang

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>