<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $target_dir = "images";
        $foto = $_POST['foto'];
        $imageStore = rand()."_".time().".jpeg";
        $target_dir = $target_dir."/".$imageStore;
        file_put_contents($target_dir, base64_decode($foto));
        
        $nama_siswa = $_POST['nama_siswa'];
        $thn_ajaran = $_POST['thn_ajaran'];
        $semester = $_POST['semester'];
        $pilar = $_POST['pilar'];
        $ctt_observe = $_POST['ctt_observe'];

        $sql = "INSERT INTO tbobservasi(idsiswa,idsem,kdpilar,foto,ctt_observe) VALUES ((SELECT idsiswa FROM tbsiswa WHERE nama_siswa='$nama_siswa'),(SELECT idsem FROM tbsemester WHERE thn_ajaran='$thn_ajaran' AND semester='$semester'),(SELECT kdpilar FROM pilar WHERE nama_pilar='$pilar'),'$imageStore','$ctt_observe')";
        $response = mysqli_query ($con, $sql);
        
        if($response){
            echo "Data Berhasil disimpan";
        }else{
            echo "Failed";
        }
        
        mysqli_close($con);
    }

?>