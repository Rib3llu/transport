<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../header.php";
?>
	<div class="container">
     <div class="row">
<?php
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
        <h1 align=\"center\">Modification d'un Produit</h1><br>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
			<form name=\"inscription\" method=\"post\" action=\"mod_produit.php\">
		<tr>
			<td>D&eacutetail :	</td>
			<td><input type=\"text\" name=\"detail\" value=\"$detail\"/></td>
		</tr>
		<tr>
			<td>Description :	</td>
			<td><input type=\"text\" name=\"descr\" value=\"$descr\"/></td>
		</tr>
		<tr>
			<td>Prix de Revient : </td>
			<td><input type=\"text\" name=\"p_revient\" value=\"$p_revient\"/></td>
		</tr>
		<tr>
			<td>Prix de Vente :	</td>
			<td><input type=\"text\" name=\"p_vente\" value=\"$p_vente\"/></td>
		</tr>
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
		</tr>
		<input type=\"hidden\" name=\"id_produit\" value=\"$id_produit\">
			</form>
		</table>";
	}
	// on ferme la connexion
	mysql_close();
	}
?>
	<div class="page-header">
		<a href="aff_produits.php"><button type="button" class="btn btn-default">Retour au Listing</button></a><br><br>
	    <a href="../admin.php"><button type="button" class="btn btn-default">Retour Admin</button></a>
	</div>
		</div>
			</div>
<?php 
include "../footer.php"; 
?>