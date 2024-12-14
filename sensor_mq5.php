<?php
$servername = "localhost"; // Server MySQL
$username = "root";        // Username MySQL
$password = "";            // Password MySQL (kosong di XAMPP default)
$dbname = "sensor_data";   // Nama database

// Membuat koneksi ke MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data sensor dari request POST
if (isset($_POST['sensorValue'])) {
    $sensorValue = $_POST['sensorValue'];
    
    // SQL untuk menyimpan data ke dalam tabel
    $sql = "INSERT INTO sensor_data (sensorValue) VALUES ($sensorValue)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Data sensor tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
?>
