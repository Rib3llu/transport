<?php
// inclusion
include "../fonctions_base.php";
include "../fonctions_annexe.php";
include "../fonctions_affichage.php";
include "../header.php";
?>
	<div class="container">
     <div class="row">
<?php
// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['p_vente'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$detail=$_POST['detail'];
	$descr=$_POST['descr'];
	$p_revient=$_POST['p_revient'];
	$p_vente=$_POST['p_vente'];
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'INSERT INTO produits VALUES("","'.$detail.'","'.$descr.'","'.$p_revient.'","'.$p_vente.'")';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la creation
	$msg = aff_creer("Le Produit");
	echo $msg;
}
	// sinon on affiche le formulaire
	else {
		echo "
		<h1 align=\"center\">Ajout d'un Produit</h1>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
			<h2>Entrez les données demandées :</h2>
		  <form name=\"inscription\" method=\"post\" action=\"add_produit.php\">
		<tr>
			<td>D&eacutetail :	</td>
			<td><input type=\"text\" name=\"detail\"/></td>
		</tr>
        <tr>
			<td>Description :	</td>
			<td><input type=\"text\" name=\"descr\"/></td>
		</tr>
        <tr>
			<td>Prix de Revient : </td>
			<td><input type=\"text\" name=\"p_revient\"/></td>
		</tr>
        <tr>
			<td>Prix de Vente :	</td>
			<td><input type=\"text\" name=\"p_vente\"/></td>
		</tr>
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
		</tr>
        </form>
		</table>";
	}
	
	// on ferme la page
	$ppage = piedpage_formulaire("produits");
	echo $ppage;

	include "../footer.php"; 
?>