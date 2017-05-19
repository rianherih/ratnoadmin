<script language="javascript" type="text/javascript">

function CekEmail(teks)
{
	if((teks=="")||(teks.indexOf('@')==-1)||(teks.indexOf('.')==-1)) return (false);
	return true;
}
function Cekkarakter(teks)
{
	if ((teks==""))return (false);
	return true;
}
function checkIt(evt,siiner,sipesan) 
{
	evt = (evt) ? evt : window.event
	var charCode = (evt.which) ? evt.which : evt.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		{
			document.getElementById(siiner).innerHTML= sipesan;
			return false;
		}
			
		return true;
}



//barcode
$(document).ready(function() {
	 $("#barcode_view").load("main/barcode_view.php");
	 $("#addbarcode").submit(function() 
	{
				
		if (!Cekkarakter(this.nomor_barcode.value)) 
		{
			document.getElementById('alert_nomor_barcode').innerHTML='Nomor barcode Tidak Valid';
			this.nomor_barcode.focus();
			return (false);
		}else{ document.getElementById('alert_nomor_barcode').innerHTML='';}
				
			$.post('include/lib_func.php?kd=add_barcode', {
			st_barcode :$("#st_barcode").val(),
		 	id_barcode : $('#id_barcode').val(),			
			nomor_barcode : $('#nomor_barcode').val()
			},function(data) {
			document.getElementById('hasil').innerHTML=data;
			$("#barcode_view").load("main/barcode_view.php");
			if(($("#st_barcode").val()) != "edit")
			{
				id_barcode : $('#id_barcode').val("");
				nomor_barcode : $('#nomor_barcode').val("");
			}
			
			
		});
		return false;
		
	});
   
});

//barang
function nobar(addbarang)
{
    <?php
    $querys = mysql_query("select id_barang from tb_barang",koneksi_db());
    
    while ($datas = mysql_fetch_array($querys))
    {
        $id_barang = $datas['id_barang'];
        echo "if (document.addkerjaan.id_barang.value == \"".$id_barang."\"){";
        echo "document.getElementById('alert_id_barang').innerHTML='ID Barang Sudah Dipakai';";
        echo "document.addkerjaan.id_barang.value = \"\";";
        echo "document.addkerjaan.id_barang.focus();";
        echo "return(false);}";     
    }
  
   ?>
   
}


$(document).ready(function() {

	 $("#barang_view").load("main/barang_view.php");
	 $("#addbarang").submit(function() 
	{
				
		if (!Cekkarakter(this.id_barang.value)) 
		{
			document.getElementById('alert_id_barang').innerHTML='ID Barang Tidak Valid';
			this.id_barang.focus();
			return (false);
		}else{ document.getElementById('alert_id_barang').innerHTML='';}
				
		if (!Cekkarakter(this.nama_barang.value)) 
		{
			document.getElementById('alert_nama_barang').innerHTML='Nama Barang Tidak Valid';
			this.nama_barang.focus();
			return (false);
		}else{ document.getElementById('alert_nama_barang').innerHTML='';}

			$.post('include/lib_func.php?kd=add_barang', {
			st_barang :$("#st_barang").val(),
			id_barang :$("#id_barang").val(),
		 	nama_barang: $('#nama_barang').val(),		
			id_listkerjaan : $('#id_listkerjaan').val()
			},function(data) {

			document.getElementById('hasil').innerHTML=data;
			$("#barang_view").load("main/barang_view.php");

			if(($("#st_barang").val()) != "edit")
			{
			id_barang :$("#id_barang").val("");
		 	nama_barang : $('#nama_barang').val("");		
			}
			
		});
		return false;
		
	});
   
});

//users
function userval(addusers)
{
    
    
    <?php
    $query = mysql_query("select email from tb_users",koneksi_db());
    
    while ($data = mysql_fetch_array($query))
    {
        $email = $data['email'];
        echo "if (document.addusers.email_users.value == \"".$email."\"){";
        //echo "alert('Email sudah dipakai');"; 
        echo "document.getElementById('alert_email_users').innerHTML='Email Sudah Dipakai';";
        echo "document.addusers.email_users.value = \"\";";
        echo "document.addusers.email_users.focus();";
        echo "return(false);}";     
    }
  
   ?>
   
}
$(document).ready(function() {

	 $("#users_view").load("main/users_view.php");
	 $("#addusers").submit(function() 
	{
				
		if (!Cekkarakter(this.nama_users.value)) 
		{
			document.getElementById('alert_nama_users').innerHTML='Nama users Tidak Valid';
			this.nama_users.focus();
			return (false);
		}else{ document.getElementById('alert_nama_users').innerHTML='';}
				
		if (!Cekkarakter(this.id_users.value)) 
		{
			document.getElementById('alert_id_users').innerHTML='id users Tidak Valid';
			this.id_users.focus();
			return (false);
		}else{ document.getElementById('alert_id_users').innerHTML='';}
		
		if (!CekEmail(this.email_users.value)) 
		{
			document.getElementById('alert_email_users').innerHTML='Email users Tidak Valid';
			this.email_users.focus();
			return (false);
		}else{ document.getElementById('alert_email_users').innerHTML='';}
		

			$.post('include/lib_func.php?kd=add_users', {
			nama_users :$("#nama_users").val(),
		 	id_users : $('#id_users').val(),			
			email_users : $('#email_users').val()
			},function(data) {

			document.getElementById('hasil').innerHTML=data;
			$("#users_view").load("main/users_view.php");

			 nama_users :$("#nama_users").val("");
		 	id_users : $('#id_users').val("");			
			email_users : $('#email_users').val("");
	
			
			
		});
		return false;
		
	});
   
});

