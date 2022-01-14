<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

          $nama_siswa = $_POST['nama_siswa'];
          $idsem = $_POST['idsem'];
        
        $sql = "SELECT * FROM tbnilaikd WHERE idsiswa=(SELECT idsiswa FROM tbsiswa WHERE nama_siswa='$nama_siswa') AND idsem='$idsem'";
        $response = mysqli_query ($con, $sql);

        $result = array();
        $result['tbnilaikd']= array();
            
        while($row=mysqli_fetch_array($response)){
            $index['idnilai'] = $row['idnilai'];
            $index['idsiswa']= $row['idsiswa'];
            $index['idkelas']= $row['idkelas'];
            $index['idsem']= $row['idsem'];
            $index['idpilar']= $row['idpilar'];
            $index['nilai_kd']= $row['nilai_kd'];
            
    
            array_push($result['tbnilaikd'], $index);
            
        }
        
        $result['success'] = "1";
        $result['message'] = "success";
        echo json_encode($result);

        mysqli_close($con);

    }
    

?>