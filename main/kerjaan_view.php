<?php 
    
        include("../include/lib_func.php");


	   $sql	= "select a.*, c.nomor_barcode  from tb_kerjaan a, tb_barcode c where a.id_barcode = c.id_barcode order by a.no_kerjaan asc";
	   $res	= mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='650' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>No kerjaan</td>
                    <td>Nomor Barcode</td>
                    <td>Nama Kerjaan</td>
                    <td>Sisa Waktu</td>
                    <td>Status</td>                    
                    <td colspan=3 >Action</td>
                </tr>";
    		while($data_history=mysql_fetch_array($res))
    		{
                 if($i%2==0){ 
                    echo"<tr align='left' bgcolor='#e8580f'>";} else { echo"<tr align='left'>";} 
                       echo" <td align='center'>".$i."</td>
                        <td>".$data_history['no_kerjaan']."</td>
                        <td>".$data_history['nomor_barcode']."</td>
                        <td>".$data_history['nama_kerjaan']."</td>
                        <td>".$data_history['waktu_sisa']." jam</td>
                        <td>".$data_history['status_kerjaan']."</td>
                        <td align='center'><a href='?page=kerjaan&st=detail&no_kerjaan=".$data_history['no_kerjaan']."' title='Detail ".$data_history['no_kerjaan']."' ><img src='img/detail.jpg' height=30/></a></td>
                        <td align='center'><a href='?page=kerjaan&st=edit&no_kerjaan=".$data_history['no_kerjaan']."' title='Edit ".$data_history['no_kerjaan']."' ><img src='img/edit.jpg' height=25/></a></td>
                        <td align='center'><a href='?page=jalur&kd=del_kerjaan&no_kerjaan=".$data_history['no_kerjaan']."' "; ?> 
                       onClick="return confirm('Yakin akan menghapus <?php print $data_history['no_kerjaan'] ?> ?')"
                       <?php echo "title='Delete ".$data_history['no_kerjaan']."' ><img src='img/delete.jpg' height=25/></a></td>";
                $i++;
            }
    	   echo"</table>";
    }
?>