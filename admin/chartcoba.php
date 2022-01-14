<?php
    include '../api/config.php';
    include 'layout/css.php';
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>

    <?php
        if(isset($_GET['idpilar'],$_GET['nisn'],$_GET['idsem'])){
            $idsiswa = $_GET['nisn'];
            $kdpilar = $_GET['idpilar'];
            $idsem = $_GET['idsem'];


            if($kdpilar == 'P01'){
                $txpilar = 'AKHLAK DAN LEADERSHIP';
            }elseif($kdpilar == 'P02'){
                $txpilar = 'ILMU DAN LOGIKA';
            }else{
                $txpilar = 'BAKAT DAN LIFESKILL';
            }

            $sql = "SELECT * FROM tbnilaikd 
            JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
            JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
            JOIN tbsemester ON tbnilaikd.thn_ajaran=tbsemester.thn_ajaran
            JOIN tbobservasi ON tbpilar.kdpilar=tbobservasi.kdpilar
            WHERE tbsiswa.idsiswa='$idsiswa' AND tbpilar.kdpilar='$kdpilar' AND tbsemester.idsem='$idsem'";

            $view = mysqli_query($con, $sql)or die(mysqli_error());
            $view_data=mysqli_fetch_array($view);

            $data = mysqli_query($con, $sql);
            $chart_data="";
            while ($row = mysqli_fetch_array($data)) {
                $idpilar[]  = $row['idpilar'];
                $nilai_kd[] = $row['nilai_kd'];
                $kd[] = $row['kd'];
            }
        

    ?>

    <div style="width:100%;padding: 10px;text-align:right;border-width: 1;">
        <h2 class="page-header" >
            RAPOR PORTOFOLIO
        </h2>
        <div style="line-height: 15px;">Sekolah Dasar Kelas <?php echo $view_data['idkelas']; ?></div>
        <div style="line-height: 15px;">Tahun Ajaran <?php echo $view_data['thn_ajaran']; ?></div> 
    </div>
    <hr>
    <div style="width:100%;padding: 10px;text-align:left;border-width: 1;">
        <h4 class="page-header" >
            NAMA SISWA/I : <?php echo $view_data['nama_siswa']; ?>
        </h4>
    </div>
    <hr>
    <div style="width:100%;padding: 10px;text-align:left;border-width: 1;">
        <p>Pilar Kurikulum</p>
        <h3 class="page-header" >
            <?php echo $txpilar; ?>
                
        </h3>
        <?php 
        if ($txpilar=='AKHLAK DAN LEADERSHIP'){
            echo"<p style='font-size=11px;'>(** 1 = Tidak Terlihat, 2 = Jarang Terlihat, 3 = Kadang-Kadang Terlihat, 4 = Sering Terlihat, 5 = Selalu Terlihat)</p>";
        }else{
            echo"<p style='font-size=11px;'>(** 1 = Perlu Perbaikan, 2 = Berkembang, 3 = Mandiri)</p>";

        }
        ?>
    </div>

    <table class="table table-borderless">
        <tbody>
            <tr>
                <td style="width:60%;">
                    <div style="width:100%;height:20%;text-align:center">
                        <canvas id="barChart"></canvas>
                    </div>
                </td>
                <td style="width:40%;">
                    <table>
                        <tbody>
                        <?php

                        $sql = "SELECT * FROM tbnilaikd 
                        JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                        JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                        JOIN tbsemester ON tbnilaikd.thn_ajaran=tbsemester.thn_ajaran
                        JOIN tbobservasi ON tbpilar.kdpilar=tbobservasi.kdpilar
                        WHERE tbsiswa.idsiswa='$idsiswa' AND tbpilar.kdpilar='$kdpilar' AND tbsemester.idsem='$idsem'";

                        $view = mysqli_query($con, $sql)or die(mysqli_error());

                        while ($legend=mysqli_fetch_array($view)) { ?>
                            <tr>
                                <td><?php echo $legend['idpilar']; ?></td>
                                <td><?php echo $legend['kd']; ?></td>
                            </tr>
                                <?php }
                                } ?>
                        </tbody>
                    </table>
                </td>
            </tr>

            </tbody>
            </table>
                 
    </body>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
        //setup block
        const data = {
            labels:<?php echo json_encode($idpilar); ?>,
            datasets: [{
                data:<?php echo json_encode($nilai_kd); ?>,
                backgroundColor: [
                "#5969ff",
                "#ff407b",
                "#25d5f2",
                "#ffc750",
                "#2ec551",
                "#7040fa",
                "#ff004e"
                ],
                borderWidth: 1
            }]
        };

        //config block
        const config = {
            type: 'horizontalBar',
            data,
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            max: 3
                        }
                    }]
                },
                legend: {
                    display: false,
                    position: 'bottom',
                    labels: {
                        boxWidth: 20,
                        fontColor: 'rgb(255, 99, 132)'
                    }
                }
            }
        };
        //render block

        const barChart = new Chart(
            document.getElementById('barChart'),
            config
        );
        //var ctx = document.getElementById("barChart").getContext('2d');
        //var myChart = new Chart(ctx, { });
        </script>
        </html>