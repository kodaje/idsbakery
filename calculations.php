<?php
//test version
//1.declare session
//2.declare class
//3.sql operation
session_start();
include("db.php");

class User 
{
    var $userEmail;
    var $userPassword;
    var $FirstName;
    var $LastName;
    var $userType;
    var $userImage;

    function User()
    {
    }
    
    function setUserEmail($value)
    {
        $this->userEmail=$value;
    }
    
    function getUserEmail()
    {
        return $this->userEmail;
    }
    
    function setUserPassword($value)
    {
        $this->userPassword=$value;
    }
    
    function getUserPassword()
    {
        return $this->userPassword;
    }   
	
    function setFirstName($value)
    {
        $this->firstName=$value;
    }
    
    function getFirstName()
    {
        return $this->firstName;
    }
    
    function setLastName($value)
    {
        $this->lastName=$value;
    }
    
    function getLastName()
    {
        return $this->lastName;
    }   
	
    function setUserType($value)
    {
        $this->userType=$value;
    }
    
    function getUserType()
    {
        return $this->userType;
    }   	
	
    function setUserImage($value)
    {
        $this->userImage=$value;
    }
    
    function getUserImage()
    {
        return $this->userImage;
    }   	
}

//get session data first for page authentication
if (!isset($_SESSION['user']))
{
  //redirect to terminate.html
  //access violation of page
  $to = "terminate.html";

  header('Location: '. $to);
  exit;
}



$highest = 0;
$sql="SELECT distinct date_sold, num_expired,sold FROM stocks
WHERE date_sold = '$_GET[date_sold]'";
$sqlcal = "Select (sold*0.6) + (num_expired*0.4)  as cal from stocks WHERE date_sold = '$_GET[date_sold]' ";

$result=mysql_query($sql);
$result2=mysql_query($sql);
$resultcal = mysql_query($sqlcal);
$resultcal2 = mysql_query($sqlcal);
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$result2=mysql_query($sql);
//$count2=mysql_num_rows($result2);
$resultcal=mysql_query($sqlcal);
$countcal=mysql_num_rows($resultcal);
$resultcal2=mysql_query($sqlcal);
$countcal2=mysql_num_rows($resultcal2);
$i = 0;

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

    <title>Kira Pembuatan Semula Roti</title>

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
	      <li class="dropdown">
                
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
            <li><a href="list.php">Senarai rekod</a></li>
            <li><a href="input.php">Masukkan input</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<!--put bootstrap wizard here-->

 

          <h2 class="sub-header">Pembuatan Semula Roti</h2>
          
<p>Tarikh Terkini Jualan : <?php echo $_GET[date_sold];?></p>	
  <div class="table-responsive">
            
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Weight</th>
                  <th>Criteria</th>
                  <th>ALT1(Bun Sosej)</th>
                  <th>ALT2(Bun Cheese)</th>
                  <th>ALT3(Bun Redbean)</th>
                </tr>
	      </thead>
              
              
              
<tr><td>0.6</td><td>Jualan(3 Hari)</td><td>
              <?php 
while($rows=mysql_fetch_array($result)){ 
if ( $i % 4 == 0 && $i != 0 && $i != $count )
echo "</tr><tr>"; ?>
<?php echo $rows[sold]."<td>";}?></td></tr>
              
              
<tr><td>0.4</td><td>Jumlah bil tarikh luput</td><td>
<?php 
while($rows=mysql_fetch_array($result2)){ 
if ( $i % 4 == 0 && $i != 0 && $i != $count )
echo "</tr><tr>"; ?>
<?php echo $rows[num_expired]."<td>";}?></td></tr>
              
            <tr><td>1</td><td></td><td>
            
            
<?php

while ($rowcal=mysql_fetch_array($resultcal)){
if ( $i % 4 == 0 && $i != 0 && $i != $countcal )
echo "</tr><tr>"; ?>
<?php echo $rowcal[cal]."<td>";}?></td></tr>
    
            </table>
            <hr>
    
<?php
$highest = 0;
while ($rowcal2=mysql_fetch_array($resultcal2)){
if($rowcal2[cal]>$highest)
$highest =$rowcal2[cal];
}?>

<div class="alert alert-success" role="alert">
<?php
    echo "Maka pilih <strong> nilai yang tertinggi iaitu </strong>".$highest." untuk pembuatan semula";

?>
            
            
<?php


$sqlupdate = "UPDATE choosen
            SET high ='$highest'
            WHERE date_sold = '$_GET[date_sold]'";
            
mysql_query($sqlupdate);
            

?>            
</div>
<hr>
    
    

</body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="assets/js/docs.min.js"></script>

  </body>
</html>


