<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $idpilar = $_POST['idpilar']; 

        $sql = "DELETE FROM tbpilar WHERE idpilar='$idpilar'";
        $result = mysqli_query($con,$sql);
    
        if($result){
            echo "Data kompetensi dasar telah dihapus.";
        }else{
            echo "Data gagal dihapus.";
        }
    
        mysqli_close($con);
    }
    

?>
