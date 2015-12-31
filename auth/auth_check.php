<?php 
session_start(); 

if(!isset($_SESSION['last_access']) || !isset($_SESSION['ipaddr']) || !isset($_SESSION['user'])) 
{ 
  $_SESSION=array(); 
  session_destroy(); 
  header("Location: /transport/login.php"); 
  die(); 
} 

if(time()-$_SESSION['last_access']>$session_timeout) 
{ 
  $_SESSION=array(); 
  session_destroy(); 
  header("Location: /transport/login.php"); 
  die(); 
} 
if($_SERVER['REMOTE_ADDR']!=$_SESSION['ipaddr']) 
{ 
  $_SESSION=array(); 
  session_destroy(); 
  header("Location: /transport/login.php"); 
  die(); 
} 
$_SESSION['last_access']=time(); 
?>