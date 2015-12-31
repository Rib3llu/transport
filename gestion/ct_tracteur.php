<?php
// inclusion
include "../header.php";
?>
	<div class="container">
     <div class="row">
<?php
// Si le formulaire est rempli
if (isset ($_POST['valider'])){
	//On récupère les valeurs entrées par l'utilisateur :
	$id_tracteur=$_POST['id_tracteur'];
	
	$marque=$_POST['marque'];
	$mod=$_POST['mod'];
	$immat=$_POST['immat'];
	$date=$_POST['date'];
	$ct=$_POST['ct'];
	$revision=$_POST['revision'];
	$obs=$_POST['obs'];
	$km=$_POST['km'];
	$etat=$_POST['etat'];

	$date = date("Y-m-d", strtotime($date));
	$visite = date("Y-m-d", strtotime($ct));
	$entretien = date("Y-m-d", strtotime($revision));
	
	$nature="controle";
	$datect=$_POST['datect'];
	$prix=$_POST['prix'];
	$defaut=$_POST['defaut'];

	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'UPDATE tracteur SET marque="'.$marque.'", km="'.$km.'", etat="'.$etat.'", modele="'.$mod.'", immatriculation="'.$immat.'", date="'.$date.'", visite="'.$ct.'" , entretien="'.$entretien.'" , observation="'.$obs.'" WHERE id_tracteur="'.$id_tracteur.'"';
	
	$sql2 = 'INSERT INTO accident VALUES("","'.$id_tracteur.'","","'.$defaut.'","'.$datect.'","'.$prix.'","","","'.$nature.'","'.$km.'")';

	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	mysql_query ($sql2) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la modif
	echo "<br><div class=\"alert alert-success\" role=\"alert\">
        <h3>Le controle technique à bien &eacutet&eacute enregistr&eacute...!</strong></h3>
      </div>";

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
		$select = 'SELECT * FROM tracteur WHERE id_tracteur = '. "$id_tracteur" .' '; 
	 
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
	$km=$row['km'];
	$etat=$row['etat'];

	echo "
	    <h1 align=\"center\">Passage d'un Tracteur</h1><br>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
        <form name=\"inscription\" method=\"post\" action=\"ct_tracteur.php\">
		<tr>
			<td>Marque :	</td>
			<td>$marque<input type=\"hidden\" name=\"marque\" value=\"$marque\"/></td>
		</tr>
		<tr>
			<td>Mod&egravele :	</td>
			<td>$modele<input type=\"hidden\" name=\"mod\" value=\"$modele\"/></td>
		</tr>
		<tr>
			<td>Immatriculation : </td>
			<td>$immatriculation<input type=\"hidden\" name=\"immat\" value=\"$immatriculation\"/></td>
		</tr>
			<input type=\"hidden\" id=\"datepicker\" name=\"date\" value=\"$date\"/></td>
		<tr>
			<td>Date passage Controle Technique :	</td>
			<td><input type=\"text\" id=\"datepicker\" name=\"datect\" value=\"$visite\"/></td>
		</tr>		
		<tr>
			<td>Defaut constaté : </td>
			<td><textarea name=\"defaut\" rows=\"3\" cols=\"30\">$defaut</textarea></td>
		</tr>
		<tr>
			<td>Kilométrage : </td>
			<td><input type=\"text\" name=\"km\" value=\"$km\">$km</td>
		</tr>

		<tr>
			<td><font color=\"red\">Date prochain Controle Technique :	</font></td>
			<td><input type=\"text\" id=\"datepicker\" name=\"ct\" /></td>
		</tr>
		<input type=\"hidden\" id=\"datepicker\" name=\"revision\" value=\"$revision\">
		<input type=\"hidden\" name=\"obs\" value=\"$observation\"/>
		<input type=\"hidden\" name=\"etat\" value=\"$etat\"/>
		<tr>
			<td>Tarif :	</font></td>
			<td><input type=\"text\" name=\"prix\"/></td>
		</tr>

		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
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
		<a href="ct.php"><button type="button" class="btn btn-default">Retour au Listing</button></a><br><br>
	    <a href="../admin.php"><button type="button" class="btn btn-default">Retour Admin</button></a>
	</div>
		</div>
			</div>
<?php 
include "../footer.php"; 
?>