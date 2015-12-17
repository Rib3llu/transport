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
if (isset ($_POST['valider']) && !empty($_POST['nom'])){
	//On récupère les valeurs entrées par l'utilisateur :
    $id_chauffeur=$_POST['id_chauffeur'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$tel=$_POST['tel'];
	$permis=$_POST['permis'];
	$mail=$_POST['mail'];
	$date=$_POST['date'];
	$date_exp = date("Y-m-d", strtotime($date));
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'UPDATE chauffeur SET nom="'.$nom.'", prenom="'.$prenom.'", tel="'.$tel.'", mail="'.$mail.'", permis="'.$permis.'", expiration="'.$date_exp.'" WHERE id_chauffeur="'.$id_chauffeur.'"'; 
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
		
	// on valide la creation
	echo "<p><h2>Le chauffeur à bien &eacutet&eacute modifi&eacute</h2></p>";
}
	
	// sinon on affiche le formulaire avec les donnees pre-remplis
	else {
		
		//On se connecte
		connectBase();
		
		// On recupere ID 
		$id_chauffeur = $_POST['id_chauffeur'];
		
		// On recupere la ligne
		$select = 'SELECT id_chauffeur,nom,prenom,tel,mail,permis,expiration FROM chauffeur WHERE id_chauffeur = '. "$id_chauffeur" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {

		$id_chauffeur = $row["id_chauffeur"];
		$nom = $row["nom"];
		$prenom = $row["prenom"];
		$tel = $row["tel"];
		$mail = $row["mail"];
		$permis = $row["permis"];
		$expiration = $row["expiration"];
		
		echo "
		<h1 align=\"center\">Modification d'un Chauffeur</h1><br>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
        <form name=\"inscription\" method=\"post\" action=\"mod_chauffeur.php\">
		<tr>
			<td>Nom :	</td>
			<td><input type=\"text\" name=\"nom\" value=\"$nom\"></td>
		</tr>
		<tr>
			<td>Prenom :	</td>
			<td><input type=\"text\" name=\"prenom\" value=\"$prenom\"></td>
		</tr>
		<tr>
			<td>Tel : </td>
			<td><input type=\"text\" name=\"tel\" value=\"$tel\"></td>
		</tr>
		<tr>
			<td>Mail :	</td>
			<td><input type=\"text\" name=\"mail\" value=\"$mail\"></td>
		</tr>
		<tr>
			<td>N°Permis :	</td>
			<td><input type=\"text\" name=\"permis\" value=\"$permis\"></td>
		</tr>
		<tr>
			<td>Date d'expiration :	</td>
			<td><input type=\"text\" id=\"datepicker\" name=\"date\" value=\"$expiration\"></td>
		</tr>
		<input type=\"hidden\" name=\"id_chauffeur\" value=\"$id_chauffeur\">	
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-success\" type=\"submit\" name=\"valider\" value=\"Valider\"/></td>
		</tr>
        </form>
		</table>";
	}
	// on ferme la connexion
	mysql_close();
	}
?>
	<div class="page-header">
		<a href="aff_chauffeurs.php"><button type="button" class="btn btn-default">Retour au Listing</button></a><br><br>
	    <a href="../admin.php"><button type="button" class="btn btn-default">Retour Admin</button></a>
	</div>
		</div>
			</div>
<?php 
include "../footer.php"; 
?>