<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_mahasiswa"; // Ganti sesuai nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari tabel
$data = [];
$query = mysqli_query($conn, "SELECT * FROM nilai");

while ($row = mysqli_fetch_assoc($query)) {
  $uts = (int)$row['uts'];
  $uas = (int)$row['uas'];
  $nilai_akhir = round(($uts + $uas) / 2);
  
  // Tentukan grade
  if ($nilai_akhir >= 85) $grade = 'A';
  else if ($nilai_akhir >= 75) $grade = 'B';
  else if ($nilai_akhir >= 65) $grade = 'C';
  else if ($nilai_akhir >= 50) $grade = 'D';
  else $grade = 'E';

  // Tentukan status
  $status = ($nilai_akhir >= 65) ? 'Lulus' : 'Tidak Lulus';

  $data[] = [
    "id" => $row['id'],
    "nim" => $row['nim'],
    "nama" => $row['nama'],
    "kelas" => $row['kelas'],
    "matkul" => $row['matkul'],
    "uts" => $uts,
    "uas" => $uas,
    "nilai_akhir" => $nilai_akhir,
    "grade" => $grade,
    "status" => $status,
    "catatan" => $row['catatan']
  ];
}

// Kirim data sebagai JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
