<?php 
    
        include("../include/lib_func.php");


	   $sql	= "select a.*, b.jumlah_limit from tb_kendaraan a, tb_limit b where a.id_limit = b.id_limit order by a.no_kendaraan desc";
	   $res	= mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='100%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>No Kendaraan</td>
                    <td>Kapasitas</td>
                    <td>Limit</td>
                     <td colspan=3 >Action</td>
                </tr>";
    		while($data_history=mysql_fetch_array($res))
    		{
                 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 
                       echo" <td>".$i."</td>
                        <td>".$data_history['no_kendaraan']."</td>
                        <td>".$data_history['kapasitas']."</td>
                        <td>".$data_history['jumlah_limit']."</td>
                        <td><a href='?page=kendaraan&st=detail&no_kendaraan=".$data_history['no_kendaraan']."' title='Detail ".$data_history['no_kendaraan']."' ><img src='img/detail.jpg' height=30/></a></td>
                       <td><a href='?page=kendaraan&st=edit&no_kendaraan=".$data_history['no_kendaraan']."' title='Edit ".$data_history['no_kendaraan']."' ><img src='img/edit.jpg' height=25/></a></td>";
                $i++;
            }
    	   echo"</table>";
    }
?>