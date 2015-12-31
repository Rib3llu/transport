<?php 
//include "../config/fonctions_base.php";

if(!isset($_POST['passwd'])) 
{ 
  echo 'erreur passwd : '.$passwd.'';
  header("Location: /transport/login.php"); 
  die(); 
} 
$passwd=$_POST['passwd']; 

if(!isset($_POST['login'])) 
{ 
  echo 'erreur login : '.$login.'';
  header("Location: /transport/login.php"); 
  die(); 
} 
$login=$_POST['login']; 

/*if(!CheckUser($login,$passwd)) 
{ 
  echo 'erreur fonction, '.$login.', '.$passwd.'';
  die(); 
} */

if($login=="user" && $passwd=="azerty") 
{
	
session_start(); 

$_SESSION['last_access']=time(); 
$_SESSION['ipaddr']=$_SERVER['REMOTE_ADDR']; 
$_SESSION['user']=$login; 

header("Location: /transport/index.php"); 

} 
else{
	  header("Location: /transport/login.php"); 
}
?>