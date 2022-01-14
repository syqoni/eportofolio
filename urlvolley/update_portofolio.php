<?php
 $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $idnilai = $_POST['idnilai'];
        $nilai_kd = $_POST['nilai_kd'];
        
        $sql = "UPDATE tbnilaikd SET nilai_kd='$nilai_kd' WHERE idnilai='$idnilai'";

        $result = mysqli_query($con,$sql);
    
        if($result){
            echo "Data Portofolio Telah Diubah.";
        }else{
            echo "Update Data Gagal.";
        }

        mysqli_close($con);
    }

?>