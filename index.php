<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS for the 'Business Frontpage' Template -->
    <link href="css/business-frontpage.css" rel="stylesheet">
    
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.js"></script>
    
</head>

<body>
	
    <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header"> <img src="img/bbm.png">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
               <?php 
               if(empty($_SESSION['role']))
               {
                    header("Refresh: 0.1; url=login/"); 
               }
					if($_SESSION['role'] == "admin" )
					{
						echo"<ul class='nav navbar-nav'>
                                    <li><a href='?page=history_kerjaan'>Data History Kerja</a></li>
									<li><a href='?page=kerjaan'>Kerjaan</a></li>
									<li><a href='?page=barcode'>Barcode</a></li>
									<li><a href='?page=users'>User</a></li>
                                    <li><a href='?page=barang'>Material Barang</a></li>
                                    <li><a href='?page=listkerja'>List Kerja</a></li>
                                    <li><a href='?page=detailkerja'>Detail Kerja</a></li>
									<li><a href='main/logout.php'>Logout</a></li>
									</li>
							   </ul>";
					}
					else if($_SESSION['role'] == "manajemen" )
					{
						echo"<ul class='nav navbar-nav'>
                                    <li><a href='?page=transaksi'>Data History Kerja</a></li>
									<li><a href='main/logout.php'>Logout</a></li>
									</li>
							   </ul>";
					}
			
				?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="business-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <!-- The background image is set in the custom CSS -->
                    <h1 class="tagline">SISTEM MONITORING ALAT BANTU KERJA BLUEPRINT READING</h1>
                </div>
            </div>

        </div>

    </div>

    <div class="container">

        <hr>

        <div class="row">
            <div class="col-lg-9 col-sm-9">
                    <div class="col-lg-12 col-sm-12">
                        <div id='hasil' class='alert_succes' ></div>
                        <?php
                            include"include/lib_func.php";
                            include"include/validasi_func.php";
                            include"include/page.php";
                        ?>

                    </div>

            </div>
            
        
            <div class="col-lg-3 col-sm-3">
                    <h2>Contact Info</h2>
                    <hr>
                    <address>
                       Sistem Monitoring Alat Bantu Kerja Blueprint Reading                       
                    </address>
                    <address>
                    Nama : Ratno Sylvianto<br/>
                    NIM  : 10111917<br/>
                    </address>
            </div>
        </div>       
        <hr>

        <div class="row" >
        
            <div class="col-lg-8">
             <p>Copyright &copy; Ratno Sylvianto 2017</p>
            </div>
            
               
        </div>

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                   
                </div>
            </div>
        </footer>

    </div>
</body>

</html>
