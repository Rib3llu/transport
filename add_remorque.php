<?php
// inclusion
include "fonctions_base.php";
include "fonctions_annexe.php";
include "header.php";
?>
	<div class="container">
     <div class="row">
<?php
// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['immat'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$marque=$_POST['marque'];
	$modele=$_POST['modele'];
	$immat=$_POST['immat'];
	$type=$_POST['type'];
	$date=$_POST['date'];
	$ct=$_POST['ct'];
	$revision=$_POST['revision'];
	$obs=$_POST['obs'];
	$longueur=$_POST['longueur'];
	$largeur=$_POST['largeur'];
	$hauteur=$_POST['hauteur'];

	$date = date("Y-m-d", strtotime($date));
	$visite = date("Y-m-d", strtotime($ct));
	$entretien = date("Y-m-d", strtotime($revision));
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'INSERT INTO remorque VALUES("","'.$marque.'","'.$modele.'","'.$immat.'","'.$type.'","'.$date.'","'.$visite.'","'.$entretien.'","'.$obs.'","'.$longueur.'","'.$largeur.'","'.$hauteur.'")';
	
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la creation
	echo "<p><h2>La remorque à bien &eacutet&eacute cr&eacute&eacute</h2></p>";
}

// Sinon on affiche le formulaire
else {
	echo "				
		<br><h1 align=\"center\">Ajout d'une Remorque</h1>
		<div class=\"col-md-3\"></div>
		<div class=\"col-md-6\" align=\"center\"><table class=\"table table-striped\">
		<br><h2>Entrez les données demandées :</h2><br>	
		<form name=\"inscription\" method=\"post\" action=\"add_remorque.php\">
		<tr>
			<td></td>
			<td></td>
		</tr><tr>
			<td></td>
			<td></td>
		</tr><tr>
			<td></td>
			<td></td>
		</tr><tr>
			<td></td>
			<td></td>
		</tr><tr>
			<td></td>
			<td></td>
		</tr><tr>
			<td></td>
			<td></td>
		</tr><tr>
			<td></td>
			<td></td>
		</tr><tr>
			<td></td>
			<td></td>
		</tr><tr>
			<td></td>
			<td></td>
		</tr><tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Hauteur :	</td>
			<td><input type=\"text\" name=\"hauteur\"/></td>
		</tr>

            Marque :	<input type=\"text\" name=\"marque\"/><br><br/>
			Mod&egravele :	<input type=\"text\" name=\"mod\"/><br><br/>
			Immatriculation : <input type=\"text\" name=\"immat\"/><br><br>
			Type : <input type=\"text\" name=\"type\"/><br><br>
            Date construction :	<input type=\"text\" id=\"datepicker\" name=\"date\"/><br><br/>
			Date prochain Controle Technique :	<input type=\"text\" id=\"datepicker\" name=\"ct\"/><br><br/>
			Date prochaine r&eacutevision :	<input type=\"text\" id=\"datepicker\" name=\"revision\"><br><br/>
			Observation : <input type=\"text\" name=\"obs\"/><br><br>
			Longueur :	<input type=\"text\" name=\"longueur\"/><br><br/>
			Largeur :	<input type=\"text\" name=\"largeur\"/><br><br/>
			<br><br/>
			<br><input type=\"submit\" name=\"valider\" value=\"OK\"/><br/>
        </form>
	";
}

?>
	<div class="page-header">
		<a href="aff_remorques.php"><button type="button" class="btn btn-default">Retour au Listing</button></a><br><br>
	    <a href="admin.php"><button type="button" class="btn btn-default">Retour Admin</button></a>
	</div>
		</div>
			</div>
<?php 
include "footer.php"; 
?>