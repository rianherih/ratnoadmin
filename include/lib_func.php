<?php
error_reporting("E_ALL ^ E_NOTICE");
	function koneksi_db()
	{
		$host		= "localhost";
		$db			= "databasebpreading";
		$user		= "root";
		$password	= "";
		
		$link 		= mysql_connect($host,$user,$password);
		mysql_select_db($db,$link);
		if(!$link)
			echo "Error :".mysql_error();
		return $link;
	}
	$link = koneksi_db();
if(!empty($_GET['kd']))
{
    $kd = $_GET['kd'];
}	
else
{
    $kd = "";
}

//barcode
if($kd == "add_barcode")
{
    $st_barcode      = $_POST['st_barcode'];
    $nomor_barcode    = $_POST['nomor_barcode'];
    $id_barcode      = $_POST['id_barcode'];

    if($st_barcode  == "edit")
    {
        $sql="update tb_barcode set nomor_barcode ='".$nomor_barcode."' where id_barcode ='$id_barcode'";
    }
    else
    {
        $sql="insert into tb_barcode values(null,'$nomor_barcode')";
    }

    $result = mysql_query($sql,$link);
    if($result)
    {
        echo "Proses Berhasil";
    }
    else
    {
        echo "Proses Gagal";
    }
}

if($kd == "del_barcode")
{
     $id_barcode      = $_GET['id_barcode'];
    $sql=mysql_query("delete from tb_bbm  where id_barcode ='$id_barcode'",$link);
    if($sql)
    {
       echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?page=bbm'</script>";
    }
    else
    {
        echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?page=bbm'</script>";
    }
}

//listkerjaan
if($kd == "add_listkerjaan")
{
    $st_listkerjaan       = $_POST['st_listkerjaan'];
    $nama_listkerjaan     = $_POST['nama_listkerjaan'];
    $id_listkerjaan       = $_POST['id_listkerjaan'];
    $id_barcode         = $_POST['id_barcode'];
    //var_dump($jumlah_limit);
    //die();

    if($st_listkerjaan  == "edit")
    {
        $sql="update tb_listkerjaan set   nama_listkerjaan ='".$nama_listkerjaan."', 
                                    id_barcode = '".$id_barcode."'
                                    where id_listkerjaan ='$id_listkerjaan'";
    }
    else
    {
        $sql="insert into tb_listkerjaan values(null,'$nama_listkerjaan','$id_barcode')";
    }

    $result = mysql_query($sql,$link);
    if($result)
    {
        echo "Proses Berhasil";
    }
    else
    {
        echo "Proses Gagal";
    }
}

if($kd == "del_listkerjaan")
{
     $id_listkerjaan      = $_GET['id_listkerjaan'];
    $sql=mysql_query("delete from tb_listkerjaan  where id_listkerjaan ='$id_listkerjaan'",$link);
    if($sql)
    {
       echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?page=limit'</script>";
    }
    else
    {
        echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?page=limit'</script>";
    }
}

function list_bbm($edit)
    {    
        $res        = mysql_query("select  id_barcode, nomor_barcode from tb_barcode ", koneksi_db());
        while($data = mysql_fetch_array($res))
        {
           if(($edit == $data['id_barcode']))
            {
            echo "<option value='".$data['id_barcode']."'selected='selected'>".$data['nomor_barcode']."</option>";
            }
            else
            {
                echo "<option value='".$data['id_barcode']."'>".$data['nomor_barcode']."</option>";
            }
        }
    }

//users

    if($kd == "add_users")
    {
    $nama_users         = $_POST['nama_users'];
    $id_users       = $_POST['id_users'];
    $email_users         = $_POST['email_users'];
    $password_users      = md5($_POST['password_users']);
    
        $sql="insert into tb_users values(null,'$nama_users','$id_users','$email_users','$password_users','manajemen')";

    $result = mysql_query($sql,$link);
    if($result)
    {
        echo "Proses Berhasil<br/> Untuk Password Sama Dengan Email. Segeralah Ganti demi Keamanan.";
    }
    else
    {
        echo "Proses Gagal";
    }
}

if($kd == "del_users")
{
     $kode_spbu      = $_GET['kode_users'];
    $sql=mysql_query("delete from tb_users where kode_users ='$kode_users'",$link);
    if($sql)
    {
       echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?page=spbu'</script>";
    }
    else
    {
        echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?page=spbus'</script>";
    }
}

