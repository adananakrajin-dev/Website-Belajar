<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyHub | Dashboard Materi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="[https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css](https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css)">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <style>
        /* MODERINISASI LOGOUT & FIX COLOR */
        :root {
            --primary: #4f46e5;
            --dark-fix: #0f172a;
        }

        /* 1. Account Pill (Gaya Sosmed) */
        .user-account-pill {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 4px 15px 4px 5px;
            background: rgba(149, 137, 137, 0.1);
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .user-account-pill:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid #fff;
            object-fit: cover;
        }

        .user-name {
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
        }

        .logout-icon {
            color: #ff4d4d;
            font-size: 14px;
            margin-left: 5px;
            padding-left: 10px;
            border-left: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* 2. Fix Teks Belajar Tanpa Batas */
        .overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.2) 100%) !important;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        .titit { 
            font-size: 38px !important; 
            font-weight: 800 !important; 
            color: #ffffff !important; /* Paksa Putih */
            text-shadow: 2px 2px 15px rgba(0,0,0,0.7) !important;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .ttt { 
            font-size: 16px !important; 
            color: rgba(255, 255, 255, 0.95) !important; 
            max-width: 80%;
            line-height: 1.5;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* CONTAINER: Kita kasih batas lebar biar gak melebar mentok */
.help-section {
    padding: 40px 0;
    text-align: center;
}

/* CONTAINER: Biar menu ngumpul di tengah */
.help-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
    margin-top: 20px;
}

/* CARD: Dibuat lebih membulat (Rounded) */
.help-card {
    background: #ffffff;
    padding: 10px 20px; /* Padding samping lebih lebar biar lonjong */
    border-radius: 50px; /* Bikin bentuknya lonjong kayak kapsul */
    text-decoration: none;
    color: #475569;
    display: flex;
    align-items: center; /* Icon & Teks sejajar horizontal */
    gap: 10px;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
}

/* HOVER: Efek pop-up dan warna icon berubah */
.help-card:hover {
    transform: scale(1.05); /* Sedikit membesar */
    border-color: #4f46e5;
    background: #4f46e5;
    color: #ffffff; /* Teks berubah jadi putih */
    box-shadow: 0 10px 20px rgba(79, 70, 229, 0.2);
}

.help-card span {
    font-size: 18px;
}

.help-card p {
    font-weight: 600;
    font-size: 13px;
}

/* Biar icon-nya gak ikut berubah warna kalo bukan teks */
.help-card:hover span {
    filter: brightness(1.2);
}
    </style>
</head>
<body>
    <nav>
        <div class="nav-brand">Study<span>Hub</span></div> 
        <div class="nav-links">
            <!-- Icon Surat buat Contact -->
            <a href="contact.html" class="a-navbar">
                <i class="fa-solid fa-envelope"></i> CONTACT
            </a>
            
            <!-- Icon Star/Award buat Credit -->
            <a href="credit.html" class="a-navbar">
                <i class="fa-solid fa-circle-info"></i> CREDIT
            </a>
            
            <a href="logout.php" class="user-account-pill">
                <img src="https://ui-avatars.com/api/?name=<?= $_SESSION["username"];?>&background=4f46e5&color=fff&bold=true" alt="User Avatar" class="user-avatar">
                <span class="user-name"><?= $_SESSION["username"];?></span>
                <i class="fas fa-sign-out-alt logout-icon"></i>
            </a>
        </div>
    </nav>

    <div class="subjdl1">
      <h3 class="subjdl"> Hi <?= $_SESSION["username"];?>! Selamat Datang di StudyHub</h3>
        <div class="hero-desc">
        Pusat rangkuman materi untuk siswa/i SMKN 6 Jakarta.
      </div>
    </div>

    <!-- Hero Section -->
    <div class="colinter">
        <div class="left">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1000" alt="Belajar Bersama">
            <div class="overlay">
                <h2 class="titit">BELAJAR TANPA BATAS</h2>
                <p class="ttt">Akses berbagai materi produktif dan umum kapan saja. Kami menyediakan rangkuman terbaik untuk mendukung proses belajarmu.</p>
            </div>
        </div> 
        
        <div class="right-container">
            <div class="right">
                <a href="#" class="a-content slide-up">
                    <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?q=80&w=1000" alt="Programming">   
                </a>
            </div>
            <div class="right">
                <a href="#" class="a-content slide-up">
                    <img src="https://images.unsplash.com/photo-1558655146-d09347e92766?q=80&w=1000" alt="Design">
                </a>
            </div>
        </div>
    </div>

    <div class="subjdl">
        <h3>Daftar Materi</h3>
    </div>

    <!-- Materi Grid Lengkap -->
    <div class="grid-container">
        <div class="card">
            <img src="https://images.unsplash.com/photo-1587620962725-abab7fe55159?q=80&w=1000" alt="RPL">
            <div class="card-content">
                <h3>DK RPL</h3>
                <p>Kupas tuntas logika pemrograman, algoritma, dan dasar-dasar pengembangan aplikasi perangkat lunak.</p>
                <a href="materi/dkrpl.html">Buka Materi →</a>
            </div>
        </div>

        <div class="card">
            <img src="https://images.unsplash.com/photo-1635070041078-e363dbe005cb?q=80&w=1000" alt="Matematika">
            <div class="card-content">
                <h3>Matematika</h3>
                <p>Kumpulan rumus praktis, logika matematika, dan penyelesaian masalah angka untuk siswa kejuruan.</p>
                <a href="materi/mtk.html">Buka Materi →</a>
            </div>
        </div>

        <div class="card">
            <img src="https://images.unsplash.com/photo-1543165796-5426273eaab3?q=80&w=1000" alt="English">
            <div class="card-content">
                <h3>Bahasa Inggris</h3>
                <p>Tingkatkan skill komunikasi internasional, mulai dari grammar hingga percakapan teknis dunia kerja.</p>
                <a href="materi/beng.html">Buka Materi →</a>
            </div>
        </div>

        <div class="card">
            <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=1000" alt="Informatika">
            <div class="card-content">
                <h3>Informatika</h3>
                <p>Pelajari sistem komputer, jaringan internet, dan analisis data dalam era transformasi digital modern yang terus berkembang.</p>
                <a href="materi/informatika.html">Buka Materi →</a>
            </div>
        </div>
        
        <div class="card">
            <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=1000" alt="IPAS">
            <div class="card-content">
                <h3>IPAS</h3>
                <p>Memahami keterkaitan antara sains alam dengan fenomena sosial yang terjadi di lingkungan sekitar.</p>
                <a href="materi/ipas.html">Buka Materi →</a>
            </div>
        </div>
    
        <div class="card">
            <img src="https://images.unsplash.com/photo-1542810634-71277d95dcbb?q=80&w=1000" alt="Agama">
            <div class="card-content">
                <h3>Pendidikan Agama</h3>
                <p>Pendalaman nilai spiritual, etika, dan pembentukan karakter mulia dalam kehidupan sehari-hari.</p>
                <a href="materi/agama.html">Buka Materi →</a>
            </div>
        </div>
    
        <div class="card">
            <img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?q=80&w=1000" alt="Seni">
            <div class="card-content">
                <h3>Seni Budaya</h3>
                <p>Eksplorasi kreativitas visual, musik, dan ragam kekayaan budaya Nusantara yang inspiratif.</p>
                <a href="materi/senbud.html">Buka Materi →</a>
            </div>
        </div>
    
        <div class="card">
            <img src="https://images.unsplash.com/photo-1461360370896-922624d12aa1?q=80&w=1000" alt="Sejarah">
            <div class="card-content">
                <h3>Sejarah</h3>
                <p>Menelusuri jejak masa lalu bangsa untuk mengambil pelajaran berharga bagi masa depan Indonesia.</p>
                <a href="materi/sejarah.html">Buka Materi →</a>
            </div>
        </div>
    
        <div class="card">
            <img src="https://images.unsplash.com/photo-1455390582262-044cdead277a?q=80&w=1000" alt="Bahasa">
            <div class="card-content">
                <h3>Bahasa Indonesia</h3>
                <p>Mahir berbahasa Indonesia yang baik dan benar melalui teknik penulisan karya ilmiah dan sastra.</p>
                <a href="materi/bindo.html">Buka Materi →</a>
            </div>
        </div>
    
        <div class="card">
            <img src="https://insightbali.com/wp-content/uploads/2025/10/Garuda-in-Indonesia-1024x683.jpeg" alt="PKN">
            <div class="card-content">
                <h3>PPKN</h3>
                <p>Memperkuat jiwa nasionalisme, pemahaman hak asasi manusia, dan kewajiban sebagai warga negara.</p>
                <a href="materi/ppkn.html">Buka Materi →</a>
            </div>
        </div>
    
        <div class="card">
            <img src="https://stikeshb.ac.id/wp-content/uploads/2023/06/images-45.jpeg" alt="Olahraga">
            <div class="card-content">
                <h3>PJOK</h3>
                <p>Panduan kebugaran jasmani, teknik olahraga beregu, serta pola hidup sehat bagi siswa aktif.</p>
                <a href="materi/pjok.html">Buka Materi →</a>
            </div>
        </div>
    </div>

    <div class="subjdl1">
        <h3>Butuh Bantuan Belajar?</h3>
    </div>

    <section class="help-section">
    <div class="help-container">
        <a href="isi.html" class="help-card">
            <span>📚</span> 
            <p>Perpustakaan Digital</p>
        </a> 
        <a href="latihan.html" class="help-card">
            <span>📝</span> 
            <p>Latihan Soal</p>
        </a>
        <a href="guru.html" class="help-card">
            <span>💬</span> 
            <p>Diskusi Guru</p>
        </a>
        <a href="jadwal.html" class="help-card">
            <span>📅</span> 
            <p>Jadwal Ujian</p>
        </a>
    </div>
</section>

    <footer style="text-align: center; padding: 40px; color: #888; font-size: 14px;">
       &copy; 2026 StudyHub Project. All Rights Reserved by ahdankerenabiezz.
    </footer>
</body>
</html>