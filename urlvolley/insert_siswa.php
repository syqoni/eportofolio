<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $idsiswa = $_POST['idsiswa'];
        $nama_kelas = $_POST['nama_kelas'];
        $nama_siswa = $_POST['nama_siswa'];
        $jk = $_POST['jk'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $agama = $_POST['agama'];
        $nama_ayah = $_POST['nama_ayah'];
        $nama_ibu = $_POST['nama_ibu'];
        $alamat_ortu = $_POST['alamat_ortu'];
        $telepon = $_POST['telepon'];

        $sql = "INSERT INTO tbsiswa(idsiswa,idkelas,nama_siswa,jk,tempat_lahir,tanggal_lahir,alamat,agama,nama_ayah,nama_ibu,alamat_ortu,telepon) VALUES ('$idsiswa',(SELECT idkelas FROM tbkelas WHERE nama_kelas='$nama_kelas'),'$nama_siswa','$jk','$tempat_lahir','$tanggal_lahir','$alamat','$agama','$nama_ayah','$nama_ibu','$alamat_ortu','$telepon')";
        $response = mysqli_query ($con, $sql);
        
        if($response){
            echo "Data Berhasil disimpan";
        }else{
            echo "Failed";
        }
        
        mysqli_close($con);
    }

?>