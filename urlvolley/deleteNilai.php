<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $idnilai = $_POST['idnilai']; 

        $sql = "DELETE FROM tbnilaikd WHERE idnilai='$idnilai'";
        $result = mysqli_query($con,$sql);
    
        if($result){
            echo "Data telah dihapus.";
        }else{
            echo "Data gagal dihapus.";
        }
    
        mysqli_close($con);
    }
    

?>
