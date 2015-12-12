<?php

// Variable Environnement
define ("Racine", "/var/www/html/transport");

// fonctions de base php
// connexion bdd
function connectBase(){
	$DB_host = "127.0.0.1";
	$DB_user = "root";
	$DB_pass = "";
	$DB_dbName = "transport";

    $base = mysql_connect ($DB_host, $DB_user, $DB_pass);  
    mysql_select_db ($DB_dbName, $base) ;
}
?>