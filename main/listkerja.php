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

<form role='form' name='addkerjaan' id='addkerjaan'  action='' method='post' >
 
        <fieldset>
        <div class="form-group">
        <div id="alert_no_kerjaan"></div>
            <input class="form-control" maxlength="10" placeholder="Nomer kerjaan" id="no_kerjaan" onchange="return nopol(this)" name="no_kerjaan" readonly="reaonly" value="<?php echo $no_kerjaan; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_nama_kerjaan"></div>
            <input class="form-control" placeholder="Nama kerjaan" id="nama_kerjaan" name="nama_kerjaan" readonly="reaonly" value="<?php echo $nama_kerjaan; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_status_kerjaan"></div>
            <input class="form-control"  placeholder="Status kerjaan" id="status_kerjaan" name="status_kerjaan" readonly="reaonly" value="<?php echo $status_kerjaan; ?>" type="text">
        </div>

<?php
}
else
{
?>
<hr/>
<form role='form' name='addkerjaan' id='addkerjaan'  action='' method='post' >
 <input class="form-control" maxlength="10" placeholder="No Kerjaan" id="st_kerjaan" name="st_kerjaan" readonly="readonly" value="<?php echo $st; ?>" type="text">
        <fieldset>
        <div class="form-group">
        <div id="alert_no_kerjaan"></div>
            <input class="form-control" maxlength="10" onchange="return nopol(this)" placeholder="Nomer kerjaan" id="no_kerjaan" <?php if($st == "edit"){ echo "readonly='readonly'";} ?>name="no_kerjaan" value="<?php if($st == "edit"){ echo $no_kerjaan;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_nama_kerjaan"></div>
            <input class="form-control" placeholder="Nama kerjaan" id="nama_kerjaan" name="nama_kerjaan" value="<?php if($st == "edit"){ echo $nama_kerjaan;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_status_kerjaan"></div>
            <input class="form-control"  placeholder="Status kerjaan" id="status_kerjaan" name="status_kerjaan" value="<?php if($st == "edit"){ echo $status_kerjaan;} ?>" type="text">
        </div>

        <div class="form-group">
        <select name="id_listkerjaan" id="id_listkerjaan" class="form-control" >
        <?php 
            list_kerja($id_listkerjaan);
        ?>  
        </select>
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

