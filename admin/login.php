<?php
	include "../api/config.php";
	//session_start();
	if(isset($_POST['login'])){
		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);

		$login = mysqli_query($con,"SELECT * FROM admin WHERE username='$username'");
		
		if(mysqli_num_rows($login) === 1){
			
			$row = mysqli_fetch_assoc($login);
			
			if($password == $row['password']){
			    $_SESSION["login"] = true;
			    header("Location: dashboard.php");
			    exit;
			}else{
    		    header("Location: admin_index.php");
    		    $error = true;
    		    exit;
		    }
			
		}/**else{
		    header("Location: admin_index.php");
		    $error = true;
		    exit;
		}**/
		
		
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
		
	
	}
?> 