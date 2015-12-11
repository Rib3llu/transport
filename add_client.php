<html>
    <head><title>Formulaire cr&eactureation d'un Client </title></head>
    <body>
        <h1>Creation d'un compte Client</h1>

<?php
// fichier de fonctions_base
include "fonctions_base.php";

// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['nom'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$nom=$_POST['nom'];
	$adresse=$_POST['adresse'];
	$cp=$_POST['cp'];
	$ville=$_POST['ville'];
	$siret=$_POST['siret']; 
	$tva=$_POST['tva'];
	$tel=$_POST['tel'];
	$fax=$_POST['fax'];
	$mail=$_POST['mail'];
	$contact=$_POST['contact'];
	$obs=$_POST['obs'];
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'INSERT INTO client VALUES("","'.$nom.'","'.$adresse.'","'.$cp.'","'.$ville.'","'.$siret.'","'.$tva.'","'.$tel.'","'.$fax.'","'.$mail.'","'.$contact.'","'.$obs.'")';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la creation
	echo "<p><h2>Le client à bien &eacutet&eacute cr&eacute&eacute</h2></p>";
}
	
	// sinon on affiche le formulaire
	else {
		echo "
		    <h2>Entrez les donn&eacutees demand&eacutees :</h2>
			<form name=\"inscription\" method=\"post\" action=\"add_client.php\">
           	Nom :	<input type=\"text\" name=\"nom\"/><br><br/>
			Adresse :	<input type=\"text\" name=\"adresse\"/><br><br/>
			Code Postal :	<input type=\"text\" name=\"cp\"/><br><br/>
			Ville :	<input type=\"text\" name=\"ville\"/><br><br/>
			Siret :	<input type=\"text\" name=\"siret\"/><br><br/>
			NÂ°TVA :	<input type=\"text\" name=\"tva\"/><br><br/>
			T&eactuel&eacutephone :	<input type=\"text\" name=\"tel\"/><br><br/>
			Fax :	<input type=\"text\" name=\"fax\"/><br><br/>
			Mail :	<input type=\"text\" name=\"mail\"/><br><br/>
			Contact :	<input type=\"text\" name=\"contact\"/><br><br/>
			Observation :	<input type=\"text\" name=\"obs\"/><br><br/>
			<br><input type=\"submit\" name=\"valider\" value=\"OK\"/><br/>
        </form>";
		}
	
?>
		<h2><a href="aff_clients.php"><< Retour Listing <<</a></h2>
		<h2><a href="index.php"><< Retour a l'accueil <<</a></h2>
    </body>
</html>
