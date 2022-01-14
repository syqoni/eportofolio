<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if(isset($_POST['username'])){

        $username = $_POST['username'];

        $sql = "SELECT * FROM user WHERE username = '$username'";
        $response = mysqli_query ($con, $sql);

        $result = array();
        $result['user']= array();

        if (mysqli_num_rows($response) === 1){
            $row = mysqli_fetch_assoc($response);
            
            $index['id_user'] = $row['id_user'];

            array_push($result['user'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($con);
        }
    }
    

?>