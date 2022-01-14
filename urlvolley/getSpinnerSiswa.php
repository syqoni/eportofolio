<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");

    if(isset($_GET['nama_kelas'])){
        
        $nama_kelas = $_GET['nama_kelas'];

        $sql = "SELECT * FROM tbsiswa WHERE idkelas=(SELECT idkelas FROM tbkelas WHERE nama_kelas='$nama_kelas')";
        $response = mysqli_query ($con, $sql);

        if (mysqli_num_rows($response) > 0){

            $result = array();
            $result['tbsiswa']= array();

            while($row = mysqli_fetch_assoc($response)){
                
                $index['idsiswa'] = $row['idsiswa'];
                $index['nama_siswa']= $row['nama_siswa'];

                array_push($result['tbsiswa'], $index);
            
            }

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($con);
        }
        
   }
    
?>