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
  
   <head><title>Formulaire modification d'un Client </title></head>
    <body>
        <h1>Modification d'un Client</h1>

<?php
// fonctions
include "fonctions_base.php";

// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['nom'])){
	//On récupère les valeurs entrées par l'utilisateur :
    $id_client=$_POST['id_client'];
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
	$observation=$_POST['observation'];
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'UPDATE client SET nom="'.$nom.'", adresse="'.$adresse.'", cp="'.$cp.'", ville="'.$ville.'", siret="'.$siret.'", tva="'.$tva.'", tel="'.$tel.'", fax="'.$fax.'", mail="'.$mail.'", observation="'.$observation.'", contact="'.$contact.'" WHERE id_client="'.$id_client.'"'; 
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
		
	// on valide la creation
	echo "<p><h2>Le client à bien &eacutet&eacute modifi&eacute</h2></p>";
}
	
	// sinon on affiche le formulaire avec les donnees pre-remplis
	else {
		
		//On se connecte
		connectBase();
		
		// On recupere ID 
		$id_client = $_POST['id_client'];
		
		// On recupere la ligne
		$select = 'SELECT id_client,nom,adresse,cp,ville,siret,tva,tel,fax,mail,contact,observation FROM client WHERE id_client = '. "$id_client" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {
		
		$nom = $row["nom"];
		$add = $row['adresse'];
		$cp = $row["cp"];
		$ville = $row["ville"];
		$siret = $row["siret"];
		$tva = $row["tva"];
		$tel = $row["tel"];
		$fax = $row["fax"];
		$mail = $row["mail"];
		$contact = $row["contact"];
		$obs = $row["observation"];
		$id_client = $row["id_client"];
		
		echo "<h2>Entrez les donn&eacutees demand&eacutees :</h2>
			<form name=\"inscription\" method=\"post\" action=\"mod_client.php\">
			       	Nom :	<input type=\"text\" name=\"nom\" value=\"$nom\"><br><br/>
					Adresse :	<input type=\"text\" name=\"adresse\" value=\"$add\"><br><br/>
					Code Postal :	<input type=\"text\" name=\"cp\" value=\"$cp\"><br><br/>
					Ville :	<input type=\"text\" name=\"ville\" value=\"$ville\"><br><br/>
					Siret :	<input type=\"text\" name=\"siret\" value=\"$siret\"><br><br/>
					N. TVA :	<input type=\"text\" name=\"tva\" value=\"$tva\"><br><br/>
					T&eacutel&eacutephone :	<input type=\"text\" name=\"tel\" value=\"$tel\"]><br><br/>
					Fax :	<input type=\"text\" name=\"fax\" value=\"$fax\"><br><br/>
					Mail :	<input type=\"text\" name=\"mail\" value=\"$mail\"><br><br/>
					Contact :	<input type=\"text\" name=\"contact\" value=\"$contact\"><br><br/>
					Observation :	<input type=\"text\" name=\"observation\" value=\"$obs\"><br><br/>
					<input type=\"hidden\" name=\"id_client\" value=\"$id_client\">
			<br><input type=\"submit\" name=\"valider\" value=\"OK\"><br/>
        </form>";
	}
	
	// on ferme la connexion
	mysql_close();
	}
?>
		<h2><a href="aff_clients.php">Retour au Listing</a></h2>
    </body>
</html>