<?php
include("../include/lib_func.php");
 $no_kendaraan = $_GET['no_ken'];

$sel_bbm = mysql_query("select * from tb_bbm ", koneksi_db());
echo"<table width='100%' border='1'>";
echo "<tr align='center'><th align='center'> Jenis BBM </th>
						<th align='center'> Limit BBM<br/>(Liter) </th>
						<th align='center'> Pemakaian<br/>(Liter) </th>
						<th align='center'> Sisa Limit<br/>(Liter) </th></tr>";
						 $i=1;
while($tpl_bbm = mysql_fetch_array($sel_bbm))
{
	$id_bbm = $tpl_bbm['id_bbm'];
	 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 

	echo"<td>".$tpl_bbm['nama_bbm']."</td>";
	$sel_limit= mysql_query("select a.*,b.*, c.* from tb_kendaraan a, tb_limit b, tb_bbm c
				where a.no_kendaraan = '$no_kendaraan' and a.id_limit = b.id_limit and b.id_bbm = c.id_bbm ", koneksi_db());
	$tpl_limit= mysql_fetch_array($sel_limit);

	if($tpl_bbm['id_bbm'] == $tpl_limit['id_bbm'])
	{
		echo"<td>".$tpl_limit['jumlah_limit']."</td>";
	}
	else
	{	$tpl_limit['jumlah_limit'] =0;
		echo"<td> Unlimited </td>";
	}

	 $bln = date("Y-m");
	$sel_ken =  mysql_query("select SUM(volume_bbm) as jumlah from tb_transaksi 
				where  waktu like '$bln%' and id_bbm ='$id_bbm' and no_kendaraan='$no_kendaraan'  ", koneksi_db());
	$tpl_ken = mysql_fetch_array($sel_ken);

	$jumlah  = $tpl_ken['jumlah'];
	if($jumlah == null)
	{
		echo"<td>0</td>";
	}
	else
	{
		echo"<td>".$jumlah."</td>";
	}


	

	$sisa =  $tpl_limit['jumlah_limit']-$jumlah; 
	if($tpl_limit['jumlah_limit'] != 0)
	{
		echo"<td>".$sisa."</td>";
	}
	else
	{
		echo"<td> Unlimited </td>";
	}
	 $i++;
	$jumlah =0;
	echo"</tr>";
}
echo "</table>";

?>


