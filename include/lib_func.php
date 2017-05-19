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
    $sql=mysql_query("delete from tb_barcode  where id_barcode ='$id_barcode'",$link);
    if($sql)
    {
       echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?page=barcode'</script>";
    }
    else
    {
        echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?page=barcode'</script>";
    }
}

//Barang
if($kd == "add_barang")
{
    $st_barang     = $_POST['st_barang'];
    $nama_barang    = $_POST['nama_barang'];
    $id_barang         = $_POST['id_barang'];
    $id_listkerjaan       = $_POST['id_listkerjaan'];
    
    //var_dump($jumlah_barang);
    //die();

    if($st_barang  == "edit")
    {
        $sql="update tb_barang set   nama_barang ='".$nama_barang."', 
                                    id_listkerjaan = '".$id_listkerjaan."'
                                    where id_barang ='$id_barang'";
    }
    else
    {
        $sql="insert into tb_barang values('$id_barang','$nama_barang','$id_listkerjaan')";
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

if($kd == "del_barang")
{
     $id_barang      = $_GET['id_barang'];
    $sql=mysql_query("delete from tb_barang  where id_barang ='$id_barang'",$link);
    if($sql)
    {
       echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?page=barang'</script>";
    }
    else
    {
        echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?page=barang'</script>";
    }
}

//listkerjaan
if($kd == "add_listkerjaan")
{
    $st_listkerjaan       = $_POST['st_listkerjaan'];
    $nama_listkerjaan     = $_POST['nama_listkerjaan'];
    $id_listkerjaan       = $_POST['id_listkerjaan'];
    //var_dump($jumlah_barang);
    //die();

    if($st_listkerjaan  == "edit")
    {
        $sql="update tb_listkerjaan set   nama_listkerjaan ='".$nama_listkerjaan."'
                                    where id_listkerjaan ='$id_listkerjaan'";
    }
    else
    {
        $sql="insert into tb_listkerjaan values('id_listkerjaan','$nama_listkerjaan')";
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
       echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?page=listkerja'</script>";
    }
    else
    {
        echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?page=listkerja'</script>";
    }
}

//users

    if($kd == "add_users")
    {
    $nama_users         = $_POST['nama_users'];
    $id_users       = $_POST['id_users'];
    $email_users         = $_POST['email_users'];
    $password_users      = md5($_POST['password_users']);
    
        if($st_users  == "edit")
    {
        $sql="update tb_users set   nama_users ='".$nama_users."', 
                                    id_users = '".$id_users."',
                                    email_users = '".$email_users."',
                                    password_users = '".$password_users."'
                                    where kode_users ='$kode_users'";
    }
    else
    {
        $sql="insert into tb_users values(null,'$nama_users','$id_users','$email_users','$password_users','manajemen')";
    }
        

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
     $kode_users      = $_GET['kode_users'];
    $sql=mysql_query("delete from tb_users where kode_users ='$kode_users'",$link);
    if($sql)
    {
       echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?page=users'</script>";
    }
    else
    {
        echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?page=userss'</script>";
    }
}

//add kerjaan
if($kd == "add_kerjaan")
{
    $st_kerjaan     = $_POST['st_kerjaan'];
    $no_kerjaan     = $_POST['no_kerjaan'];
    $nama_kerjaan     = $_POST['nama_kerjaan'];
    $status_kerjaan   = $_POST['status_kerjaan'];
    $id_barcode = $_POST['id_listkerjaan'];
    $id_listkerjaan = $_POST['id_listkerjaan'];
    

    if($st_kerjaan  == "edit")
    {
        $sql="update tb_kerjaan set   nama_kerjaan = '".$nama_kerjaan."',
                                        status_kerjaan = '".$status_kerjaan."',
                                        id_barcode = '".$id_barcode."',
                                        id_listkerjaan = '".$id_listkerjaan."'
                                        where no_kerjaan ='$no_kerjaan'";
    }
    else
    {

        $sql="insert into tb_kerjaan values('$no_kerjaan','$nama_kerjaan','$status_kerjaan','$id_barcode','$id_listkerjaan')";
      
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

if($kd == "del_kerjaan")
{
     $no_kerjaan      = $_GET['no_kerjaan'];
    $sql=mysql_query("delete from tb_kerjaan where no_kerjaan ='$no_kerjaan'",$link);
    if($sql)
    {
       echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?page=kerjaan'</script>";
    }
    else
    {
        echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?page=kerjaan'</script>";
    }
}


//Detaillistkerjaan
if($kd == "add_detail")
{
    $st_detail      = $_POST['st_detail'];
    $id_detail     = $_POST['id_detail'];
    $id_listkerjaan     = $_POST['id_listkerjaan'];
    $detail_list       = $_POST['detail_list'];
    //var_dump($jumlah_barang);
    //die();

    if($st_detail  == "edit")
    {
        $sql="update tb_detail set   detail_list ='".$detail_list."',
                                    id_listkerjaan ='".$id_listkerjaan."'
                                    where id_detail ='$id_detail'";
    }
    else
    {
        $sql="insert into tb_detail values('$id_detail','id_listkerjaan','$detail_list')";
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

if($kd == "del_detail")
{
     $id_detail      = $_GET['id_detail'];
    $sql=mysql_query("delete from tb_detail where id_detail ='$id_detail'",$link);
    if($sql)
    {
       echo"<script type='text/javascript'>alert('Proses Berhasil');document.location='?page=detailkerja'</script>";
    }
    else
    {
        echo"<script type='text/javascript'>alert('Proses Gagal');document.location='?page=detailkerja'</script>";
    }
}

function list_barcode($edit)
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


//kerjaan
function list_kerja($edit)
    {    
        $res        = mysql_query("select  a.*  from  tb_listkerjaan a", koneksi_db());
        while($data = mysql_fetch_array($res))
        {
           if(($edit == $data['id_listkerjaan']))
            {
            echo "<option value='".$data['id_listkerjaan']."'selected='selected'>".$data['id_listkerjaan']."</option>";
            }
            else
            {
                echo "<option value='".$data['id_listkerjaan']."'>".$data['nama_listkerjaan']. " </option>";
            }
        }
    }

function choose_kerja($edit)
    {    
        $res        = mysql_query("select  a.*, b.nama_listkerjaan, b.id_listkerjaan  from  tb_kerjaan a, tb_listkerjaan b where a.id_listkerjaan = b.id_listkerjaan", koneksi_db());
        $data = mysql_fetch_array($res);
        
            echo $data['nama_kerjaan']." ".$data['nama_listkerjaan']." ".$data['status_kerjaan']."";
        
    }

//Barang
function list_barang($edit)
    {    
        $res        = mysql_query("select  a.*, b.id_listkerjaan, b.nama_listkerjaan from  tb_barang a, tb_listkerjaan b where a.id_listkerjaan = b.id_listkerjaan ", koneksi_db());
        while($data = mysql_fetch_array($res))
        {
           if(($edit == $data['id_listkerjaan']))
            {
            echo "<option value='".$data['id_listkerjaan']."'selected='selected'>".$data['nama_listkerjaan']."</option>";
            }
            else
            {
                echo "<option value='".$data['id_listkerjaan']."'>".$data['nama_listkerjaan']."</option>";
            }
        }
    }

function choose_barang($edit)
    {    
        $res        = mysql_query("select  a.*, b.id_barang, b.nama_barang  from  tb_listkerjaan a, tb_barang b where a.id_listkerjaan = b.id_listkerjaan and a.id_barang='$edit'", koneksi_db());
        $data = mysql_fetch_array($res);
        
            echo $data['nama_barang']." ".$data['nama_listkerjaan']." ";
        
    }


function list_users()
    {    
        $res        = mysql_query("select  kode_users, nama_users, id_users  from tb_users ", koneksi_db());
        while($data = mysql_fetch_array($res))
        {
          
                echo "<option value='".$data['kode_users']."'>".$data['id_users']."'>".$data['nama_users']."</option>";
        }
    }
?>