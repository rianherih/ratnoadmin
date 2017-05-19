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
		
		case "barang":
		include"main/barang.php";
		break;

		case "barcode":
		include"main/barcode.php";
		break;
		
		case "listkerja":
		include"main/listkerja.php";
		break;

		case "detailkerja":
		include"main/detailkerja.php";
		break;

		case "simulasi":
		include"main/simulasi.php";
		break;

		case "kerjaan":
		include"main/kerjaan.php";
		break;

		case "users":
		include"main/users.php";
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