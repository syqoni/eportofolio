<?php
 $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $target_dir = "images";
        $foto = $_POST['foto'];
        $imageStore = rand()."_".time().".jpeg";
        $target_dir = $target_dir."/".$imageStore;
        file_put_contents($target_dir, base64_decode($foto));

        $idobservasi = $_POST['idobservasi'];
        $nama_siswa = $_POST['nama_siswa'];
        $thn_ajaran = $_POST['thn_ajaran'];
        $semester = $_POST['semester'];
        $pilar = $_POST['pilar'];
        $ctt_observe = $_POST['ctt_observe'];

        $sql = "UPDATE tbobservasi SET 
                idsiswa=(SELECT idsiswa FROM tbsiswa WHERE nama_siswa='$nama_siswa'),
                idsem=(SELECT idsem FROM tbsemester WHERE thn_ajaran='$thn_ajaran' AND semester='$semester'),
                kdpilar=(SELECT kdpilar FROM pilar WHERE nama_pilar='$pilar'),
                foto='$imageStore',
                ctt_observe='$ctt_observe' 
                WHERE idobservasi='$idobservasi'";

        $result = mysqli_query($con,$sql);
    
        if($result){
            echo "Observation data updated.";
        }else{
            echo "Failed.";
        }

        mysqli_close($con);
    }

?>