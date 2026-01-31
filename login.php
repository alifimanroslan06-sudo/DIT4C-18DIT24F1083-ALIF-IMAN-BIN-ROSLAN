<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$data = file_get_contents("users.json");
$users = json_decode($data, true);

$login_success = false;

foreach ($users as $user) {
    if ($user['username'] == $username && $user['password'] == $password) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['role'] = $user['role'];

        $login_success = true;

        if ($user['role'] == 'admin') {
            header("Location: admin.php");
        } elseif ($user['role'] == 'pensyarah') {
            header("Location: pensyarah.php");
        } else {
            header("Location: pelajar.php");
        }
        exit();
    }
}

if (!$login_success) {
    echo "Login gagal. <a href='index.php'>Cuba lagi</a>";
}
?>