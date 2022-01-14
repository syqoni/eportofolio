<?php
    include "../api/config.php";
    //include "../api/configure.php";
    //$db = new Database();
    
    session_start();
    
    if(isset($_SESSION["login"])){
        header("Location: dashboard.php");
        exit;
    }
    include "login.php";
    
    
    /**if(isset($_POST['login'])){
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);

		$login = mysqli_query($con,"SELECT * FROM admin WHERE username='$username'");
		
		if(mysqli_num_rows($login) === 1){
			
			$row = mysqli_fetch_assoc($login);
			
			if($password == $row['password']){
			    //set session
			    $_SESSION["login"] = true;
			    
			    header("Location: dashboard.php");
			    exit;
			}
			
		}
		$error = true;
	
	}**/
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
    <title>Login</title>

    <?php 
        include 'layout/css.php';
    ?>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="../images/icon/logo-all.png" alt="LogoSekolah">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="admin_index.php" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Username" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="login" type="submit">sign in</button>
                                
                            </form>
                        </div>
                        <?php if(isset($error)) { ?>
                            <p style="color:red;">Username atau password Anda salah.</p>
                        <?php } ?>
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