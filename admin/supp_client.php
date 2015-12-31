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
    $id_client=$_POST['id_client'];
	
	//On se connecte
	connectBase();
	 
	//On prépare la commande sql d'insertion
	$sql = 'DELETE FROM client WHERE id_client="'.$id_client.'"'; 
	 
	/*on lance la commande (mysql_query) et au cas où, 
	on rédige un petit message d'erreur si la requête ne passe pas (or die) 
	(Message qui intègrera les causes d'erreur sql)*/
	mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
	 
	// on ferme la connexion
	mysql_close();
		
	// on affiche la reussite de la suppression
	$msg = aff_supprimer("Le Client");
	echo $msg;

}
	
	// sinon on affiche le formulaire avec les donnees pre-remplis
	else {
		
		//On se connecte
		connectBase();
		
		// On recupere ID 
		$id_client = $_POST['id_client'];
		
		// On recupere la ligne
		$select = 'SELECT id_client,nom,adresse,cp,ville,siret,tva,tel,fax,mail,contact,observation FROM client WHERE id_client = '. "$id_client" .' '; 
	 
		$result = mysql_query($select) or die ('Erreur : '.mysql_error() );
		$total = mysql_num_rows($result);
	 
	// On affiche le formulaire pre-rempli
	while($row = mysql_fetch_array($result)) {
		
		$nom = $row["nom"];
		$add = $row['adresse'];
		$cp = $row["cp"];
		$ville = $row["ville"];
		$siret = $row["siret"];
		$tva = $row["tva"];
		$tel = $row["tel"];
		$fax = $row["fax"];
		$mail = $row["mail"];
		$contact = $row["contact"];
		$obs = $row["observation"];
		$id_client = $row["id_client"];
		
		echo "
		<h2 align=\"center\">/!\ Attention /!\</h2><br>
		<h4 align=\"center\">Etes-vous sur de vouloir supprimer l'enregistrement suivant ?</h4><br>
		<div class=\"col-md-3\"></div>
			<div class=\"col-md-6\" align=\"center\">
		<table class=\"table table-striped\">
			<form name=\"inscription\" method=\"post\" action=\"supp_client.php\">
		<tr>
			<td>Nom :	</td>
			<td>$nom</td>
		</tr>
		<tr>
			<td>Adresse :	</td>
			<td>$add</td>
		</tr>
		<tr>
			<td>Code Postal :	</td>
			<td>$cp</td>
		</tr>
		<tr>
			<td>Ville :	</td>
			<td>$ville</td>
		</tr>
		<tr>
			<td>Siret :	</td>
			<td>$siret</td>
		</tr>
		<tr>
			<td>N. TVA :	</td>
			<td>$tva</td>
		</tr>
		<tr>
			<td>T&eacutel&eacutephone :	</td>
			<td>$tel</td>
		</tr>
		<tr>
			<td>Fax :	</td>
			<td>$fax</td>
		</tr>
		<tr>
			<td>Mail :	</td>
			<td>$mail</td>
		</tr>
		<tr>
			<td>Contact :	</td>
			<td>$contact</td>
		</tr>
		<tr>
			<td>Observation :	</td>
			<td>$obs</td>
		</tr>
		<input type=\"hidden\" name=\"id_client\" value=\"$id_client\">
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
	$ppage = piedpage_formulaire("clients");
	echo $ppage;

	include "../footer.php"; 
?>