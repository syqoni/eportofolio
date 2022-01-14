<?php
    include '../api/config.php';

	// Penginputan Nilai KD
	if(isset($_POST['simpan'])){
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
	    $index = 0; 
	    foreach($idnilai as $datanilai){ 
		    $query .= "('".$datanilai."','".$idsiswa."','".$idkelas."','".$thn_ajaran."','".$semester."','".$idpilar[$index]."','".$nilai_kd[$index]."'),";
		}

		$query = substr($query, 0, strlen($query) - 1).";";

        // Eksekusi $query
        mysqli_query($con, $query);
      	// Buat sebuah alert sukses, dan redirect ke halaman awal (index.php)
      	echo "<script>alert('Data berhasil disimpan');window.location = 'data_porto_add.php';</script>";
      }

      //Perhitungan Total Nilai KD
      $sql_avg = mysqli_query ($con,"SELECT AVG(nilai_kd) as average FROM tbnilaikd WHERE idpilar='$idpilar'");

      $avg=mysqli_fetch_array($sql);

      //Kondisi Keterangan Nilai Rata-rata Pilar
      if ($avg['average'] <= 4 AND $avg['average'] > 3) {
      	$keterangan = "Mandiri";
      }elseif ($avg['average'] <= 3 AND $avg['average'] > 2) {
      	$keterangan = "Berkembang";
      }else{
      	$keterangan = "Perlu Perbaikan";
      }

      echo "<?php echo $avg['average'] ?>";
      echo "$keterangan";
?>