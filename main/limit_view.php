<?php
    
        include("../include/lib_func.php");


	   $sql	= "select a.*,b.nama_bbm from tb_limit a, tb_bbm b where a.id_bbm = b.id_bbm order by a.id_limit desc";
	   $res	= mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='100%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>Nama Limit</td>
                    <td>Jenis BBM</td>
                    <td>Limit</td>
                     <td colspan=2>Action</td>
                </tr>";
    		while($data_history=mysql_fetch_array($res))
    		{
                 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 
                       echo" <td>".$i."</td>
                        <td>".$data_history['nama_limit']."</td>
                        <td>".$data_history['nama_bbm']."</td>
                        <td>".$data_history['jumlah_limit']."</td>
                        <td><a href='?page=limit&st=edit&kode_limit=".$data_history['id_limit']."' title='Edit ".$data_history['nama_limit']."' ><img src='img/edit.jpg' height=25/></a></td>
                       <td><a href='?page=jalur&kd=del_limit&id_limit=".$data_history['id_limit']."' "; ?> 
                       onClick="return confirm('Yakin akan menghapus <?php print $data_history['nama_limit'] ?> ?')"
                       <?php echo "title='Delete ".$data_history['nama_limit']."' ><img src='img/delete.jpg' height=25/></a></td>";
                $i++;
            }
    	   echo"</table>";
    }
?>