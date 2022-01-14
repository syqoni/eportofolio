<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $nama_siswa = $_POST['nama_siswa'];
        $nama_kelas = $_POST['nama_kelas'];
        $thn_ajaran = $_POST['thn_ajaran'];
        $semester = $_POST['semester'];
        $kd = $_POST['kd'];
        $nilai_kd = $_POST['nilai_kd'];

        $sql = "INSERT INTO tbnilaikd(idsiswa,idkelas,idsem,idpilar,nilai_kd) VALUES ((SELECT idsiswa FROM tbsiswa WHERE nama_siswa='$nama_siswa'),(SELECT idkelas FROM tbkelas WHERE nama_kelas='$nama_kelas'),(SELECT idsem FROM tbsemester WHERE thn_ajaran='$thn_ajaran' AND semester='$semester'),(SELECT idpilar FROM tbpilar WHERE kd='$kd'),'$nilai_kd')";
        $response = mysqli_query ($con, $sql);
        
        if($response){
            echo "Data Berhasil disimpan";
        }else{
            echo "Failed";
        }
        
        mysqli_close($con);
    }

?>