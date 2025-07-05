<?php
include 'koneksi.php';

$id = $_POST['id'];
$sql = "DELETE FROM nilai WHERE id='$id'";

echo $conn->query($sql) ? "Data berhasil dihapus." : "Gagal hapus: " . $conn->error;
