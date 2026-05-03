<?php
session_start();
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keluar - StudyHub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), 
                        url('https://images.unsplash.com/photo-1506929113670-b423c1e3974f?q=80&w=1500'); 
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .logout-card {
            background: rgba(255, 255, 255, 0.95); 
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
            padding: 50px 40px;
            text-align: center;
            position: relative;
        }

        .user-avatar {
            width: 90px;
            height: 90px;
            background: #3b34b5;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            font-weight: 600;
            margin: 0 auto 20px;
            box-shadow: 0 8px 15px rgba(52, 152, 219, 0.3);
            text-transform: uppercase;
        }

        .welcome-msg {
            font-size: 18px;
            color: #666;
            margin-bottom: 5px;
        }

        .user-name {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .button-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            padding: 15px;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: 0.3s;
            border: none;
        }

        .btn-stay {
            background: #3b34b5;
            color: white;
        }

        .btn-stay:hover {
            background: #3b34b5;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        .btn-exit {
            background: transparent;
            color: #e74c3c;
            border: 2px solid #e74c3c;
        }

        .btn-exit:hover {
            background: #e74c3c;
            color: white;
        }

        .footer-text {
            margin-top: 30px;
            font-size: 13px;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>

    <div class="logout-card">
        <div class="user-avatar">
            <?= substr($_SESSION['username'] ?? 'U', 0, 1) ?>
        </div>
        
        <p class="welcome-msg">Sudah selesai mengeksplor?</p>
        <h2 class="user-name"><?= $_SESSION['username'] ?? 'Traveler' ?></h2>

        <div class="button-group">
            <a href="dashboard.php" class="btn btn-stay">
                <i class="fas fa-home"></i> Tetap di Sini
            </a>

            <form method="POST" action="">
                <button type="submit" name="logout" class="btn btn-exit" style="width: 100%;">
                    <i class="fas fa-sign-out-alt"></i> Keluar Sekarang
                </button>
            </form>
        </div>

        <div class="footer-text">
        
        </div>
    </div>

</body>
</html>