//kerjaan
function list_limit($edit)
    {    
        $res        = mysql_query("select  a.*, b.nomor_barcode, b.id_barcode  from  tb_listkerjaan a, tb_barcode b where a.id_barcode = b.id_barcode ", koneksi_db());
        while($data = mysql_fetch_array($res))
        {
           if(($edit == $data['id_listkerjaan']))
            {
            echo "<option value='".$data['id_listkerjaan']."'selected='selected'>".$data['nama_listkerjaan']." ".$data['nomor_barcode']. " Liter</option>";
            }
            else
            {
                echo "<option value='".$data['id_listkerjaan']."'>".$data['nama_listkerjaan']." ".$data['nomor_barcode']. " Liter</option>";
            }
        }
    }

function choose_limit($edit)
    {    
        $res        = mysql_query("select  a.*, b.nomor_barcode, b.id_barcode  from  tb_listkerjaan a, tb_barcode b where a.id_barcode = b.id_barcode and a.id_listkerjaan ='$edit'", koneksi_db());
        $data = mysql_fetch_array($res);
        
            echo $data['nama_listkerjaan']." ".$data['nomor_barcode']." Liter";
        
    }

if($kd == "add_kerjaan")
{
    $st_kerjaan     = $_POST['st_kerjaan'];
    $no_kerjaan     = $_POST['no_kerjaan'];
    $nama_kerjaan     = $_POST['nama_kerjaan'];
    $status   = $_POST['status'];
    $id_listkerjaan  = $_POST['id_listkerjaan'];
    

    if($st_kerjaan  == "edit")
    {
        $sql="update tb_kerjaan set   nama_kerjaan = '".$nama_kerjaan."',
                                        status = '".$status."',
                                        id_listkerjaan = '".$id_listkerjaan."'
                                        where no_kerjaan ='$no_kerjaan'";
    }
    else
    {

        $sql="insert into tb_kerjaan values('$no_kerjaan','$nama_kerjaan','$status','$id_listkerjaan')";
      
    }

    $result = mysql_query($sql,$link);
    if($result)
    {
        echo "Proses Berhasil";
    }
    else
    {
        echo "Proses Gagal";
    }
}

//kerjaan
function list_bbm_limit($no_kerjaan,$id_listkerjaan)
    {    
        $res        = mysql_query("select   * from   tb_barcode   ", koneksi_db());
        while($data = mysql_fetch_array($res))
        {
            $id_bbm =$data['id_barcode'];
            $sel_1 =mysql_query("select SUM(volume_bbm) as jumlah_pake from tb_transaksi where id_bbm ='$id_bbm' and no_kendaraan ='$no_kendaraan' ", koneksi_db());
           $data_1= mysql_fetch_array($sel_1);
           $jumlah_pake = $data_1['jumlah_pake'];

           $sel_2 = mysql_query("select jumlah_limit from tb_limit where id_limit = '$id_limit' ", koneksi_db());
           $data_2 = mysql_fetch_array($sel_2);
           $jumlah_limit = $data_2['jumlah_limit'];

           if(  $jumlah_limit != $jumlah_pake )
           {
                echo "<option value='".$data['id_bbm']."'>".$data['nama_bbm']." Rp.".$data['harga']."</option>";
           }

            
        }
    }

if($kd == "add_transaksi")
{
    $kode_spbu        = $_POST['kode_spbu'];
    $no_kendaraan     = $_POST['no_kendaraan'];
    $id_bbm           = $_POST['id_bbm'];
    $volume_bbm       = $_POST['volume_bbm'];
    $sele_harga= mysql_query("select harga from tb_bbm where id_bbm ='$id_bbm'",koneksi_db());
    $tpl_harga = mysql_fetch_array($sele_harga);
     $harga = $tpl_harga['harga'];

   
     $hargaliter = ($volume_bbm*$harga);

   
    
        $sql="insert into tb_transaksi values(null,'$no_kendaraan','$kode_spbu',now(),'$id_bbm','$volume_bbm','$harga','$hargaliter')";
      
    

    $result = mysql_query($sql,$link);
    if($result)
    {
        echo "Proses Berhasil";
    }
    else
    {
        echo "Proses Gagal";
    }
}


function list_spbu()
    {    
        $res        = mysql_query("select  kode_users, nama_users  from tb_users ", koneksi_db());
        while($data = mysql_fetch_array($res))
        {
          
                echo "<option value='".$data['kode_users']."'>".$data['nama_users']."</option>";
        }
    }
?>