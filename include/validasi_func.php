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



//bbm
$(document).ready(function() {
	 $("#bbm_view").load("main/bbm_view.php");
	 $("#addbbm").submit(function() 
	{
				
		if (!Cekkarakter(this.nama_bbm.value)) 
		{
			document.getElementById('alert_nama_bbm').innerHTML='Nama BBM Tidak Valid';
			this.nama_bbm.focus();
			return (false);
		}else{ document.getElementById('alert_nama_bbm').innerHTML='';}
		if (!Cekkarakter(this.harga_bbm.value)) 
		{
			document.getElementById('alert_harga_bbm').innerHTML='Harga BBM Tidak Valid';
			this.harga_bbm.focus();
			return (false);
		}else{ document.getElementById('alert_harga_bbm').innerHTML='';}
		
			$.post('include/lib_func.php?kd=add_bbm', {
			st_bbm :$("#st_bbm").val(),
		 	id_bbm : $('#id_bbm').val(),			
			nama_bbm : $('#nama_bbm').val(),
			harga_bbm : $('#harga_bbm').val()
			},function(data) {
			document.getElementById('hasil').innerHTML=data;
			$("#bbm_view").load("main/bbm_view.php");
			if(($("#st_bbm").val()) != "edit")
			{
				nama_bbm : $('#nama_bbm').val("");
				harga_bbm : $('#harga_bbm').val("");
			}
			
			
		});
		return false;
		
	});
   
});

//limit
$(document).ready(function() {
	 $("#limit_bbm_view").load("main/limit_view.php");
	 $("#addlimit").submit(function() 
	{
				
		if (!Cekkarakter(this.nama_limit.value)) 
		{
			document.getElementById('alert_nama_limit').innerHTML='Nama Limit Tidak Valid';
			this.nama_limit.focus();
			return (false);
		}else{ document.getElementById('alert_nama_limit').innerHTML='';}

		if (!Cekkarakter(this.jumlah_limit.value)) 
		{
			document.getElementById('alert_jumlah_limit').innerHTML='Jumlah Limit BBM Tidak Valid';
			this.jumlah_limit.focus();
			return (false);
		}else{ document.getElementById('alert_jumlah_limit').innerHTML='';}
		

			$.post('include/lib_func.php?kd=add_limit', {
			st_limit :$("#st_limit").val(),
		 	id_limit : $('#id_limit').val(),			
			nama_limit : $('#nama_limit').val(),
			jumlah_limit : $('#jumlah_limit').val(),
			id_bbm : $('#id_bbm').val()
			},function(data) {

			document.getElementById('hasil').innerHTML=data;
			 $("#limit_bbm_view").load("main/limit_view.php");

			if(($("#st_limit").val()) != "edit")
			{
				nama_limit : $('#nama_limit').val("");
				jumlah_limit : $('#jumlah_limit').val("");
			}
			
			
		});
		return false;
		
	});
   
});

//spbu
function userval(addspbu)
{
    
    
    <?php
    $query = mysql_query("select email from tb_spbu",koneksi_db());
    
    while ($data = mysql_fetch_array($query))
    {
        $email = $data['email'];
        echo "if (document.addspbu.email_spbu.value == \"".$email."\"){";
        //echo "alert('Email sudah dipakai');"; 
        echo "document.getElementById('alert_email_spbu').innerHTML='Email Sudah Dipakai';";
        echo "document.addspbu.email_spbu.value = \"\";";
        echo "document.addspbu.email_spbu.focus();";
        echo "return(false);}";     
    }
  
   ?>
   
}
$(document).ready(function() {

	 $("#spbu_view").load("main/spbu_view.php");
	 $("#addspbu").submit(function() 
	{
				
		if (!Cekkarakter(this.nama_spbu.value)) 
		{
			document.getElementById('alert_nama_spbu').innerHTML='Nama SPBU Tidak Valid';
			this.nama_spbu.focus();
			return (false);
		}else{ document.getElementById('alert_nama_spbu').innerHTML='';}
				
		if (!Cekkarakter(this.alamat_spbu.value)) 
		{
			document.getElementById('alert_alamat_spbu').innerHTML='Alamat SPBU Tidak Valid';
			this.alamat_spbu.focus();
			return (false);
		}else{ document.getElementById('alert_alamat_spbu').innerHTML='';}

		if (!Cekkarakter(this.pemilik_spbu.value)) 
		{
			document.getElementById('alert_pemilik_spbu').innerHTML='Pemilik SPBU Tidak Valid';
			this.pemilik_spbu.focus();
			return (false);
		}else{ document.getElementById('alert_pemilik_spbu').innerHTML='';}
		
		if (!CekEmail(this.email_spbu.value)) 
		{
			document.getElementById('alert_email_spbu').innerHTML='Email SPBU Tidak Valid';
			this.email_spbu.focus();
			return (false);
		}else{ document.getElementById('alert_email_spbu').innerHTML='';}
		

			$.post('include/lib_func.php?kd=add_spbu', {
			nama_spbu :$("#nama_spbu").val(),
		 	alamat_spbu : $('#alamat_spbu').val(),			
			pemilik_spbu : $('#pemilik_spbu').val(),
			email_spbu : $('#email_spbu').val()
			},function(data) {

			document.getElementById('hasil').innerHTML=data;
			$("#spbu_view").load("main/spbu_view.php");

			 nama_spbu :$("#nama_spbu").val("");
		 	alamat_spbu : $('#alamat_spbu').val("");			
			pemilik_spbu : $('#pemilik_spbu').val("");
			email_spbu : $('#email_spbu').val("");
	
			
			
		});
		return false;
		
	});
   
});

