<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");


    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $sql = "UPDATE user SET 
                username='$username',
                password='$password' 
                WHERE id_user='$id_user'";

        $result = mysqli_query($con,$sql);
    
        if($result){
            echo "User telah berhasil diubah.";
        }else{
            echo "Failed.";
        }
		
		mysqli_close($con);
		

    }

?>