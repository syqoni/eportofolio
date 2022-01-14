<?php 
	include '../../api/config.php';
	$router = @$_GET['page']; 
	switch ($router) {
		case 'user':
			include 'mainpage.php';
			break;

		/**case 'tambah':
			include 'pages/home/dashboard.php';
			break;

		case 'simpan':
			include 'controls/user/control.php';
			break;

		case 'edit':
			include 'controls/fasil/control.php';
			break;

		case 'update':
			include 'controls/sem/control.php';
			break;

		case 'delete':
			include 'controls/kelas/control.php';
			break;**/
		
		default:
			include 'mainpage.php';
			break;
	}
?>