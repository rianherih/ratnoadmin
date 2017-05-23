	<?php
include("../include/lib_func.php");
  $kode_users = $_GET['kode_users'];
  $kode_bulan = $_GET['kode_bulan'];
  $id_tahun = $_GET['id_tahun'];

$bln=$id_tahun."-".$kode_bulan;

if($kode_users == "semua")
{
	$sel_bbm = mysql_query("select a.*, d.status, e.status_kerjaan, b.nomor_barcode, c.nama_users from tb_history a, tb_barcode b, tb_users c ,tb_log d,tb_kerjaan e
		where waktu_mulai like '$bln%' and a.id_barcode = b.id_barcode and c.kode_users = a.kode_users and c.kode_users = d.kode_users  and a.no_kerjaan = e.no_kerjaan group by no_kerjaan", koneksi_db());
}
else
{
	$sel_bbm = mysql_query("select a.*, d.status_kerjaan,b.nomor_barcode, c.nama_users, e.status from tb_history a, tb_barcode b, tb_users c ,tb_kerjaan d, tb_log e
		where waktu_mulai like '$bln%' and a.id_barcode = b.id_barcode and c.kode_users = a.kode_users and c.kode_users = e.kode_users and a.kode_users='$kode_users' group by kode_users", koneksi_db());
}

if(mysql_num_rows($sel_bbm)  !=0)
{



echo"<table width='100%' border='1'>";
echo "<tr align='center'><th align='center'> No Kerjaan</th>
						<th align='center'> Nama User <br/> </th>
						<th align='center'> Nomor Barcode</th>
						<th align='center'> Waktu Mulai</th>
						<th align='center'> Waktu Selesai</th>
						<th align='center'> Hasil</th>
						<th align='center'> Status</th>
						</tr>";
while($tpl_bbm = mysql_fetch_array($sel_bbm))
{
	echo"<tr align='left'><td>".$tpl_bbm['no_kerjaan']."</td>";
	echo"<td>".$tpl_bbm['nama_users']."</td>";
	echo"<td>".$tpl_bbm['nomor_barcode']."</td>";
	echo"<td>".$tpl_bbm['waktu_mulai']."</td>";
	echo"<td>".$tpl_bbm['waktu_selesai']."</td>";
	if($tpl_bbm['status_kerjaan']=='OK'){
		if($tpl_bbm['status']=='offline')
      {	
      echo"<td style='background-color:green' align=center>".$tpl_bbm['status_kerjaan']."</td>";
      echo"<td style='background-color:red' align=center>".$tpl_bbm['status']."</td>";
      }      
      else
      {
      echo"<td style='background-color:green' align=center>".$tpl_bbm['status_kerjaan']."</td>";
      echo"<td style='background-color:green' align=center>".$tpl_bbm['status']."</td>";
      }      
	}else{
	  echo"<td style='background-color:red' align=center>".$tpl_bbm['status_kerjaan']."</td>";
      echo"<td style='background-color:red' align=center>".$tpl_bbm['status']."</td>";
	}
	echo"</tr>";
}
echo "</table>";
}else{ echo "Tidak Ditemukan";}
?>


