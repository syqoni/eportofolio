<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");

    //if($_SERVER['REQUEST_METHOD']=='POST'){

        $sql = "SELECT * FROM tbkelas";
        $response = mysqli_query ($con, $sql);

        if (mysqli_num_rows($response) > 0){

            $result = array();
            $result['tbkelas']= array();

            while($row = mysqli_fetch_assoc($response)){
                
                $index['idkelas'] = $row['idkelas'];
                $index['nama_kelas']= $row['nama_kelas'];

                array_push($result['tbkelas'], $index);
            
            }

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($con);
        }
        
   // }
    
?>