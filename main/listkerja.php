<?php
$sel    = mysql_query("select id_listkerjaan From tb_listkerjaan",$link);
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

<h3 >List Kerja</h3>
<hr/>
<div class="col-lg-6" align="center" >
<?php
if(($st == "edit") or ($st == "detail"))
{
    $id_listkerjaan           = $_GET['id_listkerjaan'];
    $sel2                 = mysql_query("select a.* from tb_listkerjaan a  where id_listkerjaan ='$id_listkerjaan' ",$link);
    $tampil               = mysql_fetch_array($sel2);
    $nama_listkerjaan         = $tampil['nama_listkerjaan'];
    $waktu_estimasi         = $tampil['waktu_estimasi'];
}

if($st == "edit")
{
    echo "<h3 align='left'>Edit List Kerja</h3>";
}
elseif ($st == "detail") {
    echo "<h3 align='left'>View List Kerja</h3>";
}
else
{
   echo "<h3 align='left'>New List Kerja</h3>";
}

if($st == "detail")
{ ?>

<form role='form' name='addlistkerjaan' id='addlistkerjaan'  action='' method='post' >
 
        <fieldset>
        <div class="form-group">
        <div id="alert_id_listkerjaan"></div>
            <input class="form-control" maxlength="10" placeholder="ID List kerjaan" id="id_listkerjaan" onchange="return liskerj(this)" name="id_listkerjaan" readonly="reaonly" value="<?php echo $id_listkerjaan; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_nama_listkerjaan"></div>
            <input class="form-control" placeholder="Nama List kerjaan" id="nama_listkerjaan" name="nama_listkerjaan" readonly="reaonly" value="<?php echo $nama_listkerjaan; ?>" type="text">
        </div>

         <div class="form-group">
        <div id="alert_waktu_listkerjaan"></div>
            <input class="form-control" placeholder="Waktu Estimasi" id="waktu_estimasi" name="waktu_estimasi" readonly="reaonly" value="<?php echo $waktu_estimasi; ?>" type="text">
        </div>

<?php
}
else
{
?>
<hr/>
<form role='form' name='addlistkerjaan' id='addlistkerjaan'  action='' method='post' >
 <input class="form-control" maxlength="10" placeholder="ID List Kerjaan" id="st_listkerjaan" name="st_listkerjaan" readonly="readonly" value="<?php echo $st; ?>" type="text">
        <fieldset>
        <div class="form-group">
        <div id="alert_id_listkerjaan"></div>
            <input class="form-control" maxlength="10" onchange="return liskerj(this)" placeholder="ID List kerjaan" id="id_listkerjaan" <?php if($st == "edit"){ echo "readonly='readonly'";} ?>name="id_listkerjaan" value="<?php if($st == "edit"){ echo $id_listkerjaan;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_nama_listkerjaan"></div>
            <input class="form-control" placeholder="Nama List kerjaan" id="nama_listkerjaan" name="nama_listkerjaan" value="<?php if($st == "edit"){ echo $nama_listkerjaan;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_waktu_listkerjaan"></div>
            <input class="form-control" placeholder="Waktu Estimasi" id="waktu_estimasi" name="waktu_estimasi" value="<?php if($st == "edit"){ echo $waktu_estimasi;} ?>" type="text">
        </div>

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
<?php } ?>
</div>
<div class="col-lg-6" align="center">
<h3 align="left">Data List Kerja</h3>
<hr/>
<div id="listkerja_view"></div>
</div>


