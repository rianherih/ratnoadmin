<?php
include("../include/lib_func.php");
$email = stripslashes(mysql_real_escape_string(mysql_escape_string(addslashes($_POST['email']))));
$password = stripslashes(mysql_real_escape_string(mysql_escape_string(addslashes(md5($_POST['password'])))));


$sql="SELECT
			kode_users,
			nama_users,
			email,
			role
			
		FROM
			tb_users
		WHERE
			email = '$email'
		AND 
			password = '$password'";
			

$res=mysql_query($sql,koneksi_db()) or die(mysql_error());
	if(mysql_num_rows($res)==1) 
	{
	$response = array();
	$response["login"] = array();
		while($data=mysql_fetch_array($res)){
		session_start();
		
		$_SESSION['kode_users']	= $data['kode_users']; 
		$_SESSION['nama_users']	= $data['nama_users']; 
		$_SESSION['email']		= $data['email']; 
		$_SESSION['role']		= $data['role'];

		//
		//$page = ../;
		header("Refresh: 0.1; url=../"); 
		//echo"sukses";
		array_push($response["login"], $_SESSION);
		}
	$response["success"] = "1";
	echo json_encode($response);
	}
	else
	{
		$response["success"] = "0";
    $response["message"] = "Tidak ada data";
	echo json_encode($response);
	}
?>