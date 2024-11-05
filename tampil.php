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

// Mengambil status lampu terbaru
$sql = "SELECT status FROM status_lampu ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Menampilkan data dari setiap baris
    $row = $result->fetch_assoc();
    echo $row["status"];  // Mengirim status sebagai nilai numerik (1 atau 0)
} else {
    echo "0";  // Jika tidak ada hasil, kirim "0"
}

$conn->close();
?>
