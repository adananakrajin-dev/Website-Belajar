<?php
include 'database.php';
session_start();

if (isset($_SESSION["sudah_login"])) {
    header("Location: dashboard.html"); 
    exit;
}

if(isset($_POST['submit_register'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $check_user = "SELECT * FROM users WHERE username='$username'";
    $result = $db->query($check_user);

    if($result->num_rows > 0) {
        echo "<script>alert('Username sudah terdaftar! Gunakan nama lain.');</script>";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        
        if($db->query($sql)) {
            echo "<script>
                    alert('Registrasi Berhasil! Silahkan Login.');
                    window.location.href='login.php';
                  </script>";
        } else {
            echo "<script>alert('Gagal mendaftar, coba lagi nanti.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | StudyHub</title>
    <!-- Font & Icon -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body"> <!-- Pake class yang sama dengan login biar backgroundnya sinkron -->

<header class="auth-nav">
    <div class="logo">Study<span>Hub</span></div>
    <div class="nav-links">
        <a href="home.html">Home</a>
        <a href="login.php">Login</a>
    </div>
</header>

<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">
            <i class="fas fa-user-plus"></i>
            <h3>Buat Akun Baru</h3>
            <p>Mulai perjalanan belajarmu bersama kami</p>
        </div>

        <form action="register.php" method="POST" class="login-form">
            <div class="input-group">
                <label>Username</label>
                <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Pilih username" name="username" required/>
                </div>
            </div>

            <div class="input-group">
                <label>Email</label>
                <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="contoh@sekolah.sch.id" name="email" required/>
                </div>
            </div>
            
            <div class="input-group">
                <label>Password</label>
                <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Masukkan Password" name="password" required/>
                </div>
            </div>
            
            <button type="submit" name="submit_register" class="btn-primary">Daftar Sekarang</button>
            
            <div class="login-footer">
                Sudah punya akun? <a href="login.php">Masuk di sini</a>
            </div>
        </form>
    </div>
</div>

<footer class="footer-simple">
    <p>&copy; 2026 StudyHub Project. All Rights Reserved by ahdankerenabiezz.</strong></p>
</footer>

</body>
</html>