<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'koneksi.php';
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    file_put_contents('log.txt', "Form dikirim\n", FILE_APPEND);
    echo "File ini hanya bisa diakses lewat form POST.";
    exit;
}

echo "<pre>";
print_r($_POST);
echo "</pre>";
if (isset($_POST['send'])) {
    $name = trim(mysqli_real_escape_string($conn, $_POST['name']));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $number = trim(mysqli_real_escape_string($conn, $_POST['number']));
    $message = trim(mysqli_real_escape_string($conn, $_POST['message']));

    if (empty($name) || empty($email) || empty($message)) {
        echo "<script>alert('Nama, email, dan pesan wajib diisi.'); window.history.back();</script>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Email tidak valid!'); window.history.back();</script>";
        exit;
    }

    $query = "INSERT INTO contact_form (name, email, number, message) VALUES ('$name', '$email', '$number', '$message')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Gagal mengirim pesan: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
} else {
    echo "Akses tidak valid.";
}

mysqli_close($conn);
?>
