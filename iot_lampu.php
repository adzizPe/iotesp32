<?php
$servername = "sql205.infinityfree.com";
$username = "if0_37631718";
$password = "oaxJBcXT3pxHSE";
$dbname = "if0_37631718_lampu_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memastikan 'tekan' ada dalam query string dan mengonversi ke nilai numerik yang benar
if(isset($_GET['tekan'])) {
    $tekan = $_GET['tekan'] === '1' ? 1 : 0;

    // Menggunakan prepared statement untuk meningkatkan keamanan
    $sql = $conn->prepare("INSERT INTO status_lampu (status) VALUES (?)
                           ON DUPLICATE KEY UPDATE status=?");
    $sql->bind_param("ii", $tekan, $tekan);

    if ($sql->execute()) {
        echo "Status lampu berhasil diperbarui menjadi " . ($tekan ? "ON" : "OFF");
    } else {
        echo "Kesalahan dalam memperbarui status lampu: " . $conn->error;
    }

    $sql->close();
}

// Tutup koneksi
$conn->close();

// Redirect ke index.php
header("Location: index.php");
exit();
?>
