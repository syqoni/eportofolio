<?php
    include '../api/config.php';
    include 'layout/css.php';


    if (isset($_GET['nisn'],$_GET['idsem'])) {

        $idsiswa = $_GET['nisn'];
        $idsem = $_GET['idsem'];

        $view = mysqli_query($con, "SELECT * FROM tbnilaikd 
            LEFT JOIN tbsiswa ON tbnilaikd.idsiswa=tbsiswa.idsiswa 
            LEFT JOIN tbpilar ON tbnilaikd.idpilar=tbpilar.idpilar
            LEFT JOIN tbsemester ON tbnilaikd.idsem=tbsemester.idsem
            WHERE tbsiswa.idsiswa='$idsiswa' AND tbsemester.idsem='$idsem'")or die(mysqli_error());
        $view_data=mysqli_fetch_array($view);
    }
 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rapor Portofolio</title> 
    </head>
    <body>

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
                    $sql = mysqli_query($con, "SELECT ROUND(AVG(nilai_kd),2) as average 
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
    </body>
</html>