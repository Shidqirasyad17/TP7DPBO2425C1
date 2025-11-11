<?php
require_once 'class/Alatmusik.php';
require_once 'class/Peminjam.php';
require_once 'class/Sewa.php';

$alat = new Alatmusik();
$peminjam = new Peminjam();
$sewa = new Sewa();

?>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Manajemen Peminjaman Alat Musik</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'view/header.php'; ?>
    <main>
        <h2>Sistem Manajemen Peminjaman Alat Musik</h2>
        <nav>
            <a href="?page=alat">Alat Musik</a> |
            <a href="?page=peminjam">Peminjam</a> |
            <a href="?page=sewa">Data Sewa</a>
        </nav>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'alat') include 'view/alat_musik.php';
            elseif ($page == 'peminjam') include 'view/peminjam.php';
            elseif ($page == 'sewa') include 'view/sewa.php';
        } else {
            echo "<p>Silakan pilih menu di atas untuk melihat data.</p>";
        }
        ?>
    </main>
    <?php include 'view/footer.php'; ?>
</body>
</html>
