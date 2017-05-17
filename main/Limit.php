<?php
$sel    = mysql_query("select id_limit From tb_limit",$link);
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

<h3 >Limit Bahan Bakar Minyak</h3>
<hr/>
<div class="col-lg-6" align="center" >
<?php
if($st == "edit")
{
    $kode_limit     = $_GET['kode_limit'];
    $sel2           = mysql_query("select a.*,b.nama_bbm from tb_limit a, tb_bbm b where a.id_bbm = b.id_bbm and id_limit = '$kode_limit' ",$link);
    $tampil         = mysql_fetch_array($sel2);
    $nama_limit     = $tampil['nama_limit'];
    $jumlah_limit   = $tampil['jumlah_limit'];
    $id_bbm         = $tampil['id_bbm'];

    echo "<h3 align='left'>Edit Limit BBM</h3>";
}
else
{
   echo "<h3 align='left'>New Limit BBM</h3>";
}

?>
<hr/>
<form role='form' name='addlimit' id='addlimit'  action='' method='post' >
 
        <fieldset>
        <div class="form-group">
        <div id="alert_nama_limit"></div>
            <input class="form-control" placeholder="Nama Limit" id="nama_limit" name="nama_limit" value="<?php if($st == "edit"){ echo $nama_limit;} ?>"type="text">
            <input class="form-control"  readonly="readonly" value="<?php echo $jum; ?>" id="jumlah_bbm" name="jumlah_bbm" type="hidden">
            <input class="form-control"  readonly="readonly" value="<?php echo $st; ?>" id="st_limit" name="st_limit" type="hidden">
        </div>

        <div class="form-group">
        <select name="id_bbm" id="id_bbm" class="form-control" >
        <?php 
            list_bbm($id_bbm);
        ?>  
        </select>
        </div>

        <div class="form-group">
         <input class="form-control"  readonly="readonly" value="<?php echo $kode_limit; ?>" id="id_limit" name="id_limit" type="hidden">
        <div id="alert_jumlah_limit"></div>
            <input class="form-control" maxlength="3" onKeyPress="return checkIt(event,'alert_jumlah_limit','Jumlah Limit BBM Harus Angka')" placeholder="Jumlah Limit" id="jumlah_limit" name="jumlah_limit" value="<?php if($st == "edit"){ echo $jumlah_limit;} ?>" type="text">
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
</div>

<div class="col-lg-6" align="center">
<h3 align="left">View Limit BBM</h3>
<hr/>
<div id="limit_bbm_view"></div>
</div>


