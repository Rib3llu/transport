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
	
	$id_remorque=$_POST['id_remorque'];
		
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'DELETE FROM remorque WHERE id_remorque="'.$id_remorque.'"';
	
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la modif
	
	echo "<br><div class=\"alert alert-success\" role=\"alert\">
        <h3>La remorque à bien &eacutet&eacute supprim&eacute...!</strong></h3>
      </div>";

	// Sinon on affiche le formulaire
}
else{

		//On se connecte
		connectBase();
		
		// On recupere ID
		if (isset ($_GET['id_remorque'])){
			$id_remorque = $_GET['id_remorque'];	
		}
		else{
		$id_remorque = $_POST['id_remorque'];
		}
		
		// On recupere la ligne
		$select = 'SELECT id_remorque,marque,modele,immatriculation,type,date,controle,revision,observation,defaut,longueur,largeur,hauteur FROM remorque WHERE id_remorque = '. "$id_remorque" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {
	
	$id_remorque=$row['id_remorque'];
	
	$marque=$row['marque'];
	$modele=$row['modele'];
	$immat=$row['immatriculation'];
	$type=$row['type'];
	$date=$row['date'];
	$ct=$row['controle'];
	$revision=$row['revision'];
	$obs=$row['observation'];
	$longueur=$row['longueur'];
	$largeur=$row['largeur'];
	$hauteur=$row['hauteur'];

	echo "
		<h2 align=\"center\">/!\ Attention /!\</h2><br>
		<h4 align=\"center\">Etes-vous sur de vouloir supprimer l'enregistrement suivant ?</h4><br>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
        <form name=\"inscription\" method=\"post\" action=\"supp_remorque.php\">
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
			<td>$immat</td>
		</tr>
		<tr>
			<td>Type : </td>
			<td>$type</td>
		</tr>
		<tr>
			<td>Date construction :	</td>
			<td>$date</td>
		</tr>
		<tr>
			<td>Date prochain Controle Technique :	</td>
			<td>$ct</td>
		</tr>
		<tr>
			<td>Date prochaine r&eacutevision :	</td>
			<td>$revision</td>
		</tr>
		<tr>
			<td>Observation : </td>
			<td>$obs</td>
		</tr>
		<tr>
			<td>Defaut : </td>
			<td>$defaut</td>
		</tr>
		<tr>
			<td>Longueur :	</td>
			<td>$longueur</td>
		</tr>
		<tr>
			<td>Largeur :	</td>
			<td>$largeur</td>
		</tr>
		<tr>
			<td>Hauteur :	</td>
			<td>$hauteur</td>
		</tr>
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-danger\" type=\"submit\" name=\"supprimer\" value=\"Supprimer\"/></td>
		</tr>
			<input type=\"hidden\" name=\"id_remorque\" value=\"$id_remorque\">
			</form>
		</table>";
	}
	// on ferme la connexion
	mysql_close();
	}
?>
	<div class="page-header">
		<a href="aff_remorques.php"><button type="button" class="btn btn-default">Retour au Listing</button></a><br><br>
	    <a href="../admin.php"><button type="button" class="btn btn-default">Retour Admin</button></a>
	</div>
		</div>
			</div>
<?php 
include "../footer.php"; 
?>