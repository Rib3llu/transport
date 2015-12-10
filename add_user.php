<html>
    <head><title>Formulaire cr&eactureation d'un Utilisateur </title></head>
    <body>
        <h1>Creation d'un compte Utilisateur</h1>

<?php
// fonction
include "fonctions_base.php";

// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['mail'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$mail=$_POST['mail'];
	$password=$_POST['password'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$droit=$_POST['droit']; 
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'INSERT INTO utilisateur VALUES("","'.$mail.'","'.$password.'","'.$nom.'","'.$prenom.'","'.$droit.'","")';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// Sinon on affiche le formulaire
}
else{
		echo "<h2>Entrez les données demandées :</h2>
        <form name=\"inscription\" method=\"post\" action=\"add_user.php\">
            Entrez le mail utilisateur : <input type=\"text\" name=\"mail\"/><br><br>
            Mot de passe :	<input type=\"text\" name=\"password\"/><br><br/>
			Nom :	<input type=\"text\" name=\"nom\"/><br><br/>
			Prenom :	<input type=\"text\" name=\"prenom\"/><br><br/>
			Role :	<select name=\"droit\">
				<option value=\"1\">Chauffeur</option>
				<option value=\"2\">Administration</option></select> <br>
			<br><input type=\"submit\" name=\"valider\" value=\"OK\"/><br/>
        </form>";
	}
	

?>
		<h2><a href="index.php"><< Accueil <<</a></h2>
    </body>

</html>