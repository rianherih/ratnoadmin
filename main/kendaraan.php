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

<h3 >Kendaraaan</h3>
<hr/>
<div class="col-lg-6" align="center" >
<?php
if(($st == "edit") or ($st == "detail"))
{
    $no_kendaraan           = $_GET['no_kendaraan'];
    $sel2                   = mysql_query("select a.* from tb_kendaraan a  where no_kendaraan ='$no_kendaraan' ",$link);
    $tampil                 = mysql_fetch_array($sel2);
    $nama_pemilik           = $tampil['nama_pemilik'];
    $alamat_pemilik         = $tampil['alamat_pemilik'];
    $merk_kendaraan         = $tampil['merk'];
    $tahun_kendaraan        = $tampil['tahun'];
    $kapasitas_kendaraan    = $tampil['kapasitas'];
    $jumlah_roda            = $tampil['jumlahroda'];
    $id_limit               = $tampil['id_limit'];
}

if($st == "edit")
{
    echo "<h3 align='left'>Edit Kendaraan</h3>";
}
elseif ($st == "detail") {
    echo "<h3 align='left'>Detail Kendaraan</h3>";
}
else
{
   echo "<h3 align='left'>New Kendaraan</h3>";
}

if($st == "detail")
{ ?>

<form role='form' name='addkendaraan' id='addkendaraan'  action='' method='post' >
 
        <fieldset>
        <div class="form-group">
        <div id="alert_no_kendaraan"></div>
            <input class="form-control" maxlength="10" placeholder="Nomer Kendaraan" id="no_kendaraan" onchange="return nopol(this)" name="no_kendaraan" readonly="reaonly" value="<?php echo $no_kendaraan; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_nama_pemilik"></div>
            <input class="form-control" placeholder="Nama Pemilik Kendaraan" id="nama_pemilik" name="nama_pemilik" readonly="reaonly" value="<?php echo $nama_pemilik; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_alamat_pemilik"></div>
            <input class="form-control"  placeholder="Alamat Pemilik Kendaraan" id="alamat_pemilik" name="alamat_pemilik" readonly="reaonly" value="<?php echo $alamat_pemilik; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_merk_kendaraan"></div>
            <input class="form-control"  placeholder="Merk Kendaraan" id="merk_kendaraan" name="merk_kendaraan" readonly="reaonly" value="<?php echo $merk_kendaraan; ?>" type="text">
        </div>

         <div class="form-group">
        <div id="alert_tahun_kendaraan"></div>
            <input class="form-control" maxlength="4"  placeholder="Tahun Kendaraan" id="tahun_kendaraan" name="tahun_kendaraan" readonly="reaonly" value="<?php echo $tahun_kendaraan; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_kapasitas_kendaraan"></div>
            <input class="form-control" maxlength="5"  placeholder="Kapasitas CC Kendaraan" id="kapasitas_kendaraan" name="kapasitas_kendaraan" readonly="reaonly" value="<?php echo $kapasitas_kendaraan; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_jumlah_roda"></div>
            <input class="form-control" maxlength="1" placeholder="Jumlah Roda Kendaraan" id="jumlah_roda" name="jumlah_roda" readonly="reaonly" value="<?php echo $jumlah_roda; ?>" type="text">
        </div>

        <div class="form-group">
        <input class="form-control"  placeholder="Kapasitas CC Kendaraan" id="kapasitas_kendaraan" name="kapasitas_kendaraan" readonly="reaonly" value="<?php  choose_limit($id_limit); ?>" type="text">
        </div>
<?php
}
else
{
?>
<hr/>
<form role='form' name='addkendaraan' id='addkendaraan'  action='' method='post' >
 <input class="form-control" maxlength="10" placeholder="Nomer Kendaraan" id="st_kendaraan" name="st_kendaraan" readonly="readonly" value="<?php echo $st; ?>" type="text">
        <fieldset>
        <div class="form-group">
        <div id="alert_no_kendaraan"></div>
            <input class="form-control" maxlength="10" onchange="return nopol(this)" placeholder="Nomer Kendaraan" id="no_kendaraan" <?php if($st == "edit"){ echo "readonly='readonly'";} ?>name="no_kendaraan" value="<?php if($st == "edit"){ echo $no_kendaraan;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_nama_pemilik"></div>
            <input class="form-control" placeholder="Nama Pemilik Kendaraan" id="nama_pemilik" name="nama_pemilik" value="<?php if($st == "edit"){ echo $nama_pemilik;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_alamat_pemilik"></div>
            <input class="form-control"  placeholder="Alamat Pemilik Kendaraan" id="alamat_pemilik" name="alamat_pemilik" value="<?php if($st == "edit"){ echo $alamat_pemilik;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_merk_kendaraan"></div>
            <input class="form-control"  placeholder="Merk Kendaraan" id="merk_kendaraan" name="merk_kendaraan" value="<?php if($st == "edit"){ echo $merk_kendaraan;} ?>" type="text">
        </div>

         <div class="form-group">
        <div id="alert_tahun_kendaraan"></div>
            <input class="form-control" maxlength="4" onKeyPress="return checkIt(event,'alert_tahun_kendaraan','Tahun Kendaraan Harus Angka')" placeholder="Tahun Kendaraan" id="tahun_kendaraan" name="tahun_kendaraan" value="<?php if($st == "edit"){ echo $tahun_kendaraan;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_kapasitas_kendaraan"></div>
            <input class="form-control" maxlength="5" onKeyPress="return checkIt(event,'alert_kapasitas_kendaraan','Kapasitas CC Kendaraan Harus Angka')"  placeholder="Kapasitas CC Kendaraan" id="kapasitas_kendaraan" name="kapasitas_kendaraan" value="<?php if($st == "edit"){ echo $kapasitas_kendaraan;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_jumlah_roda"></div>
            <input class="form-control" maxlength="1" onKeyPress="return checkIt(event,'alert_jumlah_roda','Jumlah Roda Harus Angka')"  placeholder="Jumlah Roda Kendaraan" id="jumlah_roda" name="jumlah_roda" value="<?php if($st == "edit"){ echo $jumlah_roda;} ?>" type="text">
        </div>

        <div class="form-group">
        <select name="id_limit" id="id_limit" class="form-control" >
        <?php 
            list_limit($id_limit);
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
<h3 align="left">View Kendaraan</h3>
<hr/>
<div id="kendaraan_view"></div>
</div>


