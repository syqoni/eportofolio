<?php
    $con=mysqli_connect("localhost","id15532618_sakura","@iv4TkNqE-P@u|3","id15532618_db_observasi");

    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO tbfasil(nama,email,password) VALUES ('$nama','$email','$password')";
    $result = mysqli_query($con,$sql);

    if($result){
        echo "registered successfully";
    }else{
        echo "some error occured";
    }

?>