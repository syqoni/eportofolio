<?php
    include '../../api/config.php';
    //include '../api/class_user.php';
    //$user = new User();
    
    session_start();
    if(!isset($_SESSION["login"])){
        header('location: ../admin_index.php');
        exit;
    }
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
    <title>DATA USER</title>

    <?php 
        include '../../../admin/layout/css.php';
    ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php
            include '../../../admin/layout/header_mobile.php';
            include '../../../admin/layout/menu_sidebar.php';
        ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
           <?php
                include '../../../admin/layout/header_desktop.php';
            ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <?php 
                            if(isset($_GET['edit'])){
                                $edit = mysqli_query($con,"SELECT * FROM user WHERE id_user='$_GET[edit]'") or die(mysqli_error());
                                $r = mysqli_fetch_array($edit);
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Edit Data User</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                            <div class='row form-group'>
                                                <div class='col-12 col-md-9'>
                                                    <input type='hidden' id='id_user' name='id_user' value='$r[id_user]' class='form-control'>
                                                </div>
                                            </div>
                                            
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='username' class='form-control-label'>Username</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='username' name='username' value='$r[username]' class='form-control'>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='password' class='form-control-label'>Password</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='password' id='password' name='password' value='$r[password]' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='level' class='form-control-label'>Level User</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='level' id='level' value='$r[level]' class='form-control'>
                                                        <option value='fasil'>Fasilitator</option>
                                                        <option value='ortu'>Orangtua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='card-footer'>
                                        <input type='submit' name='update' value='Update' class='btn btn-primary btn-sm'/>
                                        <a type='reset' class='btn btn-danger btn-sm' href='?page=data_user'>
                                            <i class='fa fa-ban' ></i> Cancel
                                        </a>
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>";

                                if(isset($_POST['update'])){
                                    mysqli_query($con,"UPDATE user SET
                                        username='$_POST[username]',
                                        password='$_POST[password]',
                                        level='$_POST[level]'
                                        WHERE id_user='$_POST[id_user]'");
                                    echo "<script>window.alert('Data Berhasil Diubah');window.location=('?page=data_user')</script>";
                                }

                            }elseif(isset($_GET['add'])){
                                echo"<div class='col-lg-10'>
                                <div class='card'>
                                    <div class='card-header'>
                                        <strong>Tambah Data User</strong>
                                    </div>
                                    <div class='card-body card-block'>
                                        <form action='#' method='post' enctype='multipart/form-data' class='form-horizontal'>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='username' class='form-control-label'>Username</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='text' id='username' name='username' placeholder='username' class='form-control'>
                                                    <small class='form-text text-muted'>Masukkan username anda.</small>
                                                </div>
                                            </div>

                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='password' class='form-control-label'>Password</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <input type='password' id='password' name='password' placeholder='Password' class='form-control'>
                                                    <small class='help-block form-text'>Masukkan password anda.</small>
                                                </div>
                                            </div>
                                            <div class='row form-group'>
                                                <div class='col col-md-3'>
                                                    <label for='level' class='form-control-label'>Level User</label>
                                                </div>
                                                <div class='col-12 col-md-9'>
                                                    <select name='level' id='level' class='form-control'>
                                                        <option value='fasil'>Fasilitator</option>
                                                        <option value='ortu'>Orangtua</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class='card-footer'>
                                        <input type='submit' name='simpan' value='Simpan' class='btn btn-primary btn-sm'/>
                                        <button type='reset' class='btn btn-danger btn-sm'>
                                            <i class='fa fa-ban'></i> Reset
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>";

                            if(isset($_POST['simpan'])){
                                    mysqli_query($con,"INSERT INTO user (username,password,level)
                                        VALUES ('$_POST[username]',
                                                '$_POST[password]',
                                                '$_POST[level]')");
                                        echo "<script>window.alert('Data Berhasil Disimpan');window.location=('?page=data_user')</script>";
                                }
                            }elseif(isset($_GET['hapus'])) {
                                mysqli_query($con,"DELETE FROM user WHERE id_user='$_GET[hapus]'")or die(mysqli_error());
                                echo "<script>alert('Berhasil Dihapus'); window.location = '?page=data_user'</script>";
                            }else{
                        ?>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- TABLE TOP -->
                                <h3 class="title-5 m-b-35">data user</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        
                                    </div>
                                    <div class="table-data__tool-right">
                                        <a class="au-btn au-btn-icon au-btn--green au-btn--small" href='?page=data_user&add'>
                                            <i class="zmdi zmdi-plus"></i>tambah user</a>
                                    </div>
                                </div>
                                <!-- END OF TABLE TOP -->
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>username</th>
                                                <th>password</th>
                                                <th>level</th>
                                                <th>controls</th>
                                            </tr>
                                        </thead>
                                       <tbody>
                                            <?php

                                            $no=1;
                                            $tampil=mysqli_query($con,"SELECT * FROM user");
                                            while ($data=mysqli_fetch_array($tampil)) {

                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['username']; ?></td>
                                                <td><?php echo $data['password']; ?></td>
                                                <td><?php echo $data['level']; ?></td>
                                                <td>
                                                <div class="table-data-feature">
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="?page=data_user&edit=<?php echo $data['id_user']; ?>">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="?page=data_user&hapus=<?php echo $data['id_user']; ?>">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </div>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                        
                        <?php
                            }
                        ?>

                        
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
    include '../../../admin/layout/js_script.php';
    ?>

</body>

</html>
<!-- end document-->
