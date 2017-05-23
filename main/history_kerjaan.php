<h3 >Data History Kerja</h3>
<style>
th{
    color: #FFFFFF;
    font-size: 8pt;
    text-transform: uppercase;
    text-align: center;
    padding: 0.1em;
    border-width: 1px;
    border-style: solid;
    border-color: #969BA5;
    border-collapse: collapse;
    background-color: #265180;
}
</style>
<hr/>
<div class="col-lg-5" align="center" >
<h3 align='left'>Tanggal </h3>
<hr/>
<form role='form' name='view_transaksi' id='view_transaksi'  action='#' method='post' >
	<fieldset>
	
 

 <div class="col-lg-6" align="center" >
        <div class="form-group">
         <select name="kode_bulan" id="kode_bulan" class="form-control" onchange="return view_history(this)"  >
	         <option value="01">Januari</option>
	         <option value="02">Februari</option>
	         <option value="03">Maret</option>
	         <option value="04">April</option>
	         <option value="05">Mei</option>
	         <option value="06">Juni</option>
	         <option value="07">Juli</option>
	         <option value="08">Agustus</option>
	         <option value="09">September</option>
	         <option value="10">Oktober</option>
	         <option value="11">November</option>
	         <option value="12">Desember</option>
         </select>
  		</div>		
</div>

<div class="col-lg-6" align="center" >
        <div class="form-group">
         <select name="id_tahun" id="id_tahun" class="form-control"onchange="return view_history(this)"  >
	         <option value="2017">2017</option>
	         <option value="2018">2018</option>
         </select>
  		</div>	
</div>
</div>

<?php 
if($_SESSION['role'] =="manajemen")
{ ?>
<div class="col-lg-7" align="center" >
		<h3 align='left'> </h3>
		<hr/>
		<div class="col-lg-10" align="center" >
		<div class="form-group" >
<input class="form-control"  id="kode_users" name="kode_users" value="<?php echo $_SESSION['kode_users']; ?>" type="hidden" readonly="reaonly"  >
</div>
</div>
<?php }else { ?>

	

		<div class="col-lg-7" align="center" >
		<h3 align='left'>Users </h3>
		<hr/>
		<div class="col-lg-10" align="center" >
		  		<div class="form-group" >
		        <select name="kode_users" id="kode_users" class="form-control" onchange="return view_history(this)" >
		        <option value="semua">Semua Users</option>
		        <?php 
		            list_users();
		        ?>  
		</select>
		</div></div>
		
<?php } ?>

</form>
</div>

<div class="col-lg-12" align="center" >
<h3 align='Center'>Hasil</h3>
<hr/>
<div id="hasil_data"></div>

</div>


