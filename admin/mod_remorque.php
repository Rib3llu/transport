<?php
// inclusion
include "../header.php";
?>
	<div class="container">
     <div class="row">
<?php
// Si le formulaire est rempli
if (isset ($_POST['valider']) && !empty($_POST['immat'])){
	//On récupère les valeurs entrées par l'utilisateur :
	
	$id_remorque=$_POST['id_remorque'];
	
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
	$defaut=$_POST['defaut'];
	$etat=$_POST['etat'];

	$date = date("Y-m-d", strtotime($date));
	$visite = date("Y-m-d", strtotime($ct));
	$entretien = date("Y-m-d", strtotime($revision));
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'UPDATE remorque SET marque="'.$marque.'", modele="'.$modele.'", immatriculation="'.$immat.'", type="'.$type.'", date="'.$date.'" , revision="'.$entretien.'", controle="'.$visite.'" , longueur="'.$longueur.'" , largeur="'.$largeur.'" , hauteur="'.$hauteur.'"  , observation="'.$obs.'", defaut="'.$defaut.'", etat="'.$etat.'" WHERE id_remorque="'.$id_remorque.'"';
	
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la modif
	$msg = aff_modifier("La Remorque");
	echo $msg;

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
		$select = 'SELECT * FROM remorque WHERE id_remorque = '. "$id_remorque" .' '; 
	 
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
	$defaut=$row['defaut'];
	$etat=$row['etat'];

	echo "
        <h1 align=\"center\">Modification d'une Remorque</h1><br>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
        <form name=\"inscription\" method=\"post\" action=\"mod_remorque.php\">
		<tr>
			<td>Marque :	</td>
			<td><input type=\"text\" name=\"marque\" value=\"$marque\"/></td>
		</tr>
		<tr>
			<td>Mod&egravele :	</td>
			<td><input type=\"text\" name=\"modele\" value=\"$modele\"/></td>
		</tr>
		<tr>
			<td>Immatriculation : </td>
			<td><input type=\"text\" name=\"immat\" value=\"$immat\"/></td>
		</tr>
		<tr>
			<td>Type : </td>
			<td><input type=\"text\" name=\"type\" value=\"$type\"/></td>
		</tr>
		<tr>
			<td>Date construction :	</td>
			<td><input type=\"date\" name=\"date\" value=\"$date\"/></td>
		</tr>
		<tr>
			<td>Date prochain Controle Technique :	</td>
			<td><input type=\"date\" name=\"ct\" value=\"$ct\"/></td>
		</tr>
		<tr>
			<td>Date prochaine r&eacutevision :	</td>
			<td><input type=\"date\" name=\"revision\" value=\"$revision\"></td>
		</tr>
		<tr>
			<td>Observation : </td>
			<td><textarea name=\"obs\" rows=\"3\" cols=\"30\">$obs</textarea></td>
		</tr>
		<tr>
			<td>Defaut : </td>
			<td><textarea name=\"defaut\" rows=\"3\" cols=\"30\">$defaut</textarea></td>
		</tr>
		<tr>
			<td>Longueur :	</td>
			<td><input type=\"text\" name=\"longueur\" value=\"$longueur\"/></td>
		</tr>
		<tr>
			<td>Largeur :	</td>
			<td><input type=\"text\" name=\"largeur\" value=\"$largeur\"/></td>
		</tr>
		<tr>
			<td>Hauteur :	</td>
			<td><input type=\"text\" name=\"hauteur\" value=\"$hauteur\"/></td>
		</tr>
		<tr>
			<td>Etat :	</td>
			<td>
				<select name=\"etat\">";
			if ($etat=='0'){
				echo "
				<option value=\"0\">Libre</option>
				<option value=\"1\">Utilisée</option>
				<option value=\"2\">En panne</option>
			";}
			if ($etat=='1'){
				echo "
				<option value=\"1\">Utilisée</option>
				<option value=\"2\">En panne</option>
				<option value=\"0\">Libre</option>
			";}
			if ($etat=='2'){
				echo "
				<option value=\"2\">En panne</option>
				<option value=\"1\">Utilisée</option>
				<option value=\"0\">Libre</option>
				";}
		echo "				
				</select>
			</td>		
		</tr>
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
		</tr>
			<input type=\"hidden\" name=\"id_remorque\" value=\"$id_remorque\">
			</form>
		</table>";
	}
	// on ferme la connexion
	mysql_close();
	}

	// on ferme la page
	$ppage = piedpage_formulaire("remorques");
	echo $ppage;

	include "../footer.php"; 
?>