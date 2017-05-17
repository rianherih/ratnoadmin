<?php
include("../include/lib_func.php");
  $no_kerjaan = $_GET['no_ken'];

 $select_ken = mysql_query("select id_listkerjaan from tb_kerjaan where no_kerjaan ='$no_kerjaan'",koneksi_db());
$tpl_ken = mysql_fetch_array($select_ken);

$id_listkerjaan = $tpl_ken['id_listkerjaan'];
?>

<div class="form-group">
        <select name="id_barcode" id="id_barcode" class="form-control" >
        <?php 
            list_bbm_limit($no_kerjaan,$id_listkerjaan);
        ?>  
</select>
</div>

<div class="form-group">
<div id="alert_volume_bbm"></div>
        <input class="form-control" maxlength="5" onKeyPress="return checkIt(event,'alert_volume_bbm','Volume Harus Angka')"  placeholder="Banyaknya Yang Dibeli" id="volume_bbm" name="volume_bbm" type="text">
  </div>


<div class="form-group">
 
<button name='submit' class='btn btn-primary' id="proses" type='submit'>Proses</button>
<a href="?page=simulasi"><button name='reset' class='btn btn-primary' type="button" >Selesai</button></a>
</div>