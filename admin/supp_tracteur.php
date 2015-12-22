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
if (isset ($_POST['supprimer'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$id_tracteur=$_POST['id_tracteur'];
		
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'DELETE FROM tracteur WHERE id_tracteur="'.$id_tracteur.'"';
	
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la modif
	echo "<p><h2>Le Tracteur à bien &eacutet&eacute supprim&eacute</h2></p>";

	// Sinon on affiche le formulaire
}
else{

		//On se connecte
		connectBase();
		
		// On recupere ID 
		if (isset ($_GET['id_tracteur'])){
			$id_tracteur = $_GET['id_tracteur'];	
		}
		else{
		$id_tracteur = $_POST['id_tracteur'];
		}
		
		// On recupere la ligne
		$select = 'SELECT id_tracteur,marque,modele,immatriculation,date,visite,entretien,observation,defaut FROM tracteur WHERE id_tracteur = '. "$id_tracteur" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {
		
	$id_tracteur=$row['id_tracteur'];
	
	$marque=$row['marque'];
	$modele=$row['modele'];
	$immatriculation=$row['immatriculation'];
	$date=$row['date'];
	$visite=$row['visite'];
	$revision=$row['entretien'];
	$observation=$row['observation'];
	$defaut=$row['defaut'];

	echo "
		<h2 align=\"center\">/!\ Attention /!\</h2><br>
		<h4 align=\"center\">Etes-vous sur de vouloir supprimer l'enregistrement suivant ?</h4><br>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
        <form name=\"inscription\" method=\"post\" action=\"supp_tracteur.php\">
		<tr>
			<td>Marque :	</td>
			<td>$marque</td>
		</tr>
		<tr>
			<td>Mod&egravele :	</td>
			<td>$modele</td>
		</tr>
		<tr>
			<td>Immatriculation : </td>
			<td>$immatriculation</td>
		</tr>
		<tr>
			<td>Date construction :	</td>
			<td>$date</td>
		</tr>
		<tr>
			<td>Date prochain Controle Technique :	</td>
			<td>$visite</td>
		</tr>
		<tr>
			<td>Date prochaine r&eacutevision :	</td>
			<td>$revision</td>
		</tr>
		<tr>
			<td>Observation : </td>
			<td>$observation</td>
		</tr>
		<tr>
			<td>Defaut : </td>
			<td>$defaut</td>
		</tr>
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-danger\" type=\"submit\" name=\"supprimer\" value=\"Supprimer\"/></td>
		</tr>
			<input type=\"hidden\" name=\"id_tracteur\" value=\"$id_tracteur\">
			</form>
		</table>";
	}
	// on ferme la connexion
	mysql_close();
	}
?>
	<div class="page-header">
		<a href="aff_tracteurs.php"><button type="button" class="btn btn-default">Retour au Listing</button></a><br><br>
	    <a href="../admin.php"><button type="button" class="btn btn-default">Retour Admin</button></a>
	</div>
		</div>
			</div>
<?php 
include "../footer.php"; 
?>