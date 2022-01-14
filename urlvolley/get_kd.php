<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $nama_kelas = $_POST['nama_kelas'];
        $nama_pilar = $_POST['nama_pilar'];
        
        $sql = "SELECT * FROM tbpilar WHERE idkelas = (SELECT idkelas FROM tbkelas WHERE nama_kelas='$nama_kelas') AND kdpilar = (SELECT kdpilar FROM pilar WHERE nama_pilar='$nama_pilar')";
        $response = mysqli_query ($con, $sql);

        $result = array();
        $result['tbpilar']= array();
            
        while($row=mysqli_fetch_array($response)){
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

?>