//kendaraan
function nopol(addkendaraan)
{
    <?php
    $querys = mysql_query("select no_kendaraan from tb_kendaraan",koneksi_db());
    
    while ($datas = mysql_fetch_array($querys))
    {
        $no_kendaraan = $datas['no_kendaraan'];
        echo "if (document.addkendaraan.no_kendaraan.value == \"".$no_kendaraan."\"){";
        echo "document.getElementById('alert_no_kendaraan').innerHTML='Nomer Kendaraan Sudah Dipakai';";
        echo "document.addkendaraan.no_kendaraan.value = \"\";";
        echo "document.addkendaraan.no_kendaraan.focus();";
        echo "return(false);}";     
    }
  
   ?>
   
}


$(document).ready(function() {

	 $("#kendaraan_view").load("main/kendaraan_view.php");
	 $("#addkendaraan").submit(function() 
	{
				
		if (!Cekkarakter(this.no_kendaraan.value)) 
		{
			document.getElementById('alert_no_kendaraan').innerHTML='No Kendaraan Tidak Valid';
			this.no_kendaraan.focus();
			return (false);
		}else{ document.getElementById('alert_no_kendaraan').innerHTML='';}
				
		if (!Cekkarakter(this.nama_pemilik.value)) 
		{
			document.getElementById('alert_nama_pemilik').innerHTML='Nama Pemilik Tidak Valid';
			this.nama_pemilik.focus();
			return (false);
		}else{ document.getElementById('alert_nama_pemilik').innerHTML='';}

		if (!Cekkarakter(this.alamat_pemilik.value)) 
		{
			document.getElementById('alert_alamat_pemilik').innerHTML='Alamat Pemilik Tidak Valid';
			this.alamat_pemilik.focus();
			return (false);
		}else{ document.getElementById('alert_alamat_pemilik').innerHTML='';}
		
		if (!Cekkarakter(this.merk_kendaraan.value)) 
		{
			document.getElementById('alert_merk_kendaraan').innerHTML='Merk Kendaraan Tidak Valid';
			this.merk_kendaraan.focus();
			return (false);
		}else{ document.getElementById('alert_merk_kendaraan').innerHTML='';}

		if (!Cekkarakter(this.tahun_kendaraan.value)) 
		{
			document.getElementById('alert_tahun_kendaraan').innerHTML='Tahun Kendaraan Tidak Valid';
			this.tahun_kendaraan.focus();
			return (false);
		}else{ document.getElementById('alert_tahun_kendaraan').innerHTML='';}

		if (!Cekkarakter(this.jumlah_roda.value)) 
		{
			document.getElementById('alert_jumlah_roda').innerHTML='Jumlah Roda Kendaraan Tidak Valid';
			this.jumlah_roda.focus();
			return (false);
		}else{ document.getElementById('alert_jumlah_roda').innerHTML='';}

		if (!Cekkarakter(this.kapasitas_kendaraan.value)) 
		{
			document.getElementById('alert_kapasitas_kendaraan').innerHTML='Kapasitas CC Kendaraan Tidak Valid';
			this.kapasitas_kendaraan.focus();
			return (false);
		}else{ document.getElementById('alert_kapasitas_kendaraan').innerHTML='';}
		

			$.post('include/lib_func.php?kd=add_kendaraan', {
			st_kendaraan :$("#st_kendaraan").val(),
			no_kendaraan :$("#no_kendaraan").val(),
		 	nama_pemilik : $('#nama_pemilik').val(),			
			alamat_pemilik : $('#alamat_pemilik').val(),
			merk_kendaraan : $('#merk_kendaraan').val(),
			tahun_kendaraan : $('#tahun_kendaraan').val(),
			jumlah_roda : $('#jumlah_roda').val(),
			kapasitas_kendaraan : $('#kapasitas_kendaraan').val(),
			id_limit : $('#id_limit').val()
			},function(data) {

			document.getElementById('hasil').innerHTML=data;
			$("#kendaraan_view").load("main/kendaraan_view.php");

			if(($("#st_kendaraan").val()) != "edit")
			{
			no_kendaraan :$("#no_kendaraan").val("");
		 	nama_pemilik : $('#nama_pemilik').val("");		
			alamat_pemilik : $('#alamat_pemilik').val("");
			merk_kendaraan : $('#merk_kendaraan').val("");
			tahun_kendaraan : $('#tahun_kendaraan').val("");
			jumlah_roda : $('#jumlah_roda').val("");
			kapasitas_kendaraan : $('#kapasitas_kendaraan').val("");
			}
			
		});
		return false;
		
	});
   
});

