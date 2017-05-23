<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>BLUEPRINT READING</title>
<style type="text/css">
  
  body
{
  background-color:#999;
  font-family:Arial, Helvetica, sans-serif;
  font-size:11px;
  color:#336699;
}

.btn-primary {
  color: #fff;
  background-color: #428bca;
  border-color: #357ebd;
}

</style>
</head>

<body background="../img/bg_login.jpg">
<br/><br/><br/><br/><br/>
<form method=post action="../include/ceklogin.php" class="login">
    <table width="300"  height="295" border="0"  align="center" background="../img/log.png">
  	<tr><th>
          <table width="280" border="0"  align="center">
          <tr>
            <th colspan="3" >&nbsp;</th>
          </tr>
          <tr>
            <th colspan="3" >&nbsp;</th>
          </tr>
          <tr>
            <th colspan="3" >&nbsp;</th>
          </tr>
          <tr>
            <th colspan="3" >&nbsp;</th>
          </tr>
          
          <tr>
            <th width="100"><div align="left"><strong>Username</strong></div></th>
            <th scope="col"><strong>:</strong></th>
            <th scope="col"><input name="nama_users" type="text" maxlength="25" size="25" /></th>
          </tr>
          <tr>
            <th width="100"><div align="left"><strong>Password</strong></div></th>
            <th scope="col"><strong>:</strong></th>
            <th scope="col"><input name="password" type="password" maxlength="25" size="25"  />   </th>
          </tr>
          <tr>
            <th colspan="3" >
                <?php  if(!empty($_GET['st']) == "FG"){ echo" Login Gagal, Silahkan Ulangi Lagi"; } ?>
              </th>
          </tr>
          <tr>
            <th colspan="3" align="center"> 
             <button name="submit" class="btn btn-primary" type="submit">Login</button>
             </th>
            </tr>
        </table> 
	</th></tr></table>
       
        </form>
</body>
</html>
