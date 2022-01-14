<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $nama_siswa = $_POST['nama_siswa'];
        $thn_ajaran = $_POST['thn_ajaran'];
        $semester = $_POST['semester'];
        
        $sql = "SELECT tbnilaikd.idnilai,tbnilaikd.idsiswa,tbnilaikd.idkelas,tbnilaikd.idsem,
                tbnilaikd.idpilar,tbnilaikd.nilai_kd,tbsiswa.nama_siswa,
                tbpilar.kdpilar,tbpilar.kd,tbsemester.thn_ajaran,tbsemester.semester FROM tbnilaikd 
                    LEFT JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                    LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                    LEFT JOIN tbsemester ON tbnilaikd.idsem=tbsemester.idsem
                    WHERE tbsiswa.idsiswa=(SELECT idsiswa FROM tbsiswa WHERE nama_siswa='$nama_siswa') AND tbsemester.idsem=(SELECT idsem FROM tbsemester WHERE thn_ajaran='$thn_ajaran' AND semester='$semester')";
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
            $index['nama_siswa']= $row['nama_siswa'];
            $index['kdpilar']= $row['kdpilar'];
            $index['kd']= $row['kd'];
            $index['thn_ajaran']= $row['thn_ajaran'];
            $index['semester']= $row['semester'];
    
            array_push($result['tbnilaikd'], $index);
            
        }
        
        $result['success'] = "1";
        $result['message'] = "success";
        echo json_encode($result);

        mysqli_close($con);

    }
    
    /*if(isset($_GET['idpilar'],$_GET['nisn'],$_GET['ta'],$_GET['sem'])){
        $idsiswa = $_GET['nisn'];
        $idpilar = $_GET['idpilar'];
        $thn_ajaran = $_GET['ta'];
        $semester = $_GET['sem'];
        
        $sql = "SELECT * FROM tbnilaikd 
                JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                JOIN tbsemester ON tbnilaikd.thn_ajaran=tbsemester.thn_ajaran
                JOIN tbobservasi ON tbpilar.kdpilar=tbobservasi.kdpilar
                WHERE tbsiswa.idsiswa='$idsiswa' AND tbpilar.kdpilar='$idpilar' AND tbsemester.idsem=(SELECT idsem FROM tbsemester WHERE thn_ajaran='$thn_ajaran' AND semester='$semester')";
        
        $response = mysqli_query ($con, $sql);
        
        if($response){
            echo "Data Berhasil disimpan";
        }else{
            echo "Failed";
        }
        
        mysqli_close($con);
    }*/

?>