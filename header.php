<!DOCTYPE html>
<html lang="fr">
<?php
// inclusion
include "config/fonctions_base.php";
include "config/fonctions_annexe.php";
include "config/fonctions_affichage.php";
?>

  <head>
    <title>Bienvenue sur TRANSPORT</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/transport/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="/transport/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<link href="/transport/bootstrap/css/theme.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Menu</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="/transport/index.php">Altagna Transport</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
			  <ul class="nav navbar-nav">
				<li><a href="/transport/stat.php">Tableau de Bord</a></li>
				<li><a href="/transport/gestion.php">Gestion</a></li>
				<li><a href="/transport/admin.php">Administration</a></li>
			  </ul>
			</div>
		  </div>
		</div>