<?php
    include '../api/config.php';

 if (isset($_GET['nama_kelas'],$_GET['nama_pilar'],$_GET['thn_ajaran'],$_GET['semester'])) {

    //echo "Problem in database connection! Contact administrator!" . mysqli_error();
    //($_GET['nama_kelas'],$_GET['nama_pilar'],$_GET['thn_ajaran'],$_GET['semester'])
    //($_GET['idkelas'],$_GET['kdpilar'],$_GET['idsem'])
    
    
    //$idkelas = $_GET['idkelas'];
    //$kdpilar = $_GET['kdpilar'];
    //$idsem = $_GET['idsem'];
    $nama_kelas = $_GET['nama_kelas'];
    $nama_pilar = $_GET['nama_pilar'];
    $thn_ajaran = $_GET['thn_ajaran'];
    $semester = $_GET['semester'];
    

    //$sql ="SELECT idsiswa,ROUND(AVG(nilai_kd),2) AS avg_nilai FROM tbnilaikd LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar WHERE tbnilaikd.idkelas='$idkelas' AND tbnilaikd.idsem='$idsem'AND tbpilar.kdpilar='$kdpilar'GROUP BY idsiswa";
    
    $sql ="SELECT idsiswa,ROUND(AVG(nilai_kd),2) AS avg_nilai FROM tbnilaikd LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar WHERE tbnilaikd.idkelas=(SELECT idkelas FROM tbkelas WHERE nama_kelas='$nama_kelas') AND tbnilaikd.idsem=(SELECT idsem FROM tbsemester WHERE thn_ajaran='$thn_ajaran' AND semester='$semester') AND tbpilar.kdpilar=(SELECT kdpilar FROM pilar WHERE nama_pilar='$nama_pilar') GROUP BY idsiswa";

    $result = mysqli_query($con,$sql);
    $chart_data="";
        
         while ($row = mysqli_fetch_array($result)) { 
 
            $idsiswa[]  = $row['idsiswa'];
            $avg_nilai[] = $row['avg_nilai'];
        }
?>

<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div style="width:100%;height:100%;text-align:center">
            
            <canvas id="lineChart"></canvas>  
        </div>    
    </body>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
        //setup block
        const data = {
            labels:<?php echo json_encode($idsiswa); ?>,
            datasets: [{
                label:"Semester 1", 
                axis: 'y',
                data:<?php echo json_encode($avg_nilai); ?>,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };

        //config block
        const config = {
            type: 'line',
            data,
            options: {
                //indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                     }
                }
            }
        };
        //render block

        const lineChart = new Chart(
            document.getElementById('lineChart'),
            config
        );
        
        </script>
</html>


<?php

 }
 
 
?>
