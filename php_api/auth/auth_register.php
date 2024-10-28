<?php
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (strlen($username) > 15) {
        die("Username tidak boleh lebih dari 15 karakter.");
    }

    if (strlen($password) < 8 || !preg_match("/[A-Za-z]/", $password) || !preg_match("/[0-9]/", $password) || !preg_match("/[\W]/", $password)) {
        die("Password harus memiliki minimal 8 karakter dan mencakup huruf, angka, dan simbol.");
    }

    // Buat hash dengan salt untuk kata sandi
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);

    try {
        $stmt->execute();
        echo "Registrasi berhasil!";
    } catch (PDOException $e) {
        echo "Registrasi gagal: " . $e->getMessage();
    }
}
?>

