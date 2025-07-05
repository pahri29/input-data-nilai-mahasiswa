<?php
include 'koneksi.php';

$id      = $_POST['id'];
$nim     = $_POST['nim'];
$nama    = $_POST['nama'];
$kelas   = $_POST['kelas'];
$matkul  = $_POST['matkul'];
$uts     = $_POST['uts'];
$uas     = $_POST['uas'];
$catatan = $_POST['catatan'];

$nilai_akhir = ($uts + $uas) / 2;

// Hitung ulang grade dan status
if ($nilai_akhir >= 85) $grade = 'A';
elseif ($nilai_akhir >= 75) $grade = 'B';
elseif ($nilai_akhir >= 65) $grade = 'C';
elseif ($nilai_akhir >= 50) $grade = 'D';
else $grade = 'E';

$status = ($nilai_akhir >= 60) ? 'Lulus' : 'Tidak Lulus';

$sql = "UPDATE nilai SET 
            nim='$nim', nama='$nama', kelas='$kelas', matkul='$matkul', 
            uts='$uts', uas='$uas', nilai_akhir='$nilai_akhir', 
            grade='$grade', status='$status', catatan='$catatan'
        WHERE id='$id'";

echo $conn->query($sql) ? "Data berhasil diperbarui." : "Gagal update: " . $conn->error;
