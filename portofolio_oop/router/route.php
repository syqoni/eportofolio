<?php 
	include 'config.php';
	$router = @$_GET['page']; 
	switch ($router) {
		case 'home':
			include 'pages/home/dashboard.php';
			break;

		case 'user':
			include 'controls/user/control.php';
			break;

		case 'fasil':
			include 'controls/fasil/control.php';
			break;

		case 'sem':
			include 'controls/sem/control.php';
			break;

		case 'kelas':
			include 'controls/kelas/control.php';
			break;

		case 'siswa':
			include 'controls/siswa/control.php';
			break;

		case 'pilar':
			include 'controls/pilar/control.php';
			break;

		case 'observe':
			include 'controls/observe/control.php';
			break;

		case 'porto':
			include 'controls/porto/control.php';
			break;

		case 'rapor':
			include 'controls/rapor/control.php';
			break;
		
		default:
			include 'pages/home/dashboard.php';
			break;
	}
?>