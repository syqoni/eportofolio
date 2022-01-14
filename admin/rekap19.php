<?php
    include '../api/config.php';
    //include '../api/class_user.php';
    //$user = new User();
    //session_start();
    
    session_start();
    if(!isset($_SESSION["login"])){
        header('location: admin_index.php');
        exit;
    }

    include "layout/js_script.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>REKAP NILAI PORTOFOLIO</title>

    <?php 
        include 'layout/css.php';
    ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php
            include "layout/header_mobile.php";
            include "layout/menu_sidebar.php";
        ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
           <?php
                include 'layout/header_desktop.php';
            ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <h3 class="title-3 m-b-30">Rekap Portofolio</h3>
                        <div class="row">
                                <h3 class="title-3 m-b-30">Akhlak</h3>
                                <div class="table-responsive m-b-30">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th colspan="1">kompetensi dasar</th>
                                                <th style="text-align:center;">Almira Azhar Gultom</th>
                                                <th style="text-align:center;">Don Abdad Abibanyu</th>
                                                <th style="text-align:center;">Habiburrahman Hakeem Ar-Riyawie</th>
                                                <th style="text-align:center;">Ibrahim Shadiq Ruslan</th>
                                                <th style="text-align:center;">Ikram Syuhada</th>
                                                <th style="text-align:center;">Mikail Alghazi</th>
                                                <th style="text-align:center;">Muhammad Al Farizi Maulana</th>
                                                <th style="text-align:center;">Muhammad Yahya Dimas</th>
                                                <th style="text-align:center;">Siti Hafshah</th>
                                                <th style="text-align:center;">Vino Mahatma Gusril</th>
                                                <th style="text-align:center;">Tengku Syaiyidah Al Haura Salsabila</th>
                                                <th style="text-align:center;">Farras Ahmad Halim</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                               
                                                        $query = "Select tbpilar.kd as kd,
         Min(Case nama_siswa When 'Almira Azhar Gultom' Then nilai_kd End) Azhar,
         Min(Case nama_siswa When 'Don Abdad Abibanyu' Then nilai_kd End) Abdad,
         Min(Case nama_siswa When 'Habiburrahman Hakeem Ar-Riyawie' Then nilai_kd End) Hakeem,
         Min(Case nama_siswa When 'Ibrahim Shadiq Ruslan' Then nilai_kd End) Baim,
         Min(Case nama_siswa When 'Ikram Syuhada' Then nilai_kd End) Ikram,
         Min(Case nama_siswa When 'Mikail Alghazi' Then nilai_kd End) Ghazi,
         Min(Case nama_siswa When 'Muhammad Al Farizi Maulana' Then nilai_kd End) Farizi,
         Min(Case nama_siswa When 'Muhammad Yahya Dimas' Then nilai_kd End) Yahya,
         Min(Case nama_siswa When 'Siti Hafshah' Then nilai_kd End) Hafshah,
         Min(Case nama_siswa When 'Vino Mahatma Gusril' Then nilai_kd End) Vino,
         Min(Case nama_siswa When 'Tengku Syaiyidah Al Haura Salsabila' Then nilai_kd End) Haura,
         Min(Case nama_siswa When 'Farras Ahmad Halim' Then nilai_kd End) Farras
       From tbnilaikd
    LEFT JOIN tbpilar ON tbnilaikd.idpilar = tbpilar.idpilar
    LEFT JOIN tbsiswa ON tbnilaikd.idsiswa = tbsiswa.idsiswa
    WHERE tbnilaikd.idkelas=1 AND tbnilaikd.idsem=20211 AND tbpilar.kdpilar='P01'
       Group By tbnilaikd.idpilar";
                                                        $data = mysqli_query($con,$query);
                                                        $no=1;
                                                        while ($row=mysqli_fetch_array($data)) {
                                            ?>
                                                            <tr>
                                                                <td><?php echo $no++ ?></td>
                                                                <td colspan="1"><?php echo $row['kd'] ?></td>
                                                                <td style="text-align:center;"><?php echo $row['Azhar'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Abdad'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Hakeem'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Baim'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Ikram'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Ghazi'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Farizi'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Yahya'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Hafshah'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Vino'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Haura'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Farras'];?></td>
                                                                
                                                            </tr>
                                            <?php
                                                        }
                                                
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <h3 class="title-3 m-b-30">Logika</h3>
                                <div class="table-responsive m-b-30">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th colspan="1">kompetensi dasar</th>
                                                <th style="text-align:center;">Almira Azhar Gultom</th>
                                                <th style="text-align:center;">Don Abdad Abibanyu</th>
                                                <th style="text-align:center;">Habiburrahman Hakeem Ar-Riyawie</th>
                                                <th style="text-align:center;">Ibrahim Shadiq Ruslan</th>
                                                <th style="text-align:center;">Ikram Syuhada</th>
                                                <th style="text-align:center;">Mikail Alghazi</th>
                                                <th style="text-align:center;">Muhammad Al Farizi Maulana</th>
                                                <th style="text-align:center;">Muhammad Yahya Dimas</th>
                                                <th style="text-align:center;">Siti Hafshah</th>
                                                <th style="text-align:center;">Vino Mahatma Gusril</th>
                                                <th style="text-align:center;">Tengku Syaiyidah Al Haura Salsabila</th>
                                                <th style="text-align:center;">Farras Ahmad Halim</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               
                                                        $query = "Select tbpilar.kd as kd,
         Min(Case nama_siswa When 'Almira Azhar Gultom' Then nilai_kd End) Azhar,
         Min(Case nama_siswa When 'Don Abdad Abibanyu' Then nilai_kd End) Abdad,
         Min(Case nama_siswa When 'Habiburrahman Hakeem Ar-Riyawie' Then nilai_kd End) Hakeem,
         Min(Case nama_siswa When 'Ibrahim Shadiq Ruslan' Then nilai_kd End) Baim,
         Min(Case nama_siswa When 'Ikram Syuhada' Then nilai_kd End) Ikram,
         Min(Case nama_siswa When 'Mikail Alghazi' Then nilai_kd End) Ghazi,
         Min(Case nama_siswa When 'Muhammad Al Farizi Maulana' Then nilai_kd End) Farizi,
         Min(Case nama_siswa When 'Muhammad Yahya Dimas' Then nilai_kd End) Yahya,
         Min(Case nama_siswa When 'Siti Hafshah' Then nilai_kd End) Hafshah,
         Min(Case nama_siswa When 'Vino Mahatma Gusril' Then nilai_kd End) Vino,
         Min(Case nama_siswa When 'Tengku Syaiyidah Al Haura Salsabila' Then nilai_kd End) Haura,
         Min(Case nama_siswa When 'Farras Ahmad Halim' Then nilai_kd End) Farras
       From tbnilaikd
    LEFT JOIN tbpilar ON tbnilaikd.idpilar = tbpilar.idpilar
    LEFT JOIN tbsiswa ON tbnilaikd.idsiswa = tbsiswa.idsiswa
    WHERE tbnilaikd.idkelas=1 AND tbnilaikd.idsem=20211 AND tbpilar.kdpilar='P02'
       Group By tbnilaikd.idpilar";
                                                        $data = mysqli_query($con,$query);
                                                        $no=1;
                                                        while ($row=mysqli_fetch_array($data)) {
                                            ?>
                                                            <tr>
                                                                <td><?php echo $no++ ?></td>
                                                                <td colspan="1"><?php echo $row['kd'] ?></td>
                                                                <td style="text-align:center;"><?php echo $row['Azhar'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Abdad'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Hakeem'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Baim'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Ikram'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Ghazi'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Farizi'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Yahya'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Hafshah'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Vino'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Haura'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Farras'];?></td>
                                                                
                                                            </tr>
                                            <?php
                                                        }
                                                
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="row">
                                <h3 class="title-3 m-b-30">Bakat dan Lifeskill</h3>
                                <div class="table-responsive m-b-30">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th colspan="1">kompetensi dasar</th>
                                                <th style="text-align:center;">Almira Azhar Gultom</th>
                                                <th style="text-align:center;">Don Abdad Abibanyu</th>
                                                <th style="text-align:center;">Habiburrahman Hakeem Ar-Riyawie</th>
                                                <th style="text-align:center;">Ibrahim Shadiq Ruslan</th>
                                                <th style="text-align:center;">Ikram Syuhada</th>
                                                <th style="text-align:center;">Mikail Alghazi</th>
                                                <th style="text-align:center;">Muhammad Al Farizi Maulana</th>
                                                <th style="text-align:center;">Muhammad Yahya Dimas</th>
                                                <th style="text-align:center;">Siti Hafshah</th>
                                                <th style="text-align:center;">Vino Mahatma Gusril</th>
                                                <th style="text-align:center;">Tengku Syaiyidah Al Haura Salsabila</th>
                                                <th style="text-align:center;">Farras Ahmad Halim</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               
                                                        $query = "Select tbpilar.kd as kd,
         Min(Case nama_siswa When 'Almira Azhar Gultom' Then nilai_kd End) Azhar,
         Min(Case nama_siswa When 'Don Abdad Abibanyu' Then nilai_kd End) Abdad,
         Min(Case nama_siswa When 'Habiburrahman Hakeem Ar-Riyawie' Then nilai_kd End) Hakeem,
         Min(Case nama_siswa When 'Ibrahim Shadiq Ruslan' Then nilai_kd End) Baim,
         Min(Case nama_siswa When 'Ikram Syuhada' Then nilai_kd End) Ikram,
         Min(Case nama_siswa When 'Mikail Alghazi' Then nilai_kd End) Ghazi,
         Min(Case nama_siswa When 'Muhammad Al Farizi Maulana' Then nilai_kd End) Farizi,
         Min(Case nama_siswa When 'Muhammad Yahya Dimas' Then nilai_kd End) Yahya,
         Min(Case nama_siswa When 'Siti Hafshah' Then nilai_kd End) Hafshah,
         Min(Case nama_siswa When 'Vino Mahatma Gusril' Then nilai_kd End) Vino,
         Min(Case nama_siswa When 'Tengku Syaiyidah Al Haura Salsabila' Then nilai_kd End) Haura,
         Min(Case nama_siswa When 'Farras Ahmad Halim' Then nilai_kd End) Farras
       From tbnilaikd
    LEFT JOIN tbpilar ON tbnilaikd.idpilar = tbpilar.idpilar
    LEFT JOIN tbsiswa ON tbnilaikd.idsiswa = tbsiswa.idsiswa
    WHERE tbnilaikd.idkelas=1 AND tbnilaikd.idsem=20211 AND tbpilar.kdpilar='P03'
       Group By tbnilaikd.idpilar";
                                                        $data = mysqli_query($con,$query);
                                                        $no=1;
                                                        while ($row=mysqli_fetch_array($data)) {
                                            ?>
                                                            <tr>
                                                                <td><?php echo $no++ ?></td>
                                                                <td colspan="1"><?php echo $row['kd'] ?></td>
                                                                <td style="text-align:center;"><?php echo $row['Azhar'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Abdad'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Hakeem'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Baim'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Ikram'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Ghazi'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Farizi'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Yahya'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Hafshah'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Vino'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Haura'];?></td>
                                                                <td style="text-align:center;"><?php echo $row['Farras'];?></td>
                                                                
                                                            </tr>
                                            <?php
                                                        }
                                                
                                            
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    

    <?php
    include "layout/js_script.php";
    ?>
    

</body>

</html>
<!-- end document-->
