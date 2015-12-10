<?php
// fonctions de base php

// connexion bdd
function connectBase(){
    $base = mysql_connect ('localhost', 'root', '');  
    mysql_select_db ('transport', $base) ;
}
?>