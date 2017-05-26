<?php
$sel    = mysql_query("select kode_users From tb_users",$link);
$jum    = mysql_num_rows($sel);


?>

<h3 >Users</h3>
<hr/>
<div class="col-lg-6" align="center" >

</div>
<div class="col-lg-6" align="center">
<h3 align="left">Data Pegawai</h3>
<hr/>
<div id="listuser_view"></div>
</div>


