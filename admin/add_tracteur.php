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
if (isset ($_POST['valider']) && !empty($_POST['immat'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$marque=$_POST['marque'];
	$mod=$_POST['mod'];
	$immat=$_POST['immat'];
	$date=$_POST['date'];
	$ct=$_POST['ct'];
	$revision=$_POST['revision'];
	$defaut=$_POST['defaut'];
	$obs=$_POST['obs'];
	$km=$_POST['km'];
	$etat=$_POST['etat'];

	// Conversion des dates
	$date = date("Y-m-d", strtotime($date));
	$visite = date("Y-m-d", strtotime($ct));
	$entretien = date("Y-m-d", strtotime($revision));
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'INSERT INTO tracteur VALUES("","'.$marque.'","'.$mod.'","'.$immat.'","'.$date.'","'.$visite.'","'.$entretien.'","'.$obs.'","'.$defaut.'","'.$km.'","'.$etat.'")';
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la creation
	$msg = aff_creer("Le Tracteur");
	echo $msg;
}
	
	// Sinon on affiche le formulaire
	else{

	echo "
			<br><h1 align=\"center\">Ajout d'un Tracteur</h1>
		<div class=\"col-md-3\"></div>
		<div class=\"col-md-6\" align=\"center\"><table class=\"table table-striped\">
		<h2>Entrez les données demandées :</h2><br>
		<form name=\"inscription\" method=\"post\" action=\"add_tracteur.php\">
		<tr>
			<td>Marque :	</td>
			<td><input type=\"text\" name=\"marque\"/></td>
		</tr>
		<tr>
			<td>Mod&egravele :	</td>
			<td><input type=\"text\" name=\"mod\"/></td>
		</tr>
		<tr>
			<td>Immatriculation : </td>
			<td><input type=\"text\" name=\"immat\"/></td>
		</tr>
		<tr>
			<td>Date construction :	</td>
			<td><input type=\"date\" name=\"date\"/></td>
		</tr>
		<tr>
			<td>Date prochain Controle Technique :	</td>
			<td><input type=\"date\" name=\"ct\"/></td>
		</tr>
		<tr>
			<td>Date prochaine r&eacutevision :	</td>
			<td><input type=\"date\" name=\"revision\"></td>
		</tr>
		<tr>
			<td>Observation : </td>
			<td><textarea name=\"obs\" rows=\"4\" cols=\"30\"></textarea></td>
		</tr>
		<tr>
			<td>Defaut : </td>
			<td><textarea name=\"defaut\" rows=\"5\" cols=\"30\"></textarea></td>
		</tr>	
		<tr>
			<td>Kilométrage : </td>
			<td><input type=\"text\" name=\"km\"/></td>
		</tr>		
		<tr>
			<td>Etat :	</td>
			<td>
				<select name=\"etat\">
				<option value=\"0\">Libre</option>
				<option value=\"1\">Utilisée</option>
				<option value=\"2\">En panne</option>
				</select>
			</td>
		</tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
		
        </form>
		</table>
		";
	}

	// on ferme la page
	$ppage = piedpage_formulaire("tracteurs");
	echo $ppage;

	include "../footer.php"; 
?>