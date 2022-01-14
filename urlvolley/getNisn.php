<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if(isset($_GET['nama'])){

        $nama_siswa = $_GET['nama'];

        $sql = "SELECT * FROM tbsiswa WHERE nama_siswa = '$nama_siswa'";
        $response = mysqli_query ($con, $sql);

        $result = array();
        $result['tbsiswa']= array();

        if (mysqli_num_rows($response) === 1){
            $row = mysqli_fetch_assoc($response);
            
            $index['idsiswa'] = $row['idsiswa'];
            $index['idkelas'] = $row['idkelas'];
            $index['nama_siswa']= $row['nama_siswa'];
            $index['jk'] = $row['jk'];
            $index['tempat_lahir']= $row['tempat_lahir'];
            $index['tanggal_lahir'] = $row['tanggal_lahir'];
            $index['alamat']= $row['alamat'];
            $index['agama'] = $row['agama'];
            $index['nama_ayah'] = $row['nama_ayah'];
            $index['nama_ibu'] = $row['nama_ibu'];
            $index['alamat_ortu'] = $row['alamat_ortu'];
            $index['telepon'] = $row['telepon'];

            array_push($result['tbsiswa'], $index);

            $result['success'] = "1";
            $result['message'] = "success";
            echo json_encode($result);

            mysqli_close($con);
        }
    }
    

?>