<?php
// inclusion
include "../header.php";
?>
	<div class="container">
     <div class="row">
<?php
// Si le formulaire est rempli
if (isset ($_POST['supprimer'])){
	//On récupère les valeurs entrées par l'utilisateur :
    $id_chauffeur=$_POST['id_chauffeur'];
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'DELETE FROM chauffeur WHERE id_chauffeur="'.$id_chauffeur.'"'; 
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
		
	// on affiche la reussite de la suppression
	$msg = aff_supprimer("Le Chauffeur");
	echo $msg;

}
	
	// sinon on affiche le formulaire avec les donnees pre-remplis
	else {
		
		//On se connecte
		connectBase();
		
		// On recupere ID 
		$id_chauffeur = $_POST['id_chauffeur'];
		
		// On recupere la ligne
		$select = 'SELECT * FROM chauffeur WHERE id_chauffeur = '. "$id_chauffeur" .' '; 
	 
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
		$fimo=$row['fimo'];
		$matiere=$row['matiere'];
		$ppetrolier=$row['ppetrolier'];

		echo "
		<h2 align=\"center\">/!\ Attention /!\</h2><br>
		<h4 align=\"center\">Etes-vous sur de vouloir supprimer l'enregistrement suivant ?</h4><br>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
        <form name=\"inscription\" method=\"post\" action=\"supp_chauffeur.php\">
		<tr>
			<td>Nom :	</td>
			<td>$nom</td>
		</tr>
		<tr>
			<td>Prenom :	</td>
			<td>$prenom</td>
		</tr>
		<tr>
			<td>Tel : </td>
			<td>$tel</td>
		</tr>
		<tr>
			<td>Mail :	</td>
			<td>$mail</td>
		</tr>
		<tr>
			<td>N°Permis :	</td>
			<td>$permis</td>
		</tr>
		<tr>
			<td>Date d'expiration :	</td>
			<td>$expiration</td>
		</tr>
		<tr>
			<td>Date Fimo :	</td>
			<td>$fimo</td>
		</tr>
		<tr>
			<td>Date matière dangeureuse :	</td>
			<td>$matiere</td>
		</tr>
		<tr>
			<td>Date produits pétroliers :	</td>
			<td>$ppetrolier</td>
		</tr>

		<input type=\"hidden\" name=\"id_chauffeur\" value=\"$id_chauffeur\">	
		<tr>
			<td colspan=\"2\" align=\"center\"><input class=\"btn btn-danger\" type=\"submit\" name=\"supprimer\" value=\"Supprimer\"/></td>
		</tr>
        </form>
		</table>";
	}
	// on ferme la connexion
	mysql_close();
	}

		// on ferme la page
	$ppage = piedpage_formulaire("chauffeurs");
	echo $ppage;

	include "../footer.php"; 
?>