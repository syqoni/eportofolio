<?php
    $con=mysqli_connect("localhost","id15532618_root","Sakura2020.21","id15532618_eporto");


    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        //$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        //$result = mysqli_query($con,$sql);
        //$r = mysqli_fetch_array($result);
        
        $login = mysqli_query($con,"SELECT * FROM user WHERE username='$username'");
		
		if(mysqli_num_rows($login) === 1){
			
			$row = mysqli_fetch_assoc($login);
			
			if($password == $row['password']){
			    
			    if($row['level'] =='fasil'){
                    echo "fasil";
                }else if($row['level']=='ortu'){
                    echo "ortu";
                }else{
                    echo "Anda tidak memiliki akses";
                }
			}else{
		        echo "Username atau password anda salah.";
		    }
			
		}else{
		    echo "Username atau password anda salah.";
		}
		
		mysqli_close($con);
		
        /*if($result){
            if($r['level']=='fasil'){
                echo "fasil";
            }else if($r['level']=='ortu'){
                echo "ortu";
            }else{
                echo "error";
            }
        }else{
            echo "User not found";
        }/*
        
        /*$username = $_POST["username"];
        $password = $_POST["password"];
        
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $response = mysqli_query ($con, $sql);

        $result = array();
        $result['login']= array();

        if (mysqli_num_rows($response) === 1){
            $row = mysqli_fetch_assoc($response);

            if(password_verify($password, $row['password'])){
                $index['username'] = $row['name'];
                $index['level']= $row['level'];

                array_push($result['login'], $index);

                $result['success'] = "1";
                $result['message'] = "success";
                echo json_encode($result);

                mysqli_close($con);
            }else{

                $result['success'] = "0";
                $result['message'] = "error";
                echo json_encode($result);

                mysqli_close($con);
            }
        }*/

    }

?>