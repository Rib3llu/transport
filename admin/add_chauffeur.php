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
if (isset ($_POST['valider']) && !empty($_POST['nom'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$tel=$_POST['tel'];
	$permis=$_POST['permis'];
	$fimo=$_POST['fimo'];
	$matiere=$_POST['matiere'];
	$ppetrolier=$_POST['ppetrolier'];
	$mail=$_POST['mail'];
	$date=$_POST['date'];
	$date_exp = date("Y-m-d", strtotime($date));
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'INSERT INTO chauffeur VALUES("","'.$nom.'","'.$prenom.'","'.$tel.'","'.$mail.'","'.$permis.'","'.$date_exp.'","","'.$fimo.'","'.$matiere.'","'.$ppetrolier.'")';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
		
	// on valide la creation
	$msg = aff_creer("Le Chauffeur");
	echo $msg;
}
	
	// sinon on affiche le formulaire
	else {
		echo "
		<h1 align=\"center\">Ajout d'un Chauffeur</h1>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
			<h2>Entrez les donn&eacutees demand&eacutees :</h2>
        <form name=\"inscription\" method=\"post\" action=\"add_chauffeur.php\">
		<tr>
			<td>Nom :	</td>
			<td><input type=\"text\" name=\"nom\"/></td>
		</tr>
		<tr>
			<td>Prenom :	</td>
			<td><input type=\"text\" name=\"prenom\"/></td>
		</tr>
		<tr>
			<td>Tel : </td>
			<td><input type=\"tel\" name=\"tel\"/></td>
		</tr>
		<tr>
			<td>Mail :	</td>
			<td><input type=\"text\" name=\"mail\"/></td>
		</tr>
		<tr>
			<td>N°Permis :	</td>
			<td><input type=\"text\" name=\"permis\"/></td>
		</tr>
		<tr>
			<td>Date d'expiration :	</td>
			<td><input type=\"date\" name=\"date\"></td>
		</tr>
		<tr>
			<td>Date Fimo :	</td>
			<td><input type=\"date\" name=\"fimo\"></td>
		</tr>
		<tr>
			<td>Date Matière dangeureuse :	</td>
			<td><input type=\"date\" name=\"matiere\"></td>
		</tr>
		<tr>
			<td>Date Produits pétroliers :	</td>
			<td><input type=\"date\" name=\"ppetrolier\"></td>
		</tr>
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
		</tr>
        </form>
		</table>";
	}
	
	// on ferme la page
	$ppage = piedpage_formulaire("chauffeurs");
	echo $ppage;

	include "../footer.php"; 
?>