<html>
<meta charset="utf-8">
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
  
   <head><title>Formulaire modification d'un Tracteur </title></head>
    <body>
        <h1>Modification d'un Tracteur</h1>

<?php
// fichier fonction
include "fonctions_base.php";

// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['immat'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$id_tracteur=$_POST['id_tracteur'];
	
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
	$sql = 'UPDATE tracteur SET marque="'.$marque.'", modele="'.$mod.'", immatriculation="'.$immat.'", date="'.$date.'", visite="'.$visite.'" , entretien="'.$entretien.'" , observation="'.$obs.'" WHERE id_tracteur="'.$id_tracteur.'"';
	
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la modif
	echo "<p><h2>Le Tracteur à bien &eacutet&eacute modifi&eacute</h2></p>";

	// Sinon on affiche le formulaire
}
else{

		//On se connecte
		connectBase();
		
		// On recupere ID 
		$id_tracteur = $_POST['id_tracteur'];
		
		// On recupere la ligne
		$select = 'SELECT id_tracteur,marque,modele,immatriculation,date,visite,entretien,observation FROM tracteur WHERE id_tracteur = '. "$id_tracteur" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {
		
	$id_tracteur=$row['id_tracteur'];
	
	$marque=$row['marque'];
	$modele=$row['modele'];
	$immatriculation=$row['immatriculation'];
	$date=$row['date'];
	$visite=$row['visite'];
	$revision=$row['entretien'];
	$observation=$row['observation'];

	echo "
	        <h2>Entrez les données demandées :</h2>
        <form name=\"inscription\" method=\"post\" action=\"mod_tracteur.php\">
            Marque :	<input type=\"text\" name=\"marque\" value=\"$marque\"/><br><br/>
			Mod&egravele :	<input type=\"text\" name=\"mod\" value=\"$modele\"/><br><br/>
			Immatriculation : <input type=\"text\" name=\"immat\" value=\"$immatriculation\"/><br><br>
            Date construction :	<input type=\"text\" id=\"datepicker\" name=\"date\" value=\"$date\"/><br><br/>
			Date prochain Controle Technique :	<input type=\"text\" id=\"datepicker\" name=\"ct\" value=\"$visite\"/><br><br/>
			Date prochaine r&eacutevision :	<input type=\"text\" id=\"datepicker\" name=\"revision\" value=\"$revision\"><br><br/>
			Observation : <input type=\"text\" name=\"obs\" value=\"$observation\"/><br><br>
			<input type=\"hidden\" name=\"id_tracteur\" value=\"$id_tracteur\">
			<br><input type=\"submit\" name=\"valider\" value=\"OK\"/><br/>
        </form>";
		
	}
}
?>
	<h2><a href="aff_tracteurs.php"><< Retour au Listing <<</a></h2>
    </body>
</html>