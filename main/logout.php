<?php
include("../include/lib_func.php");
koneksi_db();
session_start();
$jam = date("H:i:s");
mysql_query("UPDATE tb_log SET jam_out='$jam',
                              status='offline'
  WHERE nama_users = '$_SESSION[nama_users]' AND jam_out='logged' AND status='online'");
    session_destroy();
    header("Refresh: 0.1; url=../"); 
?>
