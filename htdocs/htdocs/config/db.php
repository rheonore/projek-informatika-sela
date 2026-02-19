<?php
$conn = mysqli_connect(
    "sql300.infinityfree.com",
    "if0_41187679",
    "KjtYJeG4ZRSkK6x",
    "if0_41187679_sela_tasktracker"
);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
