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
  
   <head><title>Formulaire cr&eactureation d'un Produit </title></head>
    <body>
        <h1>Creation d'un Produit</h1>
<?php
// fonctions
include "fonctions_base.php";
// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['p_vente'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$id_produit=$_POST['id_produit'];
	$detail=$_POST['detail'];
	$descr=$_POST['descr'];
	$p_revient=$_POST['p_revient'];
	$p_vente=$_POST['p_vente'];
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'UPDATE produits SET detail="'.$detail.'", description="'.$descr.'", prix_revient="'.$p_revient.'", prix_vente="'.$p_vente.'" WHERE id_produit="'.$id_produit.'"';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la modification
	echo "<p><h2>Le produit à bien &eacutet&eacute modifi&eacute</h2></p>";

	}
	
	// sinon on affiche le formulaire
	else {
		//On se connecte
		connectBase();
		
		// On recupere ID 
		$id_produit = $_POST['id_produit'];
		
		// On recupere la ligne
		$select = 'SELECT id_produit,detail,description,prix_revient,prix_vente FROM produits WHERE id_produit = '. "$id_produit" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {
		
	$id_produit=$row['id_produit'];

	$detail=$row['detail'];
	$descr=$row['description'];
	$p_revient=$row['prix_revient'];
	$p_vente=$row['prix_vente'];

		echo "
        <h2>Entrez les données demandées :</h2>
        <form name=\"inscription\" method=\"post\" action=\"mod_produit.php\">
            D&eacutetail :	<input type=\"text\" name=\"detail\" value=\"$detail\"/><br><br/>
			Description :	<input type=\"text\" name=\"descr\" value=\"$descr\"/><br><br/>
			Prix de Revient : <input type=\"text\" name=\"p_revient\" value=\"$p_revient\"/><br><br>
            Prix de Vente :	<input type=\"text\" name=\"p_vente\" value=\"$p_vente\"/><br><br/>
			<input type=\"hidden\" name=\"id_produit\" value=\"$id_produit\">
			<br><input type=\"submit\" name=\"valider\" value=\"OK\"/><br/>
        </form>";
	}
	}

?>
	<h2><a href="aff_produits.php"><< Retour au Listing <<</a></h2>
    </body>
</html>