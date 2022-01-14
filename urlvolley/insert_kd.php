<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $nama_kelas = $_POST['nama_kelas'];
        $nama_pilar = $_POST['nama_pilar'];
        $kd = $_POST['kd'];

        $sql = "INSERT INTO tbpilar(idkelas,kdpilar,kd) VALUES ((SELECT idkelas FROM tbkelas WHERE nama_kelas='$nama_kelas'),(SELECT kdpilar FROM pilar WHERE nama_pilar='$nama_pilar'),'$kd')";
        $response = mysqli_query ($con, $sql);
        
        if($response){
            echo "Data Berhasil disimpan";
        }else{
            echo "Failed";
        }
        
        mysqli_close($con);
    }

?>