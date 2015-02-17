
<?php
//test version
//1.declare session
//2.declare class
//3.sql operation
include("db.php");


//$first = $user01->getFirstName();
$result = mysql_query("SELECT name,quantity,price
FROM ingretbl");



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Senarai Bahan-Bahan</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/bootstrap-nav-wizard.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php">Dashboard</a></li>
	      <li class="dropdown">
                <a href="logout.php" class="dropdown-toggle" data-toggle="dropdown"><?php //echo $user01->getFirstName()?><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="logout.php">Logout</a></li>
		</ul>
		
	      </li></ul>
          
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="ingredients.php">Tetapan Bahan</a></li>
            <li><a href="achievement.php">Pencapaian</a></li>
            <li><a href="settings.php">Konfigurasi</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<!--put bootstrap wizard here-->

 <div>
	<ul class='nav nav-wizard'>
				    <li class='active'><a href='#step1' data-toggle="tab">1-Tentukan bahan</a></li>
				    <li><a href='#step2' data-toggle="tab">2-Tentukan Masa</a></li>
				    <li><a href='#step3' data-toggle="tab">3-Siap Pembuatan</a></li>
				  </ul>
 </div>

          <h2 class="sub-header">Senarai bahan-bahan</h2>
	
  <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Bil</th>
                  <th>Bahan-Bahan</th>
                  <th>Kuantiti</th>
                  <th>Harga(Unit)</th>
                  <th>Padam Pengguna?</th>
                </tr>
	      </thead>
	      
	       <?php
  $i = 0;
  while($row = mysql_fetch_array($result))  
  {

     $i++;
     echo "<tr>";
     echo "<td>&nbsp;$i</td>";
     echo "<td>&nbsp;<a href='view.php?name=$row[name]'>$row[name]</a></td>";
     echo "<td>$row[quantity]</td>";
     echo "<td>$row[price]</td>";

     echo "</tr>";
  }
  mysql_close($con);
  ?>
              </tbody>
            </table>
         
         <p><a href = "">Kira Masa Disiapkan</a></p>
        <p><a href = "">Kira Jumlah Boleh Dibuat</a></p>


</body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>
    

  </body>
</html>



