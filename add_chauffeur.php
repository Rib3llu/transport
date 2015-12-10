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
  
   <head><title>Formulaire cr&eactureation d'un Chauffeur </title></head>
    <body>
        <h1>Creation d'un Chauffeur</h1>

<?php
// fonctions
include "fonctions_base.php";

// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['nom'])){
	//On récupère les valeurs entrées par l'utilisateur :
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
	$sql = 'INSERT INTO chauffeur VALUES("","'.$nom.'","'.$prenom.'","'.$tel.'","'.$mail.'","'.$permis.'","'.$date_exp.'")';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
		
	// on valide la creation
	echo "<p><h2>Le chauffeur à bien &eacutet&eacute cr&eacute&eacute</h2></p>";
}
	
	// sinon on affiche le formulaire
	else {
		echo "
        <h2>Entrez les données demandées :</h2>
        <form name=\"inscription\" method=\"post\" action=\"add_chauffeur.php\">
            Nom :	<input type=\"text\" name=\"nom\"/><br><br/>
			Prenom :	<input type=\"text\" name=\"prenom\"/><br><br/>
			Tel : <input type=\"text\" name=\"tel\"/><br><br>
            Mail :	<input type=\"text\" name=\"mail\"/><br><br/>
			N°Permis :	<input type=\"text\" name=\"permis\"/><br><br/>
			Date d'expiration :	<input type=\"text\" id=\"datepicker\" name=\"date\"><br><br/>
			<br><input type=\"submit\" name=\"valider\" value=\"OK\"/><br/>
        </form>";
	}
	
?>
		<h2><a href="index.php"><< Retour a l'accueil <<</a></h2>
    </body>

</html>