<?php
// Include / load file koneksi.php
include '../api/config.php';

// Ambil data yang dikirim dari form
$idnilai = $_POST['idnilai']; // Ambil data nis dan masukkan ke variabel nis
$idsiswa = $_POST['idsiswa']; // Ambil data nama dan masukkan ke variabel nama
$idkelas = $_POST['idkelas']; // Ambil data telp dan masukkan ke variabel telp
$thn_ajaran = $_POST['thn_ajaran'];
$semester = $_POST['semester'];
$idpilar = $_POST['idpilar'];
$nilai_kd = $_POST['nilai_kd'];


// Proses simpan ke Database
$query = "INSERT INTO tbnilaikd VALUES";

$index = 0; // Set index array awal dengan 0
foreach($idnilai as $datanilai){ // Kita buat perulangan berdasarkan nis sampai data terakhir
    $query .= "('".$datanilai."','".$idsiswa."','".$idkelas."','".$thn_ajaran."','".$semester."','".$idpilar[$index]."','".$nilai_kd[$index]."'),";
    $index++;
}

// Kita hilangkan tanda koma di akhir query
// sehingga kalau di echo $query nya akan sepert ini : (contoh ada 2 data siswa)
// INSERT INTO siswa VALUES('1011001','Rizaldi','Laki-laki','089288277372','Bandung'),('1011002','Siska','Perempuan','085266255121','Jakarta');
$query = substr($query, 0, strlen($query) - 1).";";

// Eksekusi $query
mysqli_query($connect, $query);

// Buat sebuah alert sukses, dan redirect ke halaman awal (index.php)
echo "<script>alert('Data berhasil disimpan');window.location = 'data_porto.php';</script>";
?>

