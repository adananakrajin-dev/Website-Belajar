<?php
include 'database.php';
session_start();

if (isset($_SESSION["sudah_login"])) {
    header("Location: dashboard.php");
    exit;
}

$error = "";

if(isset($_POST['submit_login'])) { 
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION["sudah_login"] = true;
        $_SESSION["username"] = $username;
        
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | StudyHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-body"> 

<header class="auth-nav">
    <div class="logo">Study<span>Hub</span></div>
    <div class="nav-links">
        <a href="home.html">Home</a>
        <a href="register.php">Register</a>
    </div>
</header>

<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">
            <i class="fas fa-user-circle"></i>
            <h3>Selamat Datang</h3>
            <p>Masuk untuk mulai belajar hari ini</p>
        </div>

        <?php if($error): ?>
            <div class="error-msg"><i class="fas fa-exclamation-triangle"></i> <?php echo $error; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST" class="login-form">
            <div class="input-group">
                <label>Username</label>
                <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Masukkan username" name="username" required/>
                </div>
            </div>
            
            <div class="input-group">
                <label>Password</label>
                <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Masukkan password" name="password" required/>
                </div>
            </div>
            
            <button type="submit" name="submit_login" class="btn-primary">Masuk Sekarang</button>
            
            <div class="login-footer">
                Belum punya akun? <a href="register.php">Daftar di sini</a>
            </div>
        </form>
    </div>
</div>

<footer class="footer-simple">
    <p>&copy; 2026 StudyHub Project. All Rights Reserved by ahdankerenabiezz.</strong></p>
</footer>

</body>
</html>