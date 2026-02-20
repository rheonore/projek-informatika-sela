<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "sela_tasktracker"
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
