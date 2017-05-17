<h3 >Users</h3>
<hr/>
<div class="col-lg-6" align="center" >

<?php
if(!empty($_GET['st']))
{
    $st = $_GET['st'];
}
else
{
    $st ="";
}

    $kode_users            = $_GET['kode_users'];
    $sel2                = mysql_query("select * from tb_users where kode_users ='$kode_users' ",$link);
    $tampil              = mysql_fetch_array($sel2);
    $nama_users           = $tampil['nama_users'];
    $id_users         = $tampil['id_users'];
    $email_users          = $tampil['email_users'];
if($st == "detail")
{
    echo "<h3 align='left'>Detail Users</h3>";
}
else
{
    echo "<h3 align='left'>New Users</h3>";
}
?>
<hr/>
<form role='form' name='addspbu' id='addspbu'  action='' method='post' >
 
        <fieldset>
        <div class="form-group">
        <div id="alert_nama_spbu"></div>
            <input class="form-control" value="<?php if($st == "detail"){ echo $nama_users;} ?>" placeholder="Nama Users" <?php if($st == "detail"){echo"readonly='readonly'";}?> id="nama_users" name="nama_users" type="text">
        </div>

        <div class="form-group">
       <div id="alert_alamat_spbu"></div>
            <input class="form-control" placeholder="ID Users" value="<?php if($st == "detail"){ echo $id_users;} ?>" <?php if($st == "detail"){echo"readonly='readonly'";}?>id="id_users" name="id_users" type="text">
           </div>

        <div class="form-group">
       <div id="alert_email_spbu"></div>
       <input class="form-control" onchange="return userval(this)" value="<?php if($st == "detail"){ echo $email;} ?>" <?php if($st == "detail"){echo"readonly='readonly'";}?> placeholder="Email Users" onchange="" id="email_users" name="email_users" type="text">
        </div>

        <?php if($st != "detail"){  ?>
        <button name='submit' class='btn btn-primary' type='submit'>Simpan</button><?php } ?>

         
</form>
</fieldset>
</div>

<div class="col-lg-6" align="center">
<h3 align="left">View Users</h3>
<hr/>
<div id="spbu_view"></div>
</div>


