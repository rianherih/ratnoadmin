<?php
$sel    = mysql_query("select id_barang From tb_barang",$link);
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

<h3 >Material Barang</h3>
<hr/>
<div class="col-lg-6" align="center" >
<?php
if(($st == "edit") or ($st == "detail"))
{
    $id_barang           = $_GET['id_barang'];
    $sel2                 = mysql_query("select a.* from tb_barang a  where id_barang ='$id_barang' ",$link);
    $tampil               = mysql_fetch_array($sel2);
    $nama_barang         = $tampil['nama_barang'];
    $id_listkerjaan        = $tampil['id_listkerjaan'];
}

if($st == "edit")
{
    echo "<h3 align='left'>Edit Material Barang</h3>";
}
elseif ($st == "detail") {
    echo "<h3 align='left'>Detail Material Barang</h3>";
}
else
{
   echo "<h3 align='left'>New Material Barang</h3>";
}

if($st == "detail")
{ ?>

<form role='form' name='addbarang' id='addbarang'  action='' method='post' >
 
        <fieldset>
        <div class="form-group">
        <div id="alert_id_barang"></div>
            <input class="form-control" maxlength="10" placeholder="ID barang" id="id_barang" onchange="return nobar(this)" name="id_barang" readonly="reaonly" value="<?php echo $id_barang; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_nama_barang"></div>
            <input class="form-control" placeholder="Nama barang" id="nama_barang" name="nama_barang" readonly="reaonly" value="<?php echo $nama_barang; ?>" type="text">
        </div>

<?php
}
else
{
?>
<hr/>
<form role='form' name='addbarang' id='addbarang'  action='' method='post' >
 <input class="form-control" maxlength="10" placeholder="ID barang" id="st_barang" name="st_barang" readonly="readonly" value="<?php echo $st; ?>" type="text">
        <fieldset>
        <div class="form-group">
        <div id="alert_id_barang"></div>
            <input class="form-control" maxlength="10" onchange="return nobar(this)" placeholder="ID barang" id="id_barang" <?php if($st == "edit"){ echo "readonly='readonly'";} ?>name="id_barang" value="<?php if($st == "edit"){ echo $id_barang;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_nama_barang"></div>
            <input class="form-control" placeholder="Nama barang" id="nama_barang" name="nama_barang" value="<?php if($st == "edit"){ echo $nama_barang;} ?>" type="text">
        </div>

        <div class="form-group">
        <select name="id_listkerjaan" id="id_listkerjaan" class="form-control" >
        <?php 
            list_barang($id_listkerjaan);
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
<h3 align="left">Data barang</h3>
<hr/>
<div id="barang_view"></div>
</div>


