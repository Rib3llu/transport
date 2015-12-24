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

	$nature="revision";
	$datect=$_POST['datect'];
	$prix=$_POST['prix'];
	$defaut=$_POST['defaut'];
	$listrevision=$_POST['listrevision'];

	$date = date("Y-m-d", strtotime($date));
	$visite = date("Y-m-d", strtotime($ct));
	$entretien = date("Y-m-d", strtotime($revision));
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion pour le CT
	$sql = 'UPDATE tracteur SET marque="'.$marque.'", modele="'.$mod.'", immatriculation="'.$immat.'", date="'.$date.'", visite="'.$ct.'" , entretien="'.$entretien.'" , observation="'.$obs.'" WHERE id_tracteur="'.$id_tracteur.'"';
	//On prepare la requete pour le cout de la revision
	$sql2 = 'INSERT INTO accident VALUES("","'.$id_tracteur.'","","'.$listrevision.'","'.$datect.'","'.$prix.'","","","'.$nature.'")';

	
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	mysql_query ($sql2) or die ('Erreur SQL !'.$sql2.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
	
	// on valide la modif
	
	echo "<br><div class=\"alert alert-success\" role=\"alert\">
        <h3>La r&eacutevision à bien &eacutet&eacute enregistr&eacute...!</strong></h3>
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
		$select = 'SELECT id_remorque,marque,modele,immatriculation,type,date,controle,revision,observation,longueur,largeur,hauteur,defaut FROM remorque WHERE id_remorque = '. "$id_remorque" .' '; 
	 
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

	echo "
        <h1 align=\"center\">R&eacutevision d'un Tracteur</h1><br>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
        <form name=\"inscription\" method=\"post\" action=\"rev_tracteur.php\">
		<tr>
			<td>Marque :	</td>
			<td>$marque</td><input type=\"hidden\" name=\"marque\" value=\"$marque\"/>

		</tr>
		<tr>
			<td>Mod&egravele :	</td>
			<td>$modele</td><input type=\"hidden\" name=\"modele\" value=\"$modele\"/>

		</tr>
		<tr>
			<td>Immatriculation : </td>
			<td>$immat</td>	<input type=\"hidden\" name=\"immat\" value=\"$immat\"/>

		</tr>
		<tr>
			<td>Date Revision :	</td>
			<td><input type=\"text\" id=\"datepicker\" name=\"datect\" value=\"$revision\"/></td>
		</tr>
		<tr>
			<td>R&eacuteparation effectu&eacute : </td>
			<td><textarea name=\"listrevision\" rows=\"3\" cols=\"30\"></textarea></td>
		</tr>
		<tr>
			<td><font color=\"red\">Date prochaine revision :	</font></td>
			<td><input type=\"text\" id=\"datepicker\" name=\"revision\"/></td>
		</tr>
		<tr>
			<td>Tarif :	</font></td>
			<td><input type=\"text\" name=\"prix\"/></td>
		</tr>
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
		</tr>			
			<input type=\"hidden\" name=\"type\" value=\"$type\"/>
			<input type=\"hidden\" id=\"datepicker\" name=\"date\" value=\"$date\"/>
			<input type=\"hidden\" id=\"datepicker\" name=\"ct\" value=\"$ct\">
			<input type=\"hidden\" name=\"defaut\" value=\"$defaut\">
			<input type=\"hidden\" name=\"obs\" value=\"$obs\"/>
			<input type=\"hidden\" name=\"id_tracteur\" value=\"$id_tracteur\"/>
			</form>
		</table>";
	}
	// on ferme la connexion
	mysql_close();
	}
?>
	<div class="page-header">
		<a href="revision.php"><button type="button" class="btn btn-default">Retour au Listing</button></a><br><br>
	    <a href="../gestion.php"><button type="button" class="btn btn-default">Retour Gestion</button></a>
	</div>
		</div>
			</div>
<?php 
include "../footer.php"; 
?>