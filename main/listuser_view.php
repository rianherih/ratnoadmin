<?php 
    
        include("../include/lib_func.php");


     $sql = "select a.*, b.status from tb_users a,tb_log b where a.kode_users = b.kode_users and role ='manajemen' order by kode_users asc LIMIT 2,100";
     $res = mysql_query($sql,koneksi_db());
       if(mysql_num_rows($res) != 0)
       {

           $i=1;
           
           echo"<table border='1' width='100%' cellpadding='0' cellspacing='0'>
                <tr align='center' bgcolor='#999999'>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Status</td>
                </tr>";
        while($data_history=mysql_fetch_array($res))
        {
          if($i%2==0){ 
                    echo"<tr align='center' bgcolor='#e8580f'>";} else { echo"<tr align='center'>";} 
              
                        echo"<td>".$i."</td>";
                        echo"<td align='left'>".$data_history['nama_users']."</td>";
                        echo"<td align='left'>".$data_history['email']."</td>";
                        if ($data_history['status']=='offline') {
                          echo"<td style='background-color:red' align=center>".$data_history['status']."</td>";
                        } else {
                          echo"<td style='background-color:green' align=center>".$data_history['status']."</td>";
                        }
                $i++;
            }
         echo"</table>";
    }
?>