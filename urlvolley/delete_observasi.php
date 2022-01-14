<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $idobservasi = $_POST['idobservasi']; 

        $sql = "DELETE FROM tbobservasi WHERE idobservasi='$idobservasi'";
        $result = mysqli_query($con,$sql);
    
        if($result){
            echo "Data deleted.";
        }else{
            echo "Failed.";
        }
    
        mysqli_close($con);
    }
    

?>
