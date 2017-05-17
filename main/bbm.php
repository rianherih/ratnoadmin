<?php
$sel    = mysql_query("select id_barcode From tb_barcode",$link);
$jum    = mysql_num_rows($sel);

if(!empty($_GET['st']))
{
    $st = $_GET['st'];
}
else
{
    $st ="";
}

?>

<h3 >Barcode</h3>
<hr/>
<div class="col-lg-6" align="center" >
<?php
if($st == "edit")
{
   $kode_barcode = $_GET['kode_barcode'];
    $sel2    = mysql_query("select nomor_barcode From tb_barcode where id_barcode ='$kode_barcode' ",$link);
    $tampil = mysql_fetch_array($sel2);
    $nomor_barcode = $tampil['nomor_barcode'];

    echo "<h3 align='left'>Edit Barcode</h3>";
}
else
{
   echo "<h3 align='left'>New Barcode</h3>";
}

?>
<hr/>
<form role='form' name='addbbm' id='addbbm'  action='' method='post' >
 
        <fieldset>
        <div class="form-group">
        <div id="alert_nama_bbm"></div>
            <input class="form-control" placeholder="Nomor Barcode" id="nomor_barcode" name="nomor_barcode" value="<?php if($st == "edit"){ echo $nomor_barcode;} ?>"type="text">
            <input class="form-control" placeholder="Jumlah BBM"   readonly="readonly" value="<?php echo $jum; ?>" id="jumlah_bbm" name="jumlah_bbm" type="hidden">
            <input class="form-control" placeholder="Jumlah BBM" readonly="readonly" value="<?php echo $st; ?>" id="st_barcode" name="st_barcode" type="hidden">
        </div>
        <div class="form-group">
         <input class="form-control" placeholder="Jumlah BBM" readonly="readonly" value="<?php echo $kode_barcode; ?>" id="id_barcode" name="id_barcode" type="hidden">
       
<?php
if($st == "edit")
{
     echo "<button name='submit' class='btn btn-primary' type='submit'>Update</button>";
}
else
{
   echo "<button name='submit' class='btn btn-primary' type='submit'>Simpan</button>";
}

?>
         
</form>
</fieldset>
</div>

<div class="col-lg-6" align="center">
<h3 align="left">View Barcode</h3>
<hr/>
<div id="bbm_view"></div>
</div>


