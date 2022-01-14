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
    <style>
    @page { size 8.5in 11in; margin: 2cm }
    div.page { page-break-after: always }
    </style>
    <body>
    <div class="page">
    <?php
        if(isset($_GET['nisn'],$_GET['idsem'])){
            $idsiswa = $_GET['nisn'];
            $idsem = $_GET['idsem'];

            $sql = "SELECT * FROM tbnilaikd 
                    LEFT JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                    LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                    LEFT JOIN tbsemester ON tbnilaikd.idsem=tbsemester.idsem
                    LEFT JOIN tbobservasi ON tbnilaikd.idsiswa=tbobservasi.idsiswa
                    WHERE tbsiswa.idsiswa='$idsiswa' AND tbpilar.kdpilar='P01' AND tbobservasi.kdpilar='P01' AND tbsemester.idsem='$idsem'";

            $view = mysqli_query($con, $sql)or die(mysqli_error());
            $view_data=mysqli_fetch_array($view);

            $data = mysqli_query($con, $sql);
            //$chart_data="";
            while ($row = mysqli_fetch_array($data)) {
                $idpilar01[]  = $row['idpilar'];
                $nilai_kd01[] = $row['nilai_kd'];
                $kd01[] = $row['kd'];
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
    <table class="table table-borderless">
            <tbody>
                <tr>
                    <td style="width: 50%;"><div style="text-align:left;">
                        <h3 class="page-header" >
                            AKHLAK DAN LEADERSHIP
                        </h3>
                        <div style="line-height: 15px;font-size: 12px;">Mengembangkan tingkat keshalehan intelektual (akidah), ritual (ibadah) dan spiritual (akhlak) anak terhadap dirinya sendiri, sesama manusia, alam semesta dan terhadap Allah SWT (Sang Pencipta).</div>
                        </div>
                    </td>
                    <td style="width: 50%;"><div style="text-align:left;">
                        <h3 class="page-header" >
                            ILMU DAN LOGIKA
                        </h3>
                        <div style="line-height: 15px;font-size: 12px;">Mengembangkan keilmuan dan Logika serta kemampuan bahasa dan retorika anak</div> 
                        </div>
                    </td>
                </tr>
                <?php
                    $sql = mysqli_query($con, "SELECT ROUND(AVG(nilai_kd),2) as average 
                        FROM tbnilaikd 
                        LEFT JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                        LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                        LEFT JOIN tbsemester ON tbnilaikd.idsem=tbsemester.idsem
                        WHERE tbsiswa.idsiswa='$idsiswa' AND tbsemester.idsem='$idsem' AND tbpilar.kdpilar='P01'")or die(mysqli_error());
                    $avg=mysqli_fetch_array($sql);

                    if ($avg['average'] <= 5 AND $avg['average'] > 4) {
                        $keterangan = "Selalu Terlihat";
                      }elseif ($avg['average'] <= 4 AND $avg['average'] > 3) {
                        $keterangan = "Sering Terlihat";
                      }elseif ($avg['average'] <= 3 AND $avg['average'] > 2) {
                        $keterangan = "Kadang-Kadang Terlihat";
                      }elseif ($avg['average'] <= 2 AND $avg['average'] > 1) {
                        $keterangan = "Jarang Terlihat";
                      }else{
                        $keterangan = "Tidak Terlihat";
                      }
                ?>
                <tr>
                    <td style="width: 50%;"><div style="text-align:left;">
                        <h1 class="page-header" >
                            <?php echo $avg['average'];?>
                        </h1>
                        <p>
                            <?php echo $keterangan;?>
                        </p>
                        </div>
                    </td>

                    <?php
                    $sql = mysqli_query($con, "SELECT ROUND(AVG(tbnilaikd.nilai_kd),2) as average 
                        FROM tbnilaikd 
                        LEFT JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                        LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                        LEFT JOIN tbsemester ON tbnilaikd.idsem=tbsemester.idsem
                        WHERE tbsiswa.idsiswa='$idsiswa' AND tbsemester.idsem='$idsem' AND tbpilar.kdpilar='P02'")or die(mysqli_error());
                    $avg=mysqli_fetch_array($sql);

                    if ($avg['average'] <= 4 AND $avg['average'] > 3) {
                        $keterangan = "Mandiri";
                      }elseif ($avg['average'] <= 3 AND $avg['average'] > 2) {
                        $keterangan = "Berkembang";
                      }else{
                        $keterangan = "Perlu Perbaikan";
                      }
                    ?>
                    <td style="width: 50%;"><div style="text-align:left;">
                        <h1>
                            <?php echo $avg['average'];?>
                        </h1>
                        <p>
                            <?php echo $keterangan;?>
                        </p>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td style="width: 50%;"><div style="text-align:left;">
                        <h3 class="page-header" >
                            BAKAT DAN LIFESKILL
                        </h3>
                        <div style="line-height: 15px;font-size: 12px;">Mengembangkan kecerdasan emosional dan spiritual, kepercayaan diri, kekuatan dan kelenturan, serta fokus dan konsentrasi.</div>
                        </div>
                    </td>
                    <td style="width: 50%;">
                    </td>
                </tr>
                <?php
                    $sql = mysqli_query($con, "SELECT ROUND(AVG(nilai_kd),2) as average 
                        FROM tbnilaikd 
                        LEFT JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                        LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                        LEFT JOIN tbsemester ON tbnilaikd.idsem=tbsemester.idsem
                        WHERE tbsiswa.idsiswa='$idsiswa' AND tbsemester.idsem='$idsem' AND tbpilar.kdpilar='P03'")or die(mysqli_error());
                    $avg=mysqli_fetch_array($sql);

                    if ($avg['average'] <= 4 AND $avg['average'] > 3) {
                        $keterangan = "Mandiri";
                      }elseif ($avg['average'] <= 3 AND $avg['average'] > 2) {
                        $keterangan = "Berkembang";
                      }else{
                        $keterangan = "Perlu Perbaikan";
                      }
                ?>
                <tr>
                    <td style="width:50%;">
                        <h1>
                            <?php echo $avg['average'];?>
                        </h1>
                        <p>
                            <?php echo $keterangan;?>
                        </p>
                    </td>
                    <td style="width:50%;">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="page">
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
            AKHLAK DAN LEADERSHIP
        </h3>
        <p style="font-size:8px;">(** 1 = Tidak Terlihat, 2 = Jarang Terlihat, 3 = Kadang-Kadang Terlihat, 4 = Sering Terlihat, 5 = Selalu Terlihat)</p>
    </div>

    <table class="table table-borderless">
        <tbody>
            <tr>
                <td style="width:60%;">
                    <div style="width:100%;text-align:center">
                        <canvas id="barChart"></canvas>
                    </div>
                </td>
                
            </tr>
            <tr>
                <td style="width:40%;">
                    <table>
                        <tbody>
                            <tr>Keterangan</tr>
                        <?php

                        $sql = "SELECT * FROM tbnilaikd 
                        LEFT JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                        LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                        LEFT JOIN tbsemester ON tbnilaikd.idsem=tbsemester.idsem
                        WHERE tbsiswa.idsiswa='$idsiswa' AND tbpilar.kdpilar='P01' AND tbsemester.idsem='$idsem'";

                        $view = mysqli_query($con, $sql)or die(mysqli_error());

                        while ($legend=mysqli_fetch_array($view)) { ?>
                            <tr>
                                <td><?php echo $legend['idpilar']; ?></td>
                                <td><?php echo $legend['kd']; ?></td>
                            </tr>
                                <?php }
                                 ?>
                        </tbody>
                    </table>
                </td>
            </tr>

            </tbody>
            </table>
    <hr>
    <!--<div style="width:100%;padding: 10px;text-align:left;border-width: 1;">
        <h3>
            OBSERVASI GURU
        </h3>
                <p style="font-size: 14px;">
            <?php //echo $view_data['ctt_observe']; ?>
        </p>
    </div>-->
    </div>
    
    <div class="page">
    <?php
        
        $sql02 = "SELECT idnilai,tbnilaikd.idsiswa,tbnilaikd.idkelas,tbnilaikd.idsem,
                 tbnilaikd.idpilar,tbnilaikd.nilai_kd,
                 tbsiswa.nama_siswa,tbpilar.kdpilar,tbpilar.kd,tbsemester.thn_ajaran,tbsemester.semester,tbobservasi.ctt_observe 
                 FROM tbnilaikd 
                      LEFT JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                      LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar 
                      LEFT JOIN tbsemester ON tbnilaikd.idsem=tbsemester.idsem 
                      LEFT JOIN tbobservasi ON tbnilaikd.idsiswa=tbobservasi.idsiswa
                      WHERE tbsiswa.idsiswa='$idsiswa' AND tbpilar.kdpilar='P02' AND tbobservasi.kdpilar='P02' AND tbsemester.idsem='$idsem'";

            $view = mysqli_query($con, $sql02)or die(mysqli_error());
            $view_data=mysqli_fetch_array($view);

            $data_kd2 = mysqli_query($con, $sql02);
            $chart_data="";
            while ($row = mysqli_fetch_array($data_kd2)) {
                $idpilar2[]  = $row['idpilar'];
                $nilai_kd2[] = $row['nilai_kd'];
                $kd2[] = $row['kd'];
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
            ILMU DAN LOGIKA
        </h3>
        <p style="font-size:8px;">(** 1 = Perlu Perbaikan, 2 = Berkembang, 3 = Mandiri)</p>
    </div>

    <table class="table table-borderless">
        <tbody>
            <tr>
                <td style="width:60%;">
                    <div style="width:100%;text-align:center">
                        <canvas id="barChart2"></canvas>
                    </div>
                </td>
                
            </tr>
            <tr>
                <td style="width:40%;">
                    <table>
                        <tbody>
                            <tr>Keterangan</tr>
                        <?php

                        $sql = "SELECT * FROM tbnilaikd 
                        LEFT JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                        LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                        LEFT JOIN tbsemester ON tbnilaikd.idsem=tbsemester.idsem
                        WHERE tbsiswa.idsiswa='$idsiswa' AND tbpilar.kdpilar='P02' AND tbsemester.idsem='$idsem'";

                        $view = mysqli_query($con, $sql)or die(mysqli_error());

                        while ($legend=mysqli_fetch_array($view)) { ?>
                            <tr>
                                <td><?php echo $legend['idpilar']; ?></td>
                                <td><?php echo $legend['kd']; ?></td>
                            </tr>
                                <?php }
                                 ?>
                        </tbody>
                    </table>
                </td>
            </tr>

            </tbody>
            </table>
    <hr>
    <!--<div style="width:100%;padding: 10px;text-align:left;border-width: 1;">
        <h3>
            OBSERVASI GURU
        </h3>
                <p style="font-size: 14px;">
            <?php //echo $view_data['ctt_observe']; ?>
        </p>
    </div>-->
    </div>
    
    <div class="page">
    
    <?php
        
        $sql03 = "SELECT idnilai,tbnilaikd.idsiswa,tbnilaikd.idkelas,tbnilaikd.idsem,
                 tbnilaikd.idpilar,tbnilaikd.nilai_kd,
                 tbsiswa.nama_siswa,tbpilar.kdpilar,tbpilar.kd,tbsemester.thn_ajaran,tbsemester.semester, tbobservasi.ctt_observe 
                 FROM tbnilaikd 
                      LEFT JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                      LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar 
                      LEFT JOIN tbsemester ON tbnilaikd.idsem=tbsemester.idsem 
                      LEFT JOIN tbobservasi ON tbnilaikd.idsiswa=tbobservasi.idsiswa
                      WHERE tbsiswa.idsiswa='$idsiswa' AND tbpilar.kdpilar='P03' AND tbobservasi.kdpilar='P03' AND tbsemester.idsem='$idsem'";

            $view = mysqli_query($con, $sql03)or die(mysqli_error());
            $view_data=mysqli_fetch_array($view);

            $data_kd3 = mysqli_query($con, $sql03);
            $chart_data="";
            while ($row = mysqli_fetch_array($data_kd3)) {
                $idpilar3[]  = $row['idpilar'];
                $nilai_kd3[] = $row['nilai_kd'];
                $kd3[] = $row['kd'];
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
            BAKAT DAN LIFESKILL
        </h3>
        <p style="font-size:8px;">(** 1 = Perlu Perbaikan, 2 = Berkembang, 3 = Mandiri)</p>
    </div>

    <table class="table table-borderless">
        <tbody>
            <tr>
                <td style="width:60%;">
                    <div style="width:100%;text-align:center">
                        <canvas id="barChart3"></canvas>
                    </div>
                </td>
                
            </tr>
            <tr>
                <td style="width:40%;">
                    <table>
                        <tbody>
                            <tr>Keterangan</tr>
                        <?php

                        $sql = "SELECT * FROM tbnilaikd 
                        LEFT JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
                        LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
                        LEFT JOIN tbsemester ON tbnilaikd.idsem=tbsemester.idsem
                        WHERE tbsiswa.idsiswa='$idsiswa' AND tbpilar.kdpilar='P03' AND tbsemester.idsem='$idsem'";

                        $view = mysqli_query($con, $sql)or die(mysqli_error());

                        while ($legend=mysqli_fetch_array($view)) { ?>
                            <tr>
                                <td><?php echo $legend['idpilar']; ?></td>
                                <td><?php echo $legend['kd']; ?></td>
                            </tr>
                                <?php }
                                 ?>
                        </tbody>
                    </table>
                </td>
            </tr>

            </tbody>
            </table>
    <hr>
    <!--<div style="width:100%;padding: 10px;text-align:left;border-width: 1;">
        <h3>
            OBSERVASI GURU
        </h3>
                <p style="font-size: 14px;">
            <?php //echo $view_data['ctt_observe']; ?>
        </p>
    </div>-->
    </div>
    
    <div class="page">
    
    
    
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
        <h3 class="page-header" >
            DOKUMENTASI OBSERVASI
        </h3>
    </div>

    <table class="table table-borderless">
        <tbody>
            <tr>
                <td style="width:40%;">
                        <?php

                        $sql = "SELECT * FROM tbobservasi 
                        LEFT JOIN tbsiswa ON tbobservasi.idsiswa=tbsiswa.idsiswa
                        LEFT JOIN tbsemester ON tbobservasi.idsem=tbsemester.idsem
                        WHERE tbsiswa.idsiswa='$idsiswa' AND tbsemester.idsem='$idsem'";

                        $view = mysqli_query($con, $sql)or die(mysqli_error());

                        while ($legend=mysqli_fetch_array($view)) { ?>
                            <tr>
                                <td style="width:30%;"><img src="../images/<?= $legend['foto']; ?>" width="100"></td>
                                <td style="text-align:left;"><?= $legend['ctt_observe']; ?></td>
                                
                            </tr>
                                <?php }
                                 ?>
                </td>
            </tr>

            </tbody>
            </table>
    <hr>
    </div>
    
    <?php } ?>
    </body>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">
        //setup block
        const data = {
            labels:<?php echo json_encode($idpilar01); ?>,
            datasets: [{
                data:<?php echo json_encode($nilai_kd01); ?>,
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
            data: data,
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            max: 5
                        }
                    }]
                },
                animation :{
                    duration: 0
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
        
        
        //setup block
        const data_2 = {
            labels:<?php echo json_encode($idpilar2); ?>,
            datasets: [{
                data:<?php echo json_encode($nilai_kd2); ?>,
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
        const configP02 = {
            type: 'horizontalBar',
            data: data_2,
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            max: 3
                        }
                    }]
                },
                animation :{
                    duration: 0
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
        
        const barChart_2 = new Chart(
            document.getElementById('barChart2'),
            configP02
        );
        
        //setup block
        const data_3 = {
            labels:<?php echo json_encode($idpilar3); ?>,
            datasets: [{
                data:<?php echo json_encode($nilai_kd3); ?>,
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
        const configP03 = {
            type: 'horizontalBar',
            data: data_3,
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            max: 3
                        }
                    }]
                },
                animation :{
                    duration: 0
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
        
        const barChart_3 = new Chart(
            document.getElementById('barChart3'),
            configP03
        );
        //var ctx = document.getElementById("barChart").getContext('2d');
        //var myChart = new Chart(ctx, { });
        
        window.print();
        </script>
        </html>