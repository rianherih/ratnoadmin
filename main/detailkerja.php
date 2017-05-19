<?php
$sel    = mysql_query("select id_detail From tb_detail",$link);
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

<h3 >Detail Kerja</h3>
<hr/>
<div class="col-lg-6" align="center" >
<?php
if(($st == "edit") or ($st == "detail"))
{
    $id_detail         = $_GET['id_detail'];
    $sel2                 = mysql_query("select a.* from tb_detail a  where id_detail ='$id_detail' ",$link);
    $tampil               = mysql_fetch_array($sel2);
    $detail_list         = $tampil['detail_list'];
    $id_listkerjaan         = $tampil['id_listkerjaan'];
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

<form role='form' name='addtail' id='addtail'  action='' method='post' >
 
        <fieldset>
        <div class="form-group">
        <div id="alert_id_detail"></div>
            <input class="form-control" maxlength="10" placeholder="ID Detail kerjaan" id="id_detail" onchange="return detalis(this)" name="id_detail" readonly="reaonly" value="<?php echo $id_detail; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_detail_list"></div>
            <input class="form-control" placeholder="Detail List kerjaan" id="detail_list" name="detail_list" readonly="reaonly" value="<?php echo $detail_list; ?>" type="text">
        </div>

<?php
}
else
{
?>
<hr/>
<form role='form' name='addtail' id='addtail'  action='' method='post' >
 <input class="form-control" maxlength="10" placeholder="ID Detail List Kerjaan" id="st_detail" name="st_detail" readonly="readonly" value="<?php echo $st; ?>" type="text">
        <fieldset>
        <div class="form-group">
        <div id="alert_id_detail"></div>
            <input class="form-control" maxlength="10" onchange="return detalis(this)" placeholder="ID Detail List kerjaan" id="id_detail" <?php if($st == "edit"){ echo "readonly='readonly'";} ?>name="id_detail" value="<?php if($st == "edit"){ echo $id_detail;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_detail_list"></div>
            <input class="form-control" placeholder="Detail List kerjaan" id="detail_list" name="detail_list" value="<?php if($st == "edit"){ echo $detail_list;} ?>" type="text">
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
<h3 align="left">Data Detail List Kerja</h3>
<hr/>
<div id="detailkerja_view"></div>
</div>


