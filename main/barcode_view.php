<?php
    
        include("../include/lib_func.php");


	   $sql	= "select id_barcode,nomor_barcode from tb_barcode order by id_barcode asc";
	   $res	= mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='90%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>Barcode</td>
                    <td colspan=2>Action</td>
                </tr>";
    		while($data_history=mysql_fetch_array($res))
    		{
                 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center' >";} 
                       echo" <td>".$i."</td>
                        <td align='left' >".$data_history['nomor_barcode']."</td>
                        <td><a href='?page=barcode&st=edit&id_barcode=".$data_history['id_barcode']."' title='Edit ".$data_history['nomor_barcode']."' ><img src='img/edit.jpg' height=25/></a></td>
                        <td><a href='?page=jalur&kd=del_barcode&id_barcode=".$data_history['id_barcode']."' "; ?> 
                        onClick="return confirm('Yakin akan menghapus <?php print $data_history['nomor_barcode'] ?> ?')"
                        <?php echo "title='Delete ".$data_history['nomor_barcode']."' ><img src='img/delete.jpg' height=25/></a></td>";
                $i++;
            }
    	   echo"</table>";
    }
?>