//simulasi
function ceknopol(addsimulasi)
{
	
	<?php
    $querys = mysql_query("select no_kendaraan from tb_kendaraan",koneksi_db());
    $x=0;
    while ($datas = mysql_fetch_array($querys))
    {
        $no_kendaraan = $datas['no_kendaraan'];
        echo "if (document.addsimulasi.no_kendaraan.value == \"".$no_kendaraan."\"){";
        $x=1;
        echo"$('#form_informasi').load('main/informasi.php?no_ken=$no_kendaraan');";
        echo"$('#form_next').load('main/transaksi.php?no_ken=$no_kendaraan');";
        echo "document.addsimulasi.no_kendaraan.readOnly = true;";
        echo "return(false);}"; 
    }
    if($x==1)
    {
    	echo "document.getElementById('alert_no_kendaraan').innerHTML='Nomer Kendaraan Tidak Terdaftar';"; 
       	echo "document.addsimulasi.no_kendaraan.value = \"\";";
        echo "document.addsimulasi.no_kendaraan.focus();";
     	echo "return(false);";  
   }
   ?>
}

$(document).ready(function() {
$("#form_informasi").innerHTML="lalal";
	 $("#addsimulasi").submit(function() 
	{
		if (!Cekkarakter(this.volume_bbm.value)) 
		{
			document.getElementById('alert_volume_bbm').innerHTML='Volume BBM Tidak Valid';
			this.volume_bbm.focus();
			return (false);
		}else{ document.getElementById('alert_volume_bbm').innerHTML='';}

			$.post('include/lib_func.php?kd=add_transaksi', {
			no_kendaraan :$("#no_kendaraan").val(),
		 	kode_spbu : $('#kode_spbu').val(),	
		 	volume_bbm : $('#volume_bbm').val(),			
			id_bbm : $('#id_bbm').val()
			},function(data) {

			document.getElementById('hasil').innerHTML=data;			 
			no_kendaraan = $("#no_kendaraan").val();
			$("#form_informasi").load("main/informasi.php?no_ken="+no_kendaraan);
			$('#proses').hide();
			
			
		});
		return false;
		
	});
   
});

function view_history(view_transaksi)
{

	kode_bulan = $("#kode_bulan").val();
	id_tahun = $("#id_tahun").val();
	kode_spbu = $("#kode_spbu").val();
	
	
  $("#hasil_data").load("main/data_history.php?kode_spbu="+kode_spbu+"&id_tahun="+id_tahun+"&kode_bulan="+kode_bulan);
	//$("#hasil_data").load("main/informasi.php?id_bulan="+id_tahun+"&id_tahun="+id_tahun+"&kode_spbu="kode_spbu);
}
//end


</script>