//kerjaan
function nopol(addkerjaan)
{
    <?php
    $querys = mysql_query("select no_kerjaan from tb_kerjaan",koneksi_db());
    
    while ($datas = mysql_fetch_array($querys))
    {
        $no_kerjaan = $datas['no_kerjaan'];
        echo "if (document.addkerjaan.no_kerjaan.value == \"".$no_kerjaan."\"){";
        echo "document.getElementById('alert_no_kerjaan').innerHTML='Nomer kerjaan Sudah Dipakai';";
        echo "document.addkerjaan.no_kerjaan.value = \"\";";
        echo "document.addkerjaan.no_kerjaan.focus();";
        echo "return(false);}";     
    }
  
   ?>
   
}


$(document).ready(function() {

	 $("#kerjaan_view").load("main/kerjaan_view.php");
	 $("#addkerjaan").submit(function() 
	{
				
		if (!Cekkarakter(this.no_kerjaan.value)) 
		{
			document.getElementById('alert_no_kerjaan').innerHTML='No kerjaan Tidak Valid';
			this.no_kerjaan.focus();
			return (false);
		}else{ document.getElementById('alert_no_kerjaan').innerHTML='';}
				
		if (!Cekkarakter(this.nama_kerjaan.value)) 
		{
			document.getElementById('alert_nama_kerjaan').innerHTML='Nama Pemilik Tidak Valid';
			this.nama_kerjaan.focus();
			return (false);
		}else{ document.getElementById('alert_nama_kerjaan').innerHTML='';}

		if (!Cekkarakter(this.status_kerjaan.value)) 
		{
			document.getElementById('alert_status_kerjaan').innerHTML='Status Kerjaan Tidak Valid';
			this.status_kerjaan.focus();
			return (false);
		}else{ document.getElementById('alert_status_kerjaan').innerHTML='';}	

			$.post('include/lib_func.php?kd=add_kerjaan', {
			st_kerjaan :$("#st_kerjaan").val(),
			no_kerjaan :$("#no_kerjaan").val(),
		 	nama_kerjaan: $('#nama_kerjaan').val(),			
			status_kerjaan : $('#status_kerjaan').val(),
			id_listkerjaan : $('#id_listkerjaan').val()
			},function(data) {

			document.getElementById('hasil').innerHTML=data;
			$("#kerjaan_view").load("main/kerjaan_view.php");

			if(($("#st_kerjaan").val()) != "edit")
			{
			no_kerjaan :$("#no_kerjaan").val("");
		 	nama_kerjaan : $('#nama_kerjaan').val("");		
			status_kerjaan : $('#status_kerjaan').val("");
			}
			
		});
		return false;
		
	});
   
});

//List Kerja
function liskerj(addkerjaan)
{
    <?php
    $querys = mysql_query("select no_kerjaan from tb_kerjaan",koneksi_db());
    
    while ($datas = mysql_fetch_array($querys))
    {
        $no_kerjaan = $datas['no_kerjaan'];
        echo "if (document.addkerjaan.no_kerjaan.value == \"".$no_kerjaan."\"){";
        echo "document.getElementById('alert_no_kerjaan').innerHTML='Nomer kerjaan Sudah Dipakai';";
        echo "document.addkerjaan.no_kerjaan.value = \"\";";
        echo "document.addkerjaan.no_kerjaan.focus();";
        echo "return(false);}";     
    }
  
   ?>
   
}


$(document).ready(function() {

	 $("#kerjaan_view").load("main/kerjaan_view.php");
	 $("#addkerjaan").submit(function() 
	{
				
		if (!Cekkarakter(this.no_kerjaan.value)) 
		{
			document.getElementById('alert_no_kerjaan').innerHTML='No kerjaan Tidak Valid';
			this.no_kerjaan.focus();
			return (false);
		}else{ document.getElementById('alert_no_kerjaan').innerHTML='';}
				
		if (!Cekkarakter(this.nama_kerjaan.value)) 
		{
			document.getElementById('alert_nama_kerjaan').innerHTML='Nama Pemilik Tidak Valid';
			this.nama_kerjaan.focus();
			return (false);
		}else{ document.getElementById('alert_nama_kerjaan').innerHTML='';}

		if (!Cekkarakter(this.status_kerjaan.value)) 
		{
			document.getElementById('alert_status_kerjaan').innerHTML='Status Kerjaan Tidak Valid';
			this.status_kerjaan.focus();
			return (false);
		}else{ document.getElementById('alert_status_kerjaan').innerHTML='';}	

			$.post('include/lib_func.php?kd=add_kerjaan', {
			st_kerjaan :$("#st_kerjaan").val(),
			no_kerjaan :$("#no_kerjaan").val(),
		 	nama_kerjaan: $('#nama_kerjaan').val(),			
			status_kerjaan : $('#status_kerjaan').val(),
			id_listkerjaan : $('#id_listkerjaan').val()
			},function(data) {

			document.getElementById('hasil').innerHTML=data;
			$("#kerjaan_view").load("main/kerjaan_view.php");

			if(($("#st_kerjaan").val()) != "edit")
			{
			no_kerjaan :$("#no_kerjaan").val("");
		 	nama_kerjaan : $('#nama_kerjaan').val("");		
			status_kerjaan : $('#status_kerjaan').val("");
			}
			
		});
		return false;
		
	});
   
});


function view_history(view_transaksi)
{

	kode_bulan = $("#kode_bulan").val();
	id_tahun = $("#id_tahun").val();
	kode_users = $("#kode_users").val();
	
	
  $("#hasil_data").load("main/data_history.php?kode_users="+kode_users+"&id_tahun="+id_tahun+"&kode_bulan="+kode_bulan);
	//$("#hasil_data").load("main/informasi.php?id_bulan="+id_tahun+"&id_tahun="+id_tahun+"&kode_users="kode_users);
}
//end


</script>
