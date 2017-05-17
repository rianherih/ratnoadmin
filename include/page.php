<?php

if(empty($_GET['page']))
{
	$_GET['page'] = "home";
}
$page = $_GET['page'];
if($_SESSION['role'] == "admin")
{
	switch($page)
	{
		default:
		include"main/history_kerjaan.php";
		break;

		case "transaksi":
		include"main/history_kerjaan.php";
		break;
		
		case "limit":
		include"main/limit.php";
		break;

		case "bbm":
		include"main/bbm.php";
		break;
		
		case "simulasi":
		include"main/simulasi.php";
		break;

		case "kendaraan":
		include"main/kendaraan.php";
		break;

		case "spbu":
		include"main/spbu.php";
		break;

		case "jalur":
		include"include/lib_func.php";
		break;
		
		case "logout":
		include"main/logout.php";
		break;
		
	}
}
else if($_SESSION['role'] == "manajemen")
{
	switch($page)
	{
		default:
		include"main/history_transaksi.php";
		break;

		case "transaksi":
		include"main/history_transaksi.php";
		break;
		
		case "simulasi":
		include"main/simulasi.php";
		break;

		case "logout":
		include"main/logout.php";
		break;
		
		
	}
}


?>