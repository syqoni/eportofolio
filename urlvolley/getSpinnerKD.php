<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");

    if(isset($_GET['pilar'],$_GET['nama_kelas'])){
        
        $pilar=$_GET['pilar'];
        $nama_kelas=$_GET['nama_kelas'];

        $sql = "SELECT * FROM tbpilar WHERE kdpilar=(SELECT kdpilar FROM pilar WHERE nama_pilar='$pilar') AND idkelas=(SELECT idkelas FROM tbkelas WHERE nama_kelas='$nama_kelas')";
        $response = mysqli_query ($con, $sql);

        if (mysqli_num_rows($response) > 0){

            $result = array();
            $result['tbpilar']= array();

            while($row = mysqli_fetch_assoc($response)){
                
                $index['idpilar'] = $row['idpilar'];
                $index['idkelas']= $row['idkelas'];
                $index['kdpilar']= $row['kdpilar'];
                $index['kd']= $row['kd'];

                array_push($result['tbpilar'], $index);
            
            }

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($con);
        }
        
    }
    
?>