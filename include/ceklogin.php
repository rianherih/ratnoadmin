<?php
include("lib_func.php");
$username = stripslashes(mysql_real_escape_string(mysql_escape_string(addslashes($_POST['nama_users']))));
$password = stripslashes(mysql_real_escape_string(mysql_escape_string(addslashes(md5($_POST['password'])))));


$sql="SELECT
			kode_users,
			nama_users,
			email,
			role
			
		FROM
			tb_users
		WHERE
			nama_users = '$username'
		AND 
			password = '$password'";
			

$res=mysql_query($sql,koneksi_db()) or die(mysql_error());
	if(mysql_num_rows($res)==1) 
	{
		$data=mysql_fetch_array($res);
		session_start();
		
		$_SESSION['kode_users']	= $data['kode_users']; 
		$_SESSION['nama_users']	= $data['nama_users']; 
		$_SESSION['email']		= $data['email']; 
		$_SESSION['role']		= $data['role'];
		$jam = date("H:i:s");
  		$tgl = date("Y-m-d");
  		

  		$sql2="insert into tb_log values(null,".$data['kode_users'].",'$username',
                                '$tgl',
                                '$jam',
                                'logged',
                                'online')";
	$result = mysql_query($sql2,koneksi_db()) or die(mysql_error());
    if($result){
    	//
		//$page = ../;
		header("Refresh: 0.1; url=../"); 
		//echo"sukses";
    }
    		
	}
	else
	{
		header("Refresh: 0.1; url=../login/?st=FG"); 
	}
?>