<?php
$con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");

    if(isset($_GET['thn_ajaran'],$_GET['semester'])){
        
        $thn_ajaran = $_GET['thn_ajaran'];
        $semester = $_GET['semester'];
        
        $sql = "SELECT * FROM tbsemester WHERE thn_ajaran='$thn_ajaran' AND semester='$semester'";
        $response = mysqli_query ($con, $sql);

        if (mysqli_num_rows($response) > 0){

            $result = array();
            $result['tbsemester']= array();

            while($row = mysqli_fetch_assoc($response)){
                
                $index['idsem'] = $row['idsem'];
                $index['thn_ajaran']= $row['thn_ajaran'];
                $index['semester']= $row['semester'];

                array_push($result['tbsemester'], $index);
            
            }

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($con);
        }
    }
    
?>