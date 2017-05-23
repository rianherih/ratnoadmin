<?php 
    
        include("../include/lib_func.php");


	   $sql	= "select * from tb_users where role ='manajemen' order by kode_users desc";
	   $res	= mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='100%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>Nama</td>
                    <td>ID</td>
                    <td>Email</td>
                     <td colspan=3>Action</td>
                </tr>";
    		while($data_history=mysql_fetch_array($res))
    		{
                 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 
                       echo" <td>".$i."</td>
                        <td>".$data_history['nama_users']."</td>
                        <td>".$data_history['email']."</td>
                        <td><a href='?page=users&st=detail&kode_users=".$data_history['kode_users']."' title='Detail ".$data_history['nama_users']."' ><img src='img/detail.jpg' height=30/></a></td>
                        <td><a href='?page=users&st=edit&kode_users=".$data_history['kode_users']."' title='Edit ".$data_history['nama_users']."' ><img src='img/edit.jpg' height=25/></a></td>
                       <td><a href='?page=jalur&kd=del_users&kode_users=".$data_history['kode_users']."' "; ?> 
                       onClick="return confirm('Yakin akan menghapus <?php print $data_history['nama_users'] ?> ?')"
                       <?php echo "title='Delete ".$data_history['nama_users']."' ><img src='img/delete.jpg' height=25/></a></td>";
                $i++;
            }
    	   echo"</table>";
    }
?>