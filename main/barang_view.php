<?php 
    
        include("../include/lib_func.php");


     $sql = "select a.*, b.nama_listkerjaan from tb_barang a, tb_listkerjaan b where a.id_listkerjaan = b.id_listkerjaan order by a.id_barang asc";
     $res = mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='100%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>ID Barang</td>
                    <td>Nama Barang</td>
                    <td>Nama List Kerja</td>
                     <td colspan=3 >Action</td>
                </tr>";
        while($data_history=mysql_fetch_array($res))
        {
                 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 
                       echo" <td>".$i."</td>
                        <td>".$data_history['id_barang']."</td>
                        <td>".$data_history['nama_barang']."</td>
                        <td>".$data_history['nama_listkerjaan']."</td>
                         <td><a href='?page=barang&st=detail&id_barang=".$data_history['id_barang']."' title='Detail ".$data_history['id_barang']."' ><img src='img/detail.jpg' height=30/></a></td>
                       <td><a href='?page=barang&st=edit&id_barang=".$data_history['id_barang']."' title='Edit ".$data_history['id_barang']."' ><img src='img/edit.jpg' height=25/></a></td>
                        <td><a href='?page=jalur&kd=del_barang&id_barang=".$data_history['id_barang']."' "; ?> 
                       onClick="return confirm('Yakin akan menghapus <?php print $data_history['nama_barang'] ?> ?')"
                       <?php echo "title='Delete ".$data_history['id_barang']."' ><img src='img/delete.jpg' height=25/></a></td>";
                $i++;
            }
         echo"</table>";
    }
?>