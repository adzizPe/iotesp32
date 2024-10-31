<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lampu_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil nilai dari query string
$tekan = $_GET['tekan'];

// Memasukkan atau memperbarui status lampu
$sql = "INSERT INTO status_lampu (status) VALUES ($tekan)
        ON DUPLICATE KEY UPDATE status=$tekan";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
