<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $nama_siswa = $_POST['nama_siswa'];
        $thn_ajaran = $_POST['thn_ajaran'];
        $semester = $_POST['semester'];
        
        $sql = "SELECT * FROM tbobservasi WHERE idsiswa = (SELECT idsiswa FROM tbsiswa WHERE nama_siswa='$nama_siswa') AND idsem = (SELECT idsem FROM tbsemester WHERE thn_ajaran='$thn_ajaran' AND semester='$semester')";
        $response = mysqli_query ($con, $sql);

        $result = array();
        $result['tbobservasi']= array();
            
        while($row=mysqli_fetch_array($response)){
            $index['idobservasi'] = $row['idobservasi'];
            $index['idsiswa']= $row['idsiswa'];
            $index['idsem']= $row['idsem'];
            $index['kdpilar']= $row['kdpilar'];
            $index['foto']= $row['foto'];
            $index['ctt_observe']= $row['ctt_observe'];
    
            array_push($result['tbobservasi'], $index);
            
        }
        
        $result['success'] = "1";
        $result['message'] = "success";
        echo json_encode($result);

        mysqli_close($con);

    }

?>