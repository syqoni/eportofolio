<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $idsiswa = $_POST['idsiswa']; 

        $sql = "DELETE * FROM tbsiswa WHERE idsiswa='$idsiswa'";
        $result = mysqli_query($con,$sql);
    
        if($result){
            echo "Data deleted.";
        }else{
            echo "Failed.";
        }
    
        mysqli_close($conn);
    }
    

?>
