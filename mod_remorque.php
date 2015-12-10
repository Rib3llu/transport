<html>
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
  
   <head><title>Formulaire modification d'une Remorque </title></head>
    <body>
        <h1>Modification d'une Remorque</h1>
<?php

// fichier fonction 
include "fonctions_base.php";

// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['immat'])){
	//On récupère les valeurs entrées par l'utilisateur :
	
	$id_remorque=$_POST['id_remorque'];
	
	$marque=$_POST['marque'];
	$modele=$_POST['modele'];
	$immat=$_POST['immat'];
	$type=$_POST['type'];
	$date=$_POST['date'];
	$ct=$_POST['ct'];
	$revision=$_POST['revision'];
	$obs=$_POST['obs'];
	$longueur=$_POST['longueur'];
	$largeur=$_POST['largeur'];
	$hauteur=$_POST['hauteur'];

	$date = date("Y-m-d", strtotime($date));
	$visite = date("Y-m-d", strtotime($ct));
	$entretien = date("Y-m-d", strtotime($revision));
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'UPDATE remorque SET marque="'.$marque.'", modele="'.$modele.'", immatriculation="'.$immat.'", type="'.$type.'", date="'.$date.'" , revision="'.$entretien.'", controle="'.$visite.'" , longueur="'.$longueur.'" , largeur="'.$largeur.'" , hauteur="'.$hauteur.'"  , observation="'.$obs.'" WHERE id_remorque="'.$id_remorque.'"';
	
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la modif
	echo "<p><h2>La remorque à bien &eacutet&eacute modifi&eacute</h2></p>";

	// Sinon on affiche le formulaire
}
else{

		//On se connecte
		connectBase();
		
		// On recupere ID 
		$id_remorque = $_POST['id_remorque'];
		
		// On recupere la ligne
		$select = 'SELECT id_remorque,marque,modele,immatriculation,type,date,controle,revision,observation,longueur,largeur,hauteur FROM remorque WHERE id_remorque = '. "$id_remorque" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {
	
	$id_remorque=$row['id_remorque'];
	
	$marque=$row['marque'];
	$modele=$row['modele'];
	$immat=$row['immatriculation'];
	$type=$row['type'];
	$date=$row['date'];
	$ct=$row['controle'];
	$revision=$row['revision'];
	$obs=$row['observation'];
	$longueur=$row['longueur'];
	$largeur=$row['largeur'];
	$hauteur=$row['hauteur'];

	echo "
	
	<h2>Entrez les données demandées :</h2>
        <form name=\"inscription\" method=\"post\" action=\"mod_remorque.php\">
            Marque :	<input type=\"text\" name=\"marque\" value=\"$marque\"/><br><br/>
			Mod&egravele :	<input type=\"text\" name=\"modele\" value=\"$modele\"/><br><br/>
			Immatriculation : <input type=\"text\" name=\"immat\" value=\"$immat\"/><br><br>
			Type : <input type=\"text\" name=\"type\" value=\"$type\"/><br><br>
            Date construction :	<input type=\"text\" id=\"datepicker\" name=\"date\" value=\"$date\"/><br><br/>
			Date prochain Controle Technique :	<input type=\"text\" id=\"datepicker\" name=\"ct\" value=\"$ct\"/><br><br/>
			Date prochaine r&eacutevision :	<input type=\"text\" id=\"datepicker\" name=\"revision\" value=\"$revision\"><br><br/>
			Observation : <input type=\"text\" name=\"obs\" value=\"$obs\"/><br><br>
			Longueur :	<input type=\"text\" name=\"longueur\" value=\"$longueur\"/><br><br/>
			Largeur :	<input type=\"text\" name=\"largeur\" value=\"$largeur\"/><br><br/>
			Hauteur :	<input type=\"text\" name=\"hauteur\" value=\"$hauteur\"/><br><br/>
			<input type=\"hidden\" name=\"id_remorque\" value=\"$id_remorque\">
			<br><input type=\"submit\" name=\"valider\" value=\"OK\"/><br/>
        </form>";
	}
}

?>
				<h2><a href="aff_remorques.php"><< Retour au listing <<</a></h2>

</body>
</html>