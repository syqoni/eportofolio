<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $nama_siswa = $_POST['nama_siswa'];
        $thn_ajaran = $_POST['thn_ajaran'];
        $semester = $_POST['semester'];
        $pilar = $_POST['pilar'];
        $ctt_observe = $_POST['ctt_observe'];

        $sql = "INSERT INTO tbobservasi(idsiswa,idsem,kdpilar,foto,ctt_observe) VALUES ((SELECT idsiswa FROM tbsiswa WHERE nama_siswa='$nama_siswa'),(SELECT idsem FROM tbsemester WHERE thn_ajaran='$thn_ajaran' AND semester='$semester'),(SELECT kdpilar FROM pilar WHERE nama_pilar='$pilar'),'','$ctt_observe')";
        $response = mysqli_query ($con, $sql);
        
        if($response){
            echo "Data Berhasil disimpan";
        }else{
            echo "Failed";
        }
        
        mysqli_close($con);
    }

?>