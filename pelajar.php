<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'pelajar') {
    echo "Akses tidak dibenarkan.";
    exit();
}
?>

<h2>Selamat datang, <?php echo $_SESSION['fullname']; ?></h2>
<p>Anda log masuk sebagai: PELAJAR</p>

<a href="logout.php">Logout</a>