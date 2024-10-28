<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Ambil data pengguna dari database
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        echo "<script>alert('Autentikasi berhasil!')</script>";
    } else {
        echo "<script>alert('Autentikasi gagal: username atau password salah!'); window.location = '../login.php'</script>";
    }
}
?>

