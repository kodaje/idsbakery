<?php
session_start();

//include the DB connections details here
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

//check if the user exist in DB
$sql = "SELECT * FROM user WHERE email = '$_POST[email]'" .
	   " AND password = '$_POST[password]'";
						 
$user_data = mysql_query($sql, $con);                                            
$row = mysql_fetch_array($user_data); 

if (empty($row['email']))
{
  //redirect to registration page    
  $to = 'not-exist.html';
  header('Location: '. $to);
  exit;
}


//put user data in Model (User Object)
$user01 = new User();
$user01->setUserEmail($row['email']);
$user01->setUserPassword($row['password']);
$user01->setFirstName($row['firstname']);
$user01->setLastName($row['lastname']);
$user01->setUserType($row['usertype']);
$user01->setUserImage($row['image']);

//put user data in session
$_SESSION['user'] = $user01;

//redirect to the HOME page
$to = 'list.php';
header('Location: '. $to);
mysql_close($con);
exit;
?>