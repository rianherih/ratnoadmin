<?php 
    
        include("../include/lib_func.php");


     $sql = "select a.*, b.detail_list  from tb_listkerjaan a, tb_detaillist b where a.id_listkerjaan = b.id_listkerjaan order by a.id_listkerjaan desc";
     $res = mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='100%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>ID List Kerjaan</td>
                    <td>Nama Kerjaan</td>
                    <td>Detail</td>
                     <td colspan=3 >Action</td>
                </tr>";
        while($data_history=mysql_fetch_array($res))
        {
                 if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 
                       echo" <td>".$i."</td>
                        <td>".$data_history['id_listkerjaan']."</td>
                        <td>".$data_history['nama_listkerjaan']."</td>
                        <td>".$data_history['detail_list']."</td>
                        <td><a href='?page=listkerja&st=detail&id_listkerjaan=".$data_history['id_listkerjaan']."' title='Detail ".$data_history['id_listkerjaan']."' ><img src='img/detail.jpg' height=30/></a></td>
                       <td><a href='?page=listkerja&st=edit&id_listkerjaan=".$data_history['id_listkerjaan']."' title='Edit ".$data_history['id_listkerjaan']."' ><img src='img/edit.jpg' height=25/></a></td>
                        <td><a href='?page=jalur&kd=del_kerjaan&id_listkerjaan=".$data_history['id_listkerjaan']."' "; ?> 
                       onClick="return confirm('Yakin akan menghapus <?php print $data_history['nama_listkerjaan'] ?> ?')"
                       <?php echo "title='Delete ".$data_history['id_listkerjaan']."' ><img src='img/delete.jpg' height=25/></a></td>";
                $i++;
            }
         echo"</table>";
    }
?>