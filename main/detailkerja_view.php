<?php 
    
        include("../include/lib_func.php");


     $sql = "select a.*, b.nama_listkerjaan from tb_detail a, tb_listkerjaan b where a.id_listkerjaan = b.id_listkerjaan  order by a.id_detail asc";
     $res = mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='100%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>ID Detail Kerjaan</td>
                    <td>Nama Kerjaan</td>
                    <td>Detail Kerjaan</td>
                     <td colspan=3 >Action</td>
                </tr>";
        while($data_history=mysql_fetch_array($res))
        {
                 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 
                       echo" <td>".$i."</td>
                        <td>".$data_history['id_detail']."</td>
                        <td>".$data_history['nama_listkerjaan']."</td>
                        <td>".$data_history['detail_list']."</td>
                        <td><a href='?page=detailkerja&st=detail&id_detail=".$data_history['id_detail']."' title='Detail ".$data_history['id_detail']."' ><img src='img/detail.jpg' height=30/></a></td>
                       <td><a href='?page=detailkerja&st=edit&id_detail=".$data_history['id_detail']."' title='Edit ".$data_history['id_detail']."' ><img src='img/edit.jpg' height=25/></a></td>
                        <td><a href='?page=jalur&kd=del_detail&id_detail=".$data_history['id_detail']."' "; ?> 
                       onClick="return confirm('Yakin akan menghapus <?php print $data_history['detail_list'] ?> ?')"
                       <?php echo "title='Delete ".$data_history['id_detail']."' ><img src='img/delete.jpg' height=25/></a></td>";
                $i++;
            }
         echo"</table>";
    }
?>