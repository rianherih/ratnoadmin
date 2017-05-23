<?php
$sel    = mysql_query("select kode_users From tb_users",$link);
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

<h3 >Users</h3>
<hr/>
<div class="col-lg-6" align="center" >
<?php
if(($st == "edit") or ($st == "detail"))
{
    $kode_users           = $_GET['kode_users'];
    $sel2                 = mysql_query("select a.* from tb_users a  where kode_users ='$kode_users' ",$link);
    $tampil               = mysql_fetch_array($sel2);
    $nama_users           = $tampil['nama_users'];
    $email                = $tampil['email'];
    $password_users       = $tampil['password_users'];
}

if($st == "edit")
{
    echo "<h3 align='left'>Edit Users</h3>";
}
elseif ($st == "detail") {
    echo "<h3 align='left'>Detail Users</h3>";
}
else
{
   echo "<h3 align='left'>New Users</h3>";
}

if($st == "detail")
{ ?>

<form role='form' name='addusers' id='addusers'  action='' method='post' >
 
        <fieldset>
        <div class="form-group">
        <div id="alert_kode_users"></div>
            <input class="form-control" maxlength="10" placeholder="Kode Users" id="kode_users" onchange="return userval(this)" name="kode_users" readonly="reaonly" value="<?php echo $kode_users; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_nama_users"></div>
            <input class="form-control" placeholder="Nama Users" id="nama_users" name="nama_users" readonly="reaonly" value="<?php echo $nama_users; ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_email_users"></div>
            <input class="form-control" placeholder="Email Users" id="email_users" name="email_users" readonly="reaonly" value="<?php echo $email; ?>" type="text">
        </div>

<?php
}
else
{
?>
<hr/>
<form role='form' name='addusers' id='addusers'  action='' method='post' >
 <input class="form-control" maxlength="10" placeholder="Kode Users" id="st_users" name="st_users" readonly="readonly" value="<?php echo $st; ?>" type="text">
        <fieldset>
        <div class="form-group">
        <div id="alert_kode_users"></div>
            <input class="form-control" maxlength="10" onchange="return userval(this)" placeholder="Kode Users" id="kode_users" <?php if($st == "edit"){ echo "readonly='readonly'";} ?>name="kode_users" value="<?php if($st == "edit"){ echo $kode_users;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_nama_users"></div>
            <input class="form-control" placeholder="Nama Users" id="nama_users" name="nama_users" value="<?php if($st == "edit"){ echo $nama_users;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_email_users"></div>
            <input class="form-control" placeholder="Email Users" id="email_users" name="email_users" value="<?php if($st == "edit"){ echo $email;} ?>" type="text">
        </div>

        <div class="form-group">
        <div id="alert_password_users"></div>
            <input class="form-control" placeholder="Password Users" id="password_users" name="password_users" value="<?php if($st == "edit"){ echo $password;} ?>" type="text">
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
<h3 align="left">Data Users</h3>
<hr/>
<div id="users_view"></div>
</div>


