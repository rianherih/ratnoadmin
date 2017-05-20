<?php
include("lib_func.php");

$email    = $_GET["email"];
$password = $_GET["password"];

$query = "select * from tb_user where email='$email' and password='$password' ";
$hasil = mysql_query($query);
if (mysql_num_rows($hasil) > 0) {
$response = array();
$response["login"] = array();
while ($data = mysql_fetch_array($hasil))
{
$h['kode_users']  = $data['kode_users'] ;
$h['nama_users']  = $data['nama_users'] ;
$h['id_users']    = $data['id_users'] ;
$h['email']       = $data['email'];
$h['password']    = $data['password'];

 array_push($response["login"], $h);
}
    $response["success"] = "1";
    echo json_encode($response);
}
else {
    $response["success"] = "0";
    $response["message"] = "Tidak ada data";
    echo json_encode($response);
}
?>