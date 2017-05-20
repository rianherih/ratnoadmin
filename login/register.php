<?php
include("lib_func.php");

    $nama_users          = $_POST['nama_users'];
    $id_users            = $_POST['id_users'];
    $email_users         = $_POST['email_users'];
    $password_users      = md5($_POST['password_users']);


$sql="insert into tb_users values(null,'$nama_users','$id_users','$email_users','$password_users','manajemen')";
$hasil = mysql_query($sql);
if($hasil)
    {
    $response["success"] = "1";
        $response["message"] = "Data sukses diinput";
        echo json_encode($response);
    }
    else
    {$response["success"] = "0";
     $response["message"] = "Maaf , terjadi kesalahan";
        
        // echoing JSON response
        echo json_encode($response);
    }
?>