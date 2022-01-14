<?php
 $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $idpilar = $_POST['idpilar'];
        $nama_kelas = $_POST['nama_kelas'];
        $nama_pilar = $_POST['nama_pilar'];
        $kd = $_POST['kd'];

        $sql = "UPDATE tbpilar SET 
                idkelas=(SELECT idkelas FROM tbkelas WHERE nama_kelas='$nama_kelas'),
                kdpilar=(SELECT kdpilar FROM pilar WHERE nama_pilar='$nama_pilar'),
                kd='$kd' 
                WHERE idpilar='$idpilar'";

        $result = mysqli_query($con,$sql);
    
        if($result){
            echo "Kompetensi Dasar telah berhasil diupdate.";
        }else{
            echo "Failed.";
        }

        mysqli_close($con);
    }

?>