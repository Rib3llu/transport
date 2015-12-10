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
  
   <head><title>Formulaire modification d'un Chauffeur </title></head>
    <body>
        <h1>Modification d'un Chauffeur</h1>

<?php
// fonctions
include "fonctions_base.php";

// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['nom'])){
	//On récupère les valeurs entrées par l'utilisateur :
    $id_chauffeur=$_POST['id_chauffeur'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$tel=$_POST['tel'];
	$permis=$_POST['permis'];
	$mail=$_POST['mail'];
	$date=$_POST['date'];
	$date_exp = date("Y-m-d", strtotime($date));
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'UPDATE chauffeur SET nom="'.$nom.'", prenom="'.$prenom.'", tel="'.$tel.'", mail="'.$mail.'", permis="'.$permis.'", expiration="'.$date_exp.'" WHERE id_chauffeur="'.$id_chauffeur.'"'; 
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
		
	// on valide la creation
	echo "<p><h2>Le chauffeur à bien &eacutet&eacute modifi&eacute</h2></p>";
}
	
	// sinon on affiche le formulaire avec les donnees pre-remplis
	else {
		
		//On se connecte
		connectBase();
		
		// On recupere ID 
		$id_chauffeur = $_POST['id_chauffeur'];
		
		// On recupere la ligne
		$select = 'SELECT id_chauffeur,nom,prenom,tel,mail,permis,expiration FROM chauffeur WHERE id_chauffeur = '. "$id_chauffeur" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {

		$id_chauffeur = $row["id_chauffeur"];
		$nom = $row["nom"];
		$prenom = $row["prenom"];
		$tel = $row["tel"];
		$mail = $row["mail"];
		$permis = $row["permis"];
		$expiration = $row["expiration"];
		
		echo "
        <h2>Entrez les données demandées :</h2>
        <form name=\"inscription\" method=\"post\" action=\"mod_chauffeur.php\">
            Nom :	<input type=\"text\" name=\"nom\" value=\"$nom\"]><br><br/>
			Prenom :	<input type=\"text\" name=\"prenom\" value=\"$prenom\"><br><br/>
			Tel : <input type=\"text\" name=\"tel\" value=\"$tel\"><br><br>
            Mail :	<input type=\"text\" name=\"mail\" value=\"$mail\"><br><br/>
			N°Permis :	<input type=\"text\" name=\"permis\" value=\"$permis\"><br><br/>
			Date d\'expiration :	<input type=\"text\" id=\"datepicker\" name=\"date\" value=\"$expiration\"><br><br/>
			<input type=\"hidden\" name=\"id_chauffeur\" value=\"$id_chauffeur\">
			<br><input type=\"submit\" name=\"valider\" value=\"OK\"><br/>
        </form>";
	}
	
	// on ferme la connexion
	mysql_close();
	}
?>
		<h2><a href="aff_chauffeurs.php">Retour au Listing</a></h2>
    </body>

</html>