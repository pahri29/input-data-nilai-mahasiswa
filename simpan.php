<?php
include 'koneksi.php';

$nim     = $_POST['nim'];
$nama    = $_POST['nama'];
$kelas   = $_POST['kelas'];
$matkul  = $_POST['matkul'];
$uts     = $_POST['uts'];
$uas     = $_POST['uas'];
$catatan = $_POST['catatan'];

$nilai_akhir = ($uts + $uas) / 2;

// Hitung grade dan status
if ($nilai_akhir >= 85) $grade = 'A';
elseif ($nilai_akhir >= 75) $grade = 'B';
elseif ($nilai_akhir >= 65) $grade = 'C';
elseif ($nilai_akhir >= 50) $grade = 'D';
else $grade = 'E';

$status = ($nilai_akhir >= 60) ? 'Lulus' : 'Tidak Lulus';

// Simpan ke database
$sql = "INSERT INTO nilai (nim, nama, kelas, matkul, uts, uas, nilai_akhir, grade, status, catatan)
        VALUES ('$nim', '$nama', '$kelas', '$matkul', '$uts', '$uas', '$nilai_akhir', '$grade', '$status', '$catatan')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan.";
} else {
    echo "Gagal menyimpan data: " . $conn->error;
}
?>
