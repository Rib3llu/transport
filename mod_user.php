<html>
<meta charset="utf-8">

    <head><title>Formulaire modificatoin d'un Utilisateur </title></head>
    <body>
        <h1>Modification d'un compte Utilisateur</h1>

<?php
// fonction
include "fonctions_base.php";

// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['mail'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$id_user=$_POST['id_user'];
	$mail=$_POST['mail'];
	$password=$_POST['password'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$droit=$_POST['droit']; 
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'UPDATE utilisateur SET mail="'.$mail.'", password="'.$password.'", nom="'.$nom.'", prenom="'.$prenom.'", droit="'.$droit.'" WHERE id_user="'.$id_user.'"';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la modif
	echo "<p><h2>L'utilisateur à bien &eacutet&eacute modifi&eacute</h2></p>";

	// Sinon on affiche le formulaire
}
else{
		//On se connecte
		connectBase();
		
		// On recupere ID 
		$id_user = $_POST['id_user'];
		
		// On recupere la ligne
		$select = 'SELECT id_user,mail,password,nom,prenom,droit FROM utilisateur WHERE id_user = '. "$id_user" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {
		
	$id_user=$row["id_user"];
	$mail=$row['mail'];
	$password=$row['password'];
	$nom=$row['nom'];
	$prenom=$row['prenom'];
	$droit=$row['droit']; 


		echo "<h2>Entrez les données demandées :</h2>
        <form name=\"inscription\" method=\"post\" action=\"mod_user.php\">
            Entrez le mail utilisateur : <input type=\"text\" name=\"mail\" value=\"$mail\"/><br><br>
            Mot de passe :	<input type=\"text\" name=\"password\" value=\"$password\"/><br><br/>
			Nom :	<input type=\"text\" name=\"nom\" value=\"$nom\"/><br><br/>
			Prenom :	<input type=\"text\" name=\"prenom\" value=\"$prenom\"/><br><br/>
			Role :	<select name=\"droit\">
				<option value=\"1\">Chauffeur</option>
				<option value=\"2\">Administration</option></select> <br>
			<input type=\"hidden\" name=\"id_user\" value=\"$id_user\">
			<br><input type=\"submit\" name=\"valider\" value=\"OK\"/><br/>
        </form>";
	}
}

?>
		<h2><a href="aff_user.php"><< Retour au Listing <<</a></h2>
    </body>

</html>