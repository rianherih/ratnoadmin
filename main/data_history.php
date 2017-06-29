	<?php
include("../include/lib_func.php");
  $kode_users = $_GET['kode_users'];
  $kode_bulan = $_GET['kode_bulan'];
  $id_tahun = $_GET['id_tahun'];

$bln=$id_tahun."-".$kode_bulan;

if($kode_users == "semua")
{
	$sel_bbm = mysql_query("select a.*,
		a.waktu_mulai,
		a.waktu_selesai, 
		b.no_kerjaan,
		b.status_kerjaan,
		b.waktu_sisa,   
		c.nomor_barcode, 
		d.nama_users from tb_history a, 
		tb_kerjaan b, tb_barcode c ,tb_users d
		where waktu_mulai like '$bln%' 
		and a.no_kerjaan = b.no_kerjaan 
		and b.id_barcode = c.id_barcode 
		and d.kode_users = a.kode_users", koneksi_db());
}
else
{
	$sel_bbm = mysql_query("select a.*, 
		a.waktu_mulai,
		a.waktu_selesai, 
		b.no_kerjaan,
		b.status_kerjaan,
		b.waktu_sisa,    
		c.nomor_barcode, 
		d.nama_users from tb_history a, 
		tb_kerjaan b, tb_barcode c ,tb_users d
		where waktu_mulai like '$bln%' 
		and a.no_kerjaan = b.no_kerjaan 
		and b.id_barcode = c.id_barcode 
		and d.kode_users = a.kode_users 
		and a.kode_users ='$kode_users' ", koneksi_db());
}

if(mysql_num_rows($sel_bbm)  !=0)
{



echo"<table width='100%' border='1'>";
echo "<tr align='center'><th align='center'> No Kerjaan</th>
						<th align='center'> Nomor Barcode</th>
						<th align='center'> Nama User <br/> </th>
						<th align='center'> Sisa Waktu</th>
						<th align='center'> Waktu Mulai</th>
						<th align='center'> Waktu Selesai</th>
						<th align='center'> Status</th>
						</tr>";
while($tpl_bbm = mysql_fetch_array($sel_bbm))
{
	echo"<tr align='left'><td>".$tpl_bbm['no_kerjaan']."</td>";
	echo"<td>".$tpl_bbm['nomor_barcode']."</td>";
	echo"<td>".$tpl_bbm['nama_users']."</td>";
	echo"<td>".$tpl_bbm['waktu_sisa']." jam</td>";
	echo"<td>".$tpl_bbm['waktu_mulai']."</td>";
	echo"<td>".$tpl_bbm['waktu_selesai']."</td>";
	if($tpl_bbm['status_kerjaan']=='Pending'){
      echo"<td style='background-color:red' align=center>".$tpl_bbm['status_kerjaan']."</td>";
	}else{
	  echo"<td style='background-color:green' align=center>".$tpl_bbm['status_kerjaan']."</td>";
	}
	echo"</tr>";
}
echo "</table>";
}else{ echo "Tidak Ditemukan";}
?>


