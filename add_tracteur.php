<html>
<?php
include "fonctions_base.php";
?>
<meta charset="utf-8">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  
   <head><title>Formulaire cr&eactureation d'un Tracteur </title></head>
    <body>
        <h1>Creation d'un Tracteur</h1>
        <h2>Entrez les données demandées :</h2>
        <form name="inscription" method="post" action="add_tracteur.php">
            Marque :	<input type="text" name="marque"/><br><br/>
			Mod&egravele :	<input type="text" name="mod"/><br><br/>
			Immatriculation : <input type="text" name="immat"/><br><br>
            Date construction :	<input type="text" id="datepicker" name="date"/><br><br/>
			Date prochain Controle Technique :	<input type="text" id="datepicker" name="ct"/><br><br/>
			Date prochaine r&eacutevision :	<input type="text" id="datepicker" name="revision"><br><br/>
			Observation : <input type="text" name="obs"/><br><br>
			<br><input type="submit" name="valider" value="OK"/><br/>
        </form>
		<h2><a href="index.php"><< Retour a l'accueil <<</a></h2>
    </body>
<?php
// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['immat'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$marque=$_POST['marque'];
	$mod=$_POST['mod'];
	$immat=$_POST['immat'];
	$date=$_POST['date'];
	$ct=$_POST['ct'];
	$revision=$_POST['revision'];
	$obs=$_POST['obs'];

	$date = date("Y-m-d", strtotime($date));
	$visite = date("Y-m-d", strtotime($ct));
	$entretien = date("Y-m-d", strtotime($revision));
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'INSERT INTO tracteur VALUES("","'.$marque.'","'.$mod.'","'.$immat.'","'.$date.'","'.$visite.'","'.$entretien.'","'.$obs.'")';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	}

?>
